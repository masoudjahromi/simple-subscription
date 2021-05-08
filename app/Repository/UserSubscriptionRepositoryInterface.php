<?php

namespace App\Repository;

/**
 * Interface UserSubscriptionRepositoryInterface
 *
 * @package App\Repository
 */
interface UserSubscriptionRepositoryInterface extends EloquentRepositoryInterface
{
    public function deleteByUserId(int $modelId): bool;
}
