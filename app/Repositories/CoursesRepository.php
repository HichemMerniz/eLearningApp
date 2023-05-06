<?php

namespace App\Repositories;

use App\Models\Courses;
use App\Repositories\BaseRepository;

/**
 * Class CoursesRepository
 * @package App\Repositories
 * @version May 1, 2023, 1:33 pm UTC
*/

class CoursesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'date'
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
        return Courses::class;
    }
}
