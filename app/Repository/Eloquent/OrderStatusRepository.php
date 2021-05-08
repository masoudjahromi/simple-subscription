<?php

namespace App\Repository\Eloquent;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use App\Repository\OrderStatusRepositoryInterface;

/**
 * Class OrderStatusRepository
 *
 * @package App\Repository\Eloquent
 */
class OrderStatusRepository extends BaseRepository implements OrderStatusRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * SubscriptionRepository constructor.
     *
     * @param Subscription $model
     */
    public function __construct(Subscription $model)
    {
        parent::__construct($model);
    }

    public function findByTitle(string $title): Subscription
    {
        return $this->model->where('title', $this)->first();
    }
}
