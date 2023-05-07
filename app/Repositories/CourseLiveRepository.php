<?php

namespace App\Repositories;

use App\Models\CourseLive;
use App\Repositories\BaseRepository;

/**
 * Class CourseLiveRepository
 * @package App\Repositories
 * @version May 7, 2023, 9:45 am UTC
*/

class CourseLiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'duree'
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
        return CourseLive::class;
    }
}
