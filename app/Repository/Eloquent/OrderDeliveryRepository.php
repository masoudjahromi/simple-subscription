<?php

namespace App\Repository\Eloquent;

use App\Models\OrderDelivery;
use Illuminate\Database\Eloquent\Model;
use App\Repository\OrderDeliveryRepositoryInterface;

/**
 * Class DeliveryRepository
 *
 * @package App\Repository\Eloquent
 */
class OrderDeliveryRepository extends BaseRepository implements OrderDeliveryRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * DeliveryRepository constructor.
     *
     * @param OrderDelivery $model
     */
    public function __construct(OrderDelivery $model)
    {
        parent::__construct($model);
    }
}
