<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Metatags extends Model
{
    protected $table = 'metatags';
    protected $fillable = ['route_name', 'description'];

    public static function getAllRoutes()
    {
        $routes = collect(Route::getRoutes())->filter(function ($route) {
            $uri = $route->uri();
            $name = $route->getName();

            return in_array('GET', $route->methods())
                && !str_starts_with($uri, 'api/')
                && !str_starts_with($uri, 'admin/')
                && !str_starts_with($uri, 'storage')
                && !str_starts_with($uri, 'livewire')
                && !($name && str_starts_with($name, 'filament.'));
        });

        $routeList = [];

        foreach ($routes as $route) {
            $name = $route->getName();
            if ($name) {
                $routeList[$name] = ucfirst($name);
            }
        }

        return $routeList;
    }

}
