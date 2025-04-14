<?php

namespace Phro\Web;

use Exception;

class IndexController extends Controller {

    protected HackatonEvent $hackatonEvent;

    public function __construct() {
        $this->hackatonEvent = new HackatonEvent();
    }

    public function index(): void {
        $this->sendHtmlResponse();
    }

    public function submit(): void {
        $name = (isset($_POST['name'])) ? $_POST['name'] : "";
        $repo = (isset($_POST['repo'])) ? $_POST['repo'] : "";
        if (!$this->validateInput('name', $name) || !$this->validateInput('repo', $repo)) {
            print_r(value: json_encode(["status" => 400, "message" => "Bad input!"]));
        } else {
            try {
                $this->hackatonEvent->saveSubmition($name, $repo);
                print_r(value: json_encode(["status" => 200, "message" => "Thanks!"]));
            } catch(Exception $exception) {
                print_r(value: json_encode(["status" => 500, "message" => "Failed saving submition!"]));
            }
        }
    }
    private function validateInput(string $type, string $value): bool {
        if ($type === 'name') {
            if (strlen($value) < 1) {
                return false;
            }
        } else if ($type === 'repo') {
            $pattern = '/^https:\/\/github\.com/';
            $matches = null;
            preg_match($pattern, $value, $matches);
            if (count($matches) < 1) {
                return false;
            }
        } else {
            return false;
        }
        return true;
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