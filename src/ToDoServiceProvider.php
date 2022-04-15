<?php
namespace Dizaji\ToDo;
use Dizaji\ToDo\Repositories\Repository;

use Dizaji\ToDo\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class  ToDoServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadMigrationsFrom(__DIR__."/Migrations");
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'ToDo');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/Dizaji/ToDo'),
        ]);
    }
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, Repository::class);
        $this->app->register(EventServiceProvider::class);
    }
}
