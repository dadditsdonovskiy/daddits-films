<?php
namespace App\Services\Film;

use App\Exceptions\GeneralException;
use App\Models\Director;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateFilmService
 */
class CreateFilmService
{
    /**
     * @param $data
     * @return Film
     * @throws GeneralException
     */
    public function create($data): Film
    {
        DB::beginTransaction();
        $film = Film::query()->create(
            [
                'title' => $data['title'],
                'description' => $data['description'],
                'released_at' => $data['releasedDate'],
            ]
        );
        if ($film) {
            DB::commit();
            return $film;
        }
        DB::rollBack();
        throw new GeneralException(__('exceptions.backend.access.films.create_error'));
    }
}
