<?php

namespace App\Repositories;

use App\Models\Drivers;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DriversRepository
 * @package App\Repositories
 * @version April 18, 2018, 6:07 am UTC
 *
 * @method Drivers findWithoutFail($id, $columns = ['*'])
 * @method Drivers find($id, $columns = ['*'])
 * @method Drivers first($columns = ['*'])
*/
class DriversRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firstName',
        'lastName',
        'busID',
        'telephone',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Drivers::class;
    }
}
