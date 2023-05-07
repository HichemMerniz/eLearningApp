<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Video
 * @package App\Models
 * @version May 7, 2023, 9:40 am UTC
 *
 * @property string $name
 * @property string $dure
 */
class Video extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'videos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'dure'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'dure' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'dure' => 'required'
    ];

    
}
