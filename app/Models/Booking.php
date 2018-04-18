<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Booking
 * @package App\Models
 * @version April 18, 2018, 5:04 pm UTC
 *
 * @property string route_ids
 * @property boolean status
 * @property string seats
 * @property integer fare
 */
class Booking extends Model
{
    use SoftDeletes;

    public $table = 'bookings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'route_ids',
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
        'route_ids' => 'string',
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
