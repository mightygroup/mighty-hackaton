<?php

namespace Phro\Web;

use Exception;

class HackatonEvent {

    private const EVENT_ID = '1_80s_jumper';
    private const END_DATE = "2025-04-16 19:00";

    public function __construct() {}

    public function getEndDate(): string {
        return self::END_DATE;
    }

    public function saveSubmition(string $name, string $repoURL): bool {
        $cleanName = filter_var($name);
        $cleanRepo = filter_var($repoURL);
        $content = $cleanName . "          " . $cleanRepo."\n";
        try {
            $this->saveFile($content);
            return true;
        } catch(Exception $exception) {
            return false;
        }
    }

    private function saveFile(string& $content) {
        $dir = './submitions/'.self::EVENT_ID;
        if (!file_exists(filename: $dir)) {
            mkdir($dir, 0777, true);
        }
        $file = $dir . '/submitions.txt';
        if (!file_exists($file)) {
            $body = "===================================================================================================\n"
                  . "                             MIGHTY HACKATON ".self::END_DATE . "                                  \n"
                  . "===================================================================================================\n"
                  ."Name          | Repo                                                                                \n"
                  . $content;
            ;
        } else {
            $body = file_get_contents($file);
            $body .= $content;
        }
        file_put_contents($file, $body);
    }

}
