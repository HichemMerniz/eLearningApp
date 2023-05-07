<?php

namespace App\Repositories;

use App\Models\SubSection;
use App\Repositories\BaseRepository;

/**
 * Class SubSectionRepository
 * @package App\Repositories
 * @version May 7, 2023, 9:43 am UTC
*/

class SubSectionRepository extends BaseRepository
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
        return SubSection::class;
    }
}
