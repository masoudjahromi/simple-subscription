<?php

namespace App\Repository;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repository
 */
interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function findByEmail(string $email);

    public function usersWithOrdersActiveSubscription();

    public function usersWithActiveSubscription();

    public function userWithSubscription(int $userId);
}
