<?php

namespace App\Repository\Eloquent;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Constants\OrderStatusConstants;
use App\Repository\UserRepositoryInterface;

/**
 * Class UserRepository
 *
 * @package App\Repository\Eloquent
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Find a user by email address
     *
     * @param string $email
     *
     * @return mixed
     */
    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    /**
     * @return mixed
     */
    public function usersWithOrdersActiveSubscription()
    {
        return User::whereHas('userSubscription', function ($q) {
            $q->where('next_order_date', '>=', Carbon::now());
        })
            ->whereHas('lastPaidOrder', function ($q) {
                $q->where('status_id', '=', OrderStatusConstants::PAID);
            })
            ->with('lastPaidOrder')
            ->paginate();
    }

    /**
     * Get all active users with active subscription
     *
     * @return mixed
     */
    public function usersWithActiveSubscription()
    {
        return User::whereHas('userSubscription', function ($q) {
            $q->where('next_order_date', '>=', Carbon::now());
        })->orderByDesc('id')
            ->paginate();
    }

    /**
     * Get user with subscription
     *
     * @return mixed
     */
    public function userWithSubscription(int $userId)
    {
        return User::where('id', $userId)
            ->whereHas('userSubscription', function ($q) use ($userId) {
                $q->where('user_id', $userId)->where('next_order_date', '>=', Carbon::now());
            })
            ->first();
    }

}
