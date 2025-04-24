<?php

namespace Phro\Web;

class App {
    private Router $router;
    public array $request;
    public static string $BASE_FOLDER = "/mighty-hackaton";

    public function __construct() {
        $this->request = $_SERVER;
        $this->router = new Router();
    }

    public function run(): void {
        $this->router->handleRequest($this->request);
    }

}