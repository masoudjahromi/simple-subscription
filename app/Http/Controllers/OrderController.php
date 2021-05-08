<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateOrderRequest;
use App\Repository\OrderRepositoryInterface;
use App\Transformers\CreateUserResponseTransformer;

/**
 * Class OrderController
 *
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * OrderController constructor.
     *
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Creat a simple order
     *
     * @param CreateOrderRequest            $createOrderRequest
     * @param CreateUserResponseTransformer $transformer
     *
     * @return JsonResponse
     */
    public function create(CreateOrderRequest $createOrderRequest, CreateUserResponseTransformer $transformer): JsonResponse
    {
        $validated = $createOrderRequest->validated();
        $order = $this->orderRepository->create($validated);

        return response()->json(['status' => true, 'order' => $transformer->transform($order)], 200);
    }

    /**
     * Get last paid orders
     *
     * @return JsonResponse
     */
    public function getLastPaidOrders(): JsonResponse
    {
        $orders = $this->orderRepository->lastPaidOrderCustomers();

        return response()->json(['status' => true, 'orders' => $orders], 200);
    }

}
