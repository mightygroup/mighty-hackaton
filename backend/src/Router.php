<?php

namespace Phro\Web;

class Router {

    private array $routes = [];


    public function __construct() {
        $this->routes = [
            new Route("GET", '\/?', [IndexController::class, "index"]),
        ];
    }

    public function handleRequest(array $request): void {
        $method = $request['REQUEST_METHOD'];
        $uri = $request['REQUEST_URI'];
        $route = $this->findRoute($method, $uri);
        if (!$route) {
            $this->notFound();
        } else {
            $route->handler();
        }
    }

    private function findRoute(string $method, string $uri): Route | false {
        for ($i = 0; $i < count($this->routes); $i++) {
            $route = $this->routes[$i];
            if ($route->match($method, $uri)) {
                return $route;
            }
        }
        return false; /** 404 */
    }

    private function notFound(): void {
        echo "Error 404";
    }

}