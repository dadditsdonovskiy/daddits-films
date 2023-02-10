<?php


namespace App\Repositories;

use App\Models\Film;
use Elasticsearch\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\FilmsRepository;

/**
 * Class FilmsElasticsearchRepository
 * @package App\Repositories
 */
class FilmsElasticsearchRepository implements FilmsRepository
{
    /** @var Client */
    private $elasticsearch;
    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }
    public function search(string $query = ''): Collection
    {
        $items = $this->searchOnElasticsearch($query);
        return $this->buildCollection($items);
    }
    private function searchOnElasticsearch(string $query = ''): array
    {
        $model = new Film();
        $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title^5', 'description'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);
        return $items;
    }
    private function buildCollection(array $items): Collection
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');
        return Film::findMany($ids)
            ->sortBy(function ($film) use ($ids) {
                return array_search($film->getKey(), $ids);
            });
    }
}
