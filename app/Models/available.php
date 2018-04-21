<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class available
 * @package App\Models
 * @version April 21, 2018, 7:22 am UTC
 *
 * @property integer route_id
 * @property string route_name
 * @property integer bus_id
 * @property string bus_plate_number
 * @property integer seats
 */
class available extends Model
{
    use SoftDeletes;

    public $table = 'availables';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'route_id',
        'route_name',
        'bus_id',
        'bus_plate_number',
        'seats',
        'busy'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'route_id' => 'integer',
        'route_name' => 'string',
        'bus_id' => 'integer',
        'bus_plate_number' => 'string',
        'seats' => 'integer',
        'busy' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
