<?php

namespace App\Providers;

use App\Services\CsvDeliveryExportable;
use App\Services\DeliveryExportableInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepositoryInterface;
use App\Repository\Eloquent\OrderRepository;
use App\Repository\OrderRepositoryInterface;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\Eloquent\OrderStatusRepository;
use App\Repository\OrderStatusRepositoryInterface;
use App\Repository\Eloquent\SubscriptionRepository;
use App\Repository\SubscriptionRepositoryInterface;
use App\Repository\DeliveryTypeRepositoryInterface;
use App\Repository\Eloquent\DeliveryTypeRepository;
use App\Repository\OrderDeliveryRepositoryInterface;
use App\Repository\Eloquent\OrderDeliveryRepository;
use App\Repository\Eloquent\UserSubscriptionRepository;
use App\Repository\UserSubscriptionRepositoryInterface;

/**
 * Class RepositoryServiceProvider
 *
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserSubscriptionRepositoryInterface::class, UserSubscriptionRepository::class);
        $this->app->bind(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
        $this->app->bind(OrderStatusRepositoryInterface::class, OrderStatusRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(DeliveryTypeRepositoryInterface::class, DeliveryTypeRepository::class);
        $this->app->bind(OrderDeliveryRepositoryInterface::class, OrderDeliveryRepository::class);
        $this->app->bind(DeliveryExportableInterface::class, CsvDeliveryExportable::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
