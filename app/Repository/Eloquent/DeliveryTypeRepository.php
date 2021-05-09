<?php

namespace App\Repository\Eloquent;

use App\Models\DeliveryType;
use Illuminate\Database\Eloquent\Model;
use App\Repository\DeliveryTypeRepositoryInterface;

/**
 * Class DeliveryTypeRepository
 *
 * @package App\Repository\Eloquent
 */
class DeliveryTypeRepository extends BaseRepository implements DeliveryTypeRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * DeliveryTypeRepository constructor.
     *
     * @param DeliveryType $model
     */
    public function __construct(DeliveryType $model)
    {
        parent::__construct($model);
    }
}
