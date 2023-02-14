<?php


namespace App\Helpers;

use App\Interfaces\BladeTableViewColumnInterface;
use App\Models\Director;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 * Class ViewDatabaseColumnHelper
 * @package App\Helpers
 */
class ViewDatabaseColumnHelper implements BladeTableViewColumnInterface
{
    private array $columns = [];

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        $columns = [];
        foreach ($this->columns as $column) {
            $columns[] = [
                'id' => $column['id'],
                'name' => $column['name'],
                'placeholder' => $column['placeholder'],
                'class' => $column['class'],
                'styles' => $column['styles']
            ];
        }
        return $columns;
    }
}
