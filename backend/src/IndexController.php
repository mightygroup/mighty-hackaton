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

    public function join(): void {
        echo "join!";
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