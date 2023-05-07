<?php

namespace App\Repositories;

use App\Models\Uploads;
use App\Repositories\BaseRepository;

/**
 * Class UploadsRepository
 * @package App\Repositories
 * @version May 7, 2023, 9:44 am UTC
*/

class UploadsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vedioName'
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
        return Uploads::class;
    }
}
