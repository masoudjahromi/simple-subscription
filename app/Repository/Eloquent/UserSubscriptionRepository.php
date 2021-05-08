<?php

namespace App\Repository\Eloquent;

use Carbon\Carbon;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use App\Repository\SubscriptionRepositoryInterface;
use App\Repository\UserSubscriptionRepositoryInterface;

/**
 * Class UserSubscriptionRepository
 *
 * @package App\Repository\Eloquent
 */
class UserSubscriptionRepository extends BaseRepository implements UserSubscriptionRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var UserSubscriptionRepositoryInterface
     */
    private $subscriptionRepository;

    /**
     * UserSubscriptionRepository constructor.
     *
     * @param UserSubscription $model
     */
    public function __construct(UserSubscription $model)
    {
        parent::__construct($model);
        $this->model = $model;
        $this->subscriptionRepository = App::make(SubscriptionRepositoryInterface::class);
    }


    /**
     * Create a User Subscription
     *
     * @param array $payload
     *
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        $subscription = $this->subscriptionRepository->findById($payload['subscription_id']);
        $payload['start_date'] = Carbon::now();
        $payload['next_order_date'] = Carbon::now()->addDays($subscription->day_iteration);
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    /**
     * Create a User Subscription
     *
     * @param array $payload
     *
     * @return Model
     */
    public function updateOrCreate(array $payload): ?Model
    {
        $subscription = $this->subscriptionRepository->findById($payload['subscription_id']);
        $payload['start_date'] = Carbon::now();
        $payload['next_order_date'] = Carbon::now()->addDays($subscription->day_iteration);
        $model = $this->model->updateOrCreate(
            [
                'user_id' => $payload['user_id'],
            ]
            , $payload);

        return $model->fresh();
    }

    /**
     * Delete a user by ID
     *
     * @param int $modelId
     *
     * @return bool
     */
    public function deleteByUserId(int $modelId): bool
    {
        $this->model->where('user_id', $modelId)->delete();
    }

}
