<?php

namespace App\Repository\Eloquent;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use App\Repository\SubscriptionRepositoryInterface;

/**
 * Class SubscriptionRepository
 *
 * @package App\Repository\Eloquent
 */
class SubscriptionRepository extends BaseRepository implements SubscriptionRepositoryInterface
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
}
