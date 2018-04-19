<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Autobuses
 * @package App\Models
 * @version April 18, 2018, 6:04 am UTC
 *
 * @property string type
 * @property string plateNumber
 * @property number seats
 * @property boolean status
 */
class Autobuses extends Model
{
    use SoftDeletes;

    public $table = 'autobuses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type',
        'plateNumber',
        'seats',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'plateNumber' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'string',
        'plateNumber' => 'string',
        'seats' => 'integer'
    ];

    
}
