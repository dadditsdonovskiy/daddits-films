<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use App\Models\Auth\User;

/**
 * Class DirectorFilter
 *
 * @package App\ModelFilters
 */
class FilmFilter extends BaseFilter
{
    /**
     * @param string $search
     */
    public function search(string $search)
    {
        $fullNameSearch = "concat(firstname, ' ', lastname)";
        if (Config('app.env') === 'testing') {
            $fullNameSearch = "firstname || ' ' || lastname";
        }

        $search = str_replace("'", "\'", $search);

        $this->related('profile', function ($query) use ($search, $fullNameSearch) {
            return $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhereRaw($fullNameSearch . " like '%" . $search . "%' ")
                ->orWhere('business_name', 'like', '%' . $search . '%')
                ->orWhere('uid', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

    /**
     * @param int $userId
     */
    public function userId(int $userId)
    {
        $this->where('uid', 'like', '%' . $userId . '%');
    }

    /**
     * @param string $role
     */
    public function role(string $role)
    {
        $this->whereIn('role_id', explode(',', $role));
    }

    /**
     * @param string $createdDate
     */
    public function createdDate(string $createdDate)
    {
        $dates = explode(',', $createdDate);
        if (count($dates) === 1) {
            $from = (int)$dates[0];
            $this->where('users.created_at', '=', $from);
        }
        if (count($dates) === 2) {
            $from = (int)$dates[0];
            $to = (int)$dates[1];
            $this->whereBetween('users.created_at', [$from, $to]);
        }
    }

    /**
     * @param bool $enabled
     */
    public function enabled(bool $enabled)
    {
        $this->where('status', '=', $enabled ? User::STATUS_ACTIVE : User::STATUS_BLOCKED);
    }

    /**
     * @param bool $withBussiness
     */
    public function withBussiness(bool $withBussiness)
    {
        $this->related('profile', function ($query) use ($withBussiness) {
            return $query->where('business_name', $withBussiness ? '!=' : '=', null);
        });
    }

    /**
     * @param int $userId
     */
    public function createdByUid(int $userId)
    {
        $this->where('created_by_uid', '=', $userId);
    }

    /**
     * @param string $state
     */
    public function state(string $state)
    {
        $this->related('profile', function ($query) use ($state) {
            return $query->whereIn('state', explode(',', $state));
        });
    }

    /**
     * @param int $userId
     */
    public function buyer(int $userId)
    {
        $this->where('uid', '=', $userId)->where('role_id', '=', User::ROLE_BUYER);
    }
}
