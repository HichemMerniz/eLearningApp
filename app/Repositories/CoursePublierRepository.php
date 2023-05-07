<?php

namespace App\Repositories;

use App\Models\CoursePublier;
use App\Repositories\BaseRepository;

/**
 * Class CoursePublierRepository
 * @package App\Repositories
 * @version May 7, 2023, 9:46 am UTC
*/

class CoursePublierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomCourse',
        'description'
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
        return CoursePublier::class;
    }
}
