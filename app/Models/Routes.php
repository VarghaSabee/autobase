<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Routes
 * @package App\Models
 * @version April 18, 2018, 6:11 am UTC
 *
 * @property string name
 * @property string from
 * @property string to
 * @property time startTime
 * @property time endTime
 * @property integer busID
 * @property integer fare
 * @property boolean status
 */
class Routes extends Model
{
    use SoftDeletes;

    public $table = 'routes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'from',
        'to',
        'startTime',
        'endTime',
        'busID',
        'fare',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'from' => 'string',
        'to' => 'string',
        'busID' => 'integer',
        'fare' => 'integer',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
