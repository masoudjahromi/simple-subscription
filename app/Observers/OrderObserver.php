<?php

namespace App\Observers;

use App\Models\Order;
use App\Constants\DeliveryConstants;
use App\Repository\OrderDeliveryRepositoryInterface;

/**
 * Class OrderObserver
 *
 * @package App\Observers
 */
class OrderObserver
{
    /**
     * @var OrderDeliveryRepositoryInterface
     */
    private $orderDeliveryRepository;

    /**
     * OrderObserver constructor.
     * @param OrderDeliveryRepositoryInterface $orderDeliveryRepository
     */
    public function __construct(OrderDeliveryRepositoryInterface $orderDeliveryRepository)
    {
        $this->orderDeliveryRepository = $orderDeliveryRepository;
    }

    /**
     * Handle the Order "created" event.
     *
     * @param Order $order
     *
     * @return void
     */
    public function created(Order $order)
    {
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param Order $order
     *
     * @return void
     */
    public function updated(Order $order)
    {
        if ($order->isDirty('status_id')) {
            $params = [
                'order_id' => $order->id,
                'delivery_type_id' => DeliveryConstants::POST_NL,
            ];
            $this->orderDeliveryRepository->create($params);
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param Order $order
     *
     * @return void
     */
    public function deleted(Order $order)
    {
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param Order $order
     *
     * @return void
     */
    public function restored(Order $order)
    {
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param Order $order
     *
     * @return void
     */
    public function forceDeleted(Order $order)
    {
    }
}
