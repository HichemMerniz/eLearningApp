<?php

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\BaseRepository;

/**
 * Class VideoRepository
 * @package App\Repositories
 * @version May 7, 2023, 9:40 am UTC
*/

class VideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'dure'
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
        return Video::class;
    }
}
