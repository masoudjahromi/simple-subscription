<?php

namespace App\Repository;

/**
 * Interface OrderRepositoryInterface
 *
 * @package App\Repository
 */
interface OrderRepositoryInterface extends EloquentRepositoryInterface
{
    public function lastPaidOrderCustomers();

    public function usersWithMoreThanOnePaidOrder();
}
