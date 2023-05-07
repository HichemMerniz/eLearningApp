<?php

namespace App\Repositories;

use App\Models\Section;
use App\Repositories\BaseRepository;

/**
 * Class SectionRepository
 * @package App\Repositories
 * @version May 7, 2023, 9:42 am UTC
*/

class SectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titre',
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
        return Section::class;
    }
}
