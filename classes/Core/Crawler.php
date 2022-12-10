<?php

namespace API\Core;

use API\Model\Page;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleHttpClient;


class Crawler {

    public static function getNewPageInfo(Page &$Page) {
        $goutteClient = new Client();
        $goutteClient->setClient(new GuzzleHttpClient(['timeout' => 60]));

        // Get page
        $crawler = $goutteClient->request('GET', $Page->Url);

        // Get title
        $Page->Title = $crawler->filter('title')->text();

        // Get HTML
        if (isset($Page->SelectorRemove) && strlen($Page->SelectorRemove) > 0) {
            $crawler->filter($Page->SelectorRemove)->each(function ($crawler) {
                foreach ($crawler as $node) {
                    $node->parentNode->removeChild($node);
                }
            });
        }

        $results = $crawler->filter($Page->Selector)->each(function($node) {
            $tag_name = $node->nodeName();
            return '<' . $tag_name . '>' . $node->html() . '</' . $tag_name . '>';
        });

        $Page->Content = $results;

        // Get recursive URLs
        if (isset($Page->SelectorRecursive) && strlen($Page->SelectorRecursive) > 0) {
            $results = $crawler->filter($Page->SelectorRecursive)->each(function($node) {
                return $node->link()->getUri();
            });

            $Page->RecursiveUrls = $results;
        }
    }
}