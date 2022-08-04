<?php

namespace Core\Router;

class Router
{
    public static $instance = null;

    private $route_table = [];

    public function __construct()
    {

    }

    public function load($route_table) {
        $this->route_table = $route_table;
    }

    public function match($path_info)
    {
        $matched_route = null;
        foreach($this->route_table as $route_name => $potential_route) {
            // break the route down by forward slash
            $route_chunks = explode('/', $potential_route['route']);
            $path_chunks = explode('/', $path_info);

            if(count($route_chunks) !== count($path_chunks)) {
                // mismatch on chunk count, don't consider further
                continue;
            }

            $found = false;
            $parameters = [];
            foreach($path_chunks as $index => $pchunk) {
                $rchunk = $route_chunks[$index];
                if($pchunk === $rchunk) {
                    $found = true;
                    continue;
                }

                if(strpos($rchunk,  ':') === 0) {
                    $found = true;
                    $parameters[substr($rchunk, 1)] = $pchunk;
                    continue;
                }

                $found = false;
                break;
            }

            if(!$found) continue;

            $matched_controller_chunks = explode('::', $potential_route['controller']);

            $matched_route = [
                'name' => $route_name,
                'controller_raw' => $potential_route['controller'],
                'controller' => $matched_controller_chunks[0],
                'action' => $matched_controller_chunks[1],
                'parameters' => $parameters
            ];
        }

        return $matched_route;
    }

    public static function Get($route_table = null)
    {
        if(!self::$instance) {
            self::$instance = new self();
        }

        if($route_table) {
            self::$instance->load($route_table);
        }

        return self::$instance;
    }
}
