<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Booking
 * @package App\Models
 * @version April 19, 2018, 2:13 pm UTC
 *
 * @property string route_ids
 * @property integer user_id
 * @property boolean status
 * @property string seats
 * @property integer fare
 */
class Booking extends Model
{
    use SoftDeletes;

    public $table = 'bookings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'route_ids',
        'user_id',
        'status',
        'seats',
        'fare'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'route_ids' => 'string',
        'user_id' => 'integer',
        'status' => 'boolean',
        'seats' => 'string',
        'fare' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
