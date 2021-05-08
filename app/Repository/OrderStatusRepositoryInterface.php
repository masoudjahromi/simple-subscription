<?php

namespace App\Repository;

use App\Models\Subscription;

/**
 * Interface OrderStatusRepositoryInterface
 *
 * @package App\Repository
 */
interface OrderStatusRepositoryInterface extends EloquentRepositoryInterface
{
    function findByTitle(string $title): Subscription;
}
