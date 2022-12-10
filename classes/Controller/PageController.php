<?php

namespace API\Controller;

use API\Service\PageService;

class PageController {
    public static function get($Pages) {
        return (new PageService())->get($Pages);
    }
}