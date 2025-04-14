<?php

namespace Phro\Web;

class IndexController extends Controller {

    protected HackatonEvent $hackatonEvent;

    public function __construct() {
        $this->hackatonEvent = new HackatonEvent();
    }

    public function index(): void {
        $this->sendHtmlResponse();
    }

    public function submit(): void {
        $response = ["status" => 200, "message" => "Hello world!"];
        print_r(json_encode($response));
    }

    private function sendHtmlResponse(): void {
        echo $this->getHtmlDocument();
    }

    private function getHtmlDocument(): string {
        $hackatonEvent = $this->hackatonEvent;
        ob_start();
        include __DIR__ . "/../dist/index.php";
        $html = ob_get_clean();
        return $html;
    }

}