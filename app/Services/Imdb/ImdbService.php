<?php


namespace App\Services\Imdb;

use App\Imdb\ImdbTitle;
use Imdb\Config;


class ImdbService
{
    private $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    public function getFilmDetailsByImdbId(int $id)
    {
        $title = new ImdbTitle($id, $this->config);
        $filmInfo = [
            'title' => $title->title(),
            //'description' => $title->plotoutline(),
            //'genre' => $title->genre(),
            //'genres' => $title->genres(),
            //'director' => $title->director(),
            //'rating' => $title->rating(),
            //'image' => $title->photo(),
            //'actors' => $title->actor_stars(),
            //'cast' => $title->cast(),
            //'awards' => $title->awards(),
            //'budget' => $title->budget(),
            //'official_sites' => $title->officialSites() ?? '(not set)',
            //'prodCompany' => $title->prodCompany(),
            //'producer' => $title->producer(),
            //'soundTrack' => $title->soundtrack() ?? '(not set)',
            //'composer' => $title->composer(),
            //'trivia' => $title->trivia(),
            //'quotes' => $title->quotes(),
            //'goofs' => $title->goofs(),
            //'country' => $title->country(),
            //'synopsys' => $title->synopsis(),
            //'lot' => $title->plot(),
            //'color' => $title->comment(),
            //'comments' => $title->comment(),
            //'datePublished' => $title->getJson()->datePublished
        ];

        return $filmInfo;
    }

    /**
     * @return Config
     */
    private function getConfig(): Config
    {
        return $this->setConfig();
    }

    /**
     * @return Config
     */
    private function setConfig(): Config
    {
        $config = new Config();
        $config->language = 'En-en';
        return $config;
    }
}
