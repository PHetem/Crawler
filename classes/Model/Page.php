<?php

namespace API\Model;

class Page {

    public $Url;

    public $Selector;
    public $SelectorRemove;
    public $SelectorRecursive;

    public $Title;
    public $Content;

    public $RecursiveUrls;

    public function saveResults() {
        $cacheFile = CACHE_PATH . md5($this->Url) . '_' . date('d_m_y_H_i_s') . '.html';
        file_put_contents($cacheFile, $this->Content);
    }
}