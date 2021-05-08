<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Repository\SubscriptionRepositoryInterface;

class SubscriptionController extends Controller
{
    /**
     * @var SubscriptionRepositoryInterface
     */
    private $subscriptionRepository;

    /**
     * SubscriptionController constructor.
     * @param SubscriptionRepositoryInterface $subscriptionRepository
     */
    public function __construct(SubscriptionRepositoryInterface $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * Get all subscriptions
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $subscriptions = $this->subscriptionRepository->all();

        return response()->json($subscriptions, 200);
    }
}
