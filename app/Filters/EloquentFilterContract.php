<?php
/**
 * Created by PhpStorm.
 * User: umid
 * Date: 1/26/21
 * Time: 7:52 PM
 */

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface EloquentFilterContract
{
    /**
     * @param Builder $model
     *
     * @return Builder
     */
    public function applyEloquent(Builder|Model $model): Builder;
}
