<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SubSection
 * @package App\Models
 * @version May 7, 2023, 9:43 am UTC
 *
 * @property string $titre
 * @property string $description
 */
class SubSection extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sub_sections';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'titre',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titre' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titre' => 'required'
    ];

    
}
