<?php

namespace Phro\Web;

class Route {

    public string $method;
    public string $path;
    public mixed $action;

    public function __construct(string $method, string $path, mixed $action) {
        $this->method = $method;
        $this->path = $path;
        $this->action = $action;
    }

    public function match(string $method, string $path): bool {
        return $this->isMethod($method) 
            && $this->isPath($path);

    }

    public function handler(): void {
        $this->callAction();
    }

    private function callAction(): void {
        $controller = new $this->action[0];
        $method = $this->action[1];
        call_user_func_array([$controller, $method], []);
    }

    private function isMethod(string $method): bool {
        return $this->method === $method;
    }

    private function isPath(string $subject): bool {
        $pattern = '/^\/mighty-hackaton\/backend'.$this->path.'$/';
        $matches = null;
        preg_match($pattern, $subject, $matches);
        return count($matches) > 0;
    }

}