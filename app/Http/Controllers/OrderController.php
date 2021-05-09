<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaidOrderRequest;
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
     * @param CreateOrderRequest $createOrderRequest
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

    /**
     * Get detail of an order
     *
     * @param int $orderId
     *
     * @return JsonResponse
     */
    public function detail(int $orderId): JsonResponse
    {
        $order = $this->orderRepository->findById($orderId, ['*'], ['user', 'delivery', 'delivery.type']);

        return response()->json($order, 200);
    }

    /**
     * Set paid status to an order
     *
     * @param PaidOrderRequest $paidOrderRequest
     *
     * @return JsonResponse
     */
    public function setPaid(PaidOrderRequest $paidOrderRequest): JsonResponse
    {
        $orderId = $paidOrderRequest->get('order_id');
        $this->orderRepository->setPaidAnOrder($orderId);

        return response()->json(['status' => true], 200);
    }

    /**
     * @param int $orderId
     *
     * @return JsonResponse
     */
    public function setDelivery(int $orderId): JsonResponse
    {
    }

}
