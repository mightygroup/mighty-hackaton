<?php

namespace Phro\Web;

class IndexController extends Controller {

    public function index(): void {
        $this->sendHtmlResponse();
    }

    private function sendHtmlResponse(): void {
        echo $this->getHtmlDocument();
    }

    private function getHtmlDocument(): string {
        ob_start();
        include __DIR__ . "/../dist/index.html";
        $html = ob_get_clean();
        return $html;
    }

}