<?php

namespace Phro\Web;

class HackatonEvent {

    private const END_DATE = "2025-04-12 19:00";

    public function __construct() {}

    public function getEndDate(): string {
        return self::END_DATE;
    }

}
