<?php

namespace API\Service;

use API\Core\Crawler;
use API\Model\Page;
use UnexpectedValueException;

class PageService {

    public function get($Pages) {

        if (!is_array($Pages))
            throw new UnexpectedValueException('Invalid data');

        $Pages = $this->map($Pages);

        foreach($Pages as $Page) {
            Crawler::getNewPageInfo($Page);
        }

        return $Pages;
    }

    public function map(array $Pages) {
        $PagesArray = [];

        foreach ($Pages as $Page) {
            if (!isset($Page['Url']))
                throw new UnexpectedValueException('Invalid data');

            $TmpPage = new Page();
            $TmpPage->Url = $Page['Url'];
            $TmpPage->Selector = $Page['Selector'] ?? null;
            $TmpPage->SelectorRemove = $Page['SelectorRemove'] ?? null;
            $TmpPage->SelectorRecursive = $Page['SelectorRecursive'] ?? null;
            $PagesArray[] = $TmpPage;
        }

        return $PagesArray;
    }
}