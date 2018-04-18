<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Drivers
 * @package App\Models
 * @version April 18, 2018, 6:07 am UTC
 *
 * @property string firstName
 * @property string lastName
 * @property integer busID
 * @property integer telephone
 * @property string email
 */
class Drivers extends Model
{
    use SoftDeletes;

    public $table = 'drivers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'firstName',
        'lastName',
        'busID',
        'telephone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firstName' => 'string',
        'lastName' => 'string',
        'busID' => 'integer',
        'telephone' => 'integer',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
