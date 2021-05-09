<?php

namespace App\Repository\Eloquent;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Constants\OrderStatusConstants;
use App\Repository\UserRepositoryInterface;
use App\Repository\OrderRepositoryInterface;

/**
 * Class OrderRepository
 *
 * @package App\Repository\Eloquent
 */
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * OrderSubscriptionRepository constructor.
     *
     * @param Order                   $model
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(Order $model, UserRepositoryInterface $userRepository)
    {
        parent::__construct($model);
        $this->model = $model;
        $this->userRepository = $userRepository;
    }

    /**
     * Create an order
     *
     * @param array $payload
     *
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        $user = $this->userRepository->userWithSubscription($payload['user_id']);
        if (isset($user->userSubscription)) {
            $payload['subscription_id'] = $user->userSubscription->subscription_id ?? null;
        }
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    /**
     * Get last paid order customers
     *
     * @return mixed
     */
    public function lastPaidOrderCustomers()
    {
        return $this->model->select('id', 'user_id', 'paid_date')
            ->with('user')
            ->whereStatusId(OrderStatusConstants::PAID)
            ->whereNotNull('paid_date')
            ->orderByDesc('paid_date')
            ->paginate();
    }

    /**
     * Get users with more than one paid order
     *
     * @return mixed
     */
    public function usersWithMoreThanOnePaidOrder()
    {
        return $this->model->select('id', 'paid_date')
            ->select([DB::raw("COUNT(user_id) total_orders"), 'user_id'])
            ->with('user')
            ->where('status_id', OrderStatusConstants::PAID)
            ->groupBy("user_id")
            ->havingRaw("COUNT(user_id) > 1")
            ->orderBy('total_orders')
            ->paginate();
    }

    public function setPaidAnOrder(int $orderId): void
    {
        $this->model->where('id', $orderId)->first()->update([
                'status_id' => OrderStatusConstants::PAID,
                'paid_date' => Carbon::now(),
            ]
        );
    }
}
