<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rating
 * @package App\Models
 * @version April 18, 2018, 4:56 pm UTC
 *
 * @property integer booking_id
 * @property string name
 */
class Rating extends Model
{
    use SoftDeletes;

    public $table = 'ratings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'booking_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'booking_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'comment string textarea'
    ];

    
}
