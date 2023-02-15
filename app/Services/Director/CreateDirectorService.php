<?php
namespace App\Services\Director;

use App\Exceptions\GeneralException;
use App\Models\Director;
use Illuminate\Support\Facades\DB;

/**
 * Class CreateDirectorService
 */
class CreateDirectorService
{
    /**
     * @param $data
     * @return Director
     * @throws GeneralException
     */
    public function create($data): Director
    {
        DB::beginTransaction();
        $director = Director::query()->create(
            [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'birthday_date' => $data['birthday'],
            ]
        );
        if ($director) {
            DB::commit();
            return $director;
        }
        DB::rollBack();
        throw new GeneralException(__('exceptions.backend.access.directors.create_error'));
    }
}
