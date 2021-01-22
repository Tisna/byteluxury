<?php

namespace App\Processors;

use Abram\Odbc\ODBCProcessor;
use Illuminate\Database\Query\Builder;

class CustomProcessor extends ODBCProcessor
{
    /**
     * @param Builder $query
     * @param null $sequence
     * @return mixed
     */
    public function getLastInsertId(Builder $query, $sequence = null)
    {
        return $query->getConnection()->table($query->from)->latest('id')->first()->getAttribute($sequence);
    }
}
