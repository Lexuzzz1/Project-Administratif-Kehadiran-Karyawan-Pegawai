<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     */
    public function boot(): void
=======
     *
     * @return void
     */
    public function boot()
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
