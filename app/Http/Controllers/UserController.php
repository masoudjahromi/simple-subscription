<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateUserRequest;
use App\Repository\UserRepositoryInterface;
use App\Repository\OrderRepositoryInterface;
use App\Http\Requests\ApplySubscriptionUserRequest;
use App\Repository\UserSubscriptionRepositoryInterface;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    private $userRepository;
    /**
     * @var UserSubscriptionRepositoryInterface
     */
    private $userSubscriptionRepository;
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface             $userRepository
     * @param UserSubscriptionRepositoryInterface $userSubscriptionRepository
     * @param OrderRepositoryInterface            $orderRepository
     */
    public function __construct
    (UserRepositoryInterface $userRepository,
     UserSubscriptionRepositoryInterface $userSubscriptionRepository,
    OrderRepositoryInterface $orderRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->userSubscriptionRepository = $userSubscriptionRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Create a user with subscription
     *
     * @param CreateUserRequest $createUserRequest
     *
     * @return JsonResponse
     */
    public function create(CreateUserRequest $createUserRequest): JsonResponse
    {
        $params = $createUserRequest->validated();
        $user = $this->userRepository->create($params);

        return response()->json($user, 200);
    }

    /**
     * Apply a subscription to a user
     *
     * @param ApplySubscriptionUserRequest $applySubscriptionUserRequest
     *
     * @return JsonResponse
     */
    public function applySubscription(ApplySubscriptionUserRequest $applySubscriptionUserRequest): JsonResponse
    {
        $params = $applySubscriptionUserRequest->validated();
        $user = $this->userSubscriptionRepository->updateOrCreate($params);

        return response()->json(['status' => true, 'user' => $user], 200);
    }

    /**
     * Get detail of a user
     *
     * @param int $userId
     *
     * @return JsonResponse
     */
    public function detail(int $userId): JsonResponse
    {
        $userDetail = $this->userRepository->findById($userId, ['*'], ['userSubscription', 'orders']);

        return response()->json($userDetail, 200);
    }

    /**
     * Get all Users with active subscription
     *
     * @return JsonResponse
     */
    public function getUsersWithActiveSubscription(): JsonResponse
    {
        $users = $this->userRepository->usersWithActiveSubscription();

        return response()->json($users, 200);
    }

    /**
     * Get all Users with more than one paid order
     *
     * @return JsonResponse
     */
    public function getAllUsersWithMoreThanOnePaidOrder(): JsonResponse
    {
        $users = $this->orderRepository->usersWithMoreThanOnePaidOrder();

        return response()->json($users, 200);
    }
}
