<?php

namespace App\Repositories;

use App\Models\Exames;
use App\Repositories\BaseRepository;

/**
 * Class ExamesRepository
 * @package App\Repositories
 * @version May 7, 2023, 9:44 am UTC
*/

class ExamesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'question',
        'repanse'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Exames::class;
    }
}
