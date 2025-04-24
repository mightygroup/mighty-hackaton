<?php

namespace Phro\Web;

use Exception;

class HackatonEvent {

    private const EVENT_ID = '1_80s_jumper';
    private const END_DATE = "2025-05-30 19:00";

    public function __construct() {}

    public function getEndDate(): string {
        return self::END_DATE;
    }

    public function saveSubmition(string $name, string $repoURL): bool {
        if (!$this->withinTime()) {
            return false;
        } else {
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
    }

    public function due(): bool {
        return $this->withinTime();
    }

    private function withinTime(): bool {
        $today = time();
        $due = strtotime(self::END_DATE);
        return ($today <= $due);
    }

    private function saveFile(string& $content) {
        $dir = __DIR__.'/../submitions/'.self::EVENT_ID;
        if (!file_exists($dir)) {
            $result = mkdir($dir, 0777, true);
   
            if ($result === false) {
                throw new Exception("Failed to create submitions directory!");
            }
        }
        $file = $dir . '/submitions.txt';
        if (!file_exists($file)) {
            $body = "===================================================================================================\n"
                  . "                             MIGHTY HACKATON ".self::END_DATE . "                                  \n"
                  . "===================================================================================================\n"
                  . $content;
            ;
        } else {
            $body = file_get_contents($file);
            $body .= $content;
        }
        $result = file_put_contents($file, $body);
        if ($result === false) {
            throw new Exception("Failed to save submition!");
        }
    }

}
