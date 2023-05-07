<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Uploads
 * @package App\Models
 * @version May 7, 2023, 9:44 am UTC
 *
 * @property string $vedioName
 */
class Uploads extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'uploads';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'vedioName'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'vedioName' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vedioName' => 'required'
    ];

    
}
