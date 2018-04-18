<?php

namespace App\Repositories;

use App\Models\Autobuses;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AutobusesRepository
 * @package App\Repositories
 * @version April 18, 2018, 6:04 am UTC
 *
 * @method Autobuses findWithoutFail($id, $columns = ['*'])
 * @method Autobuses find($id, $columns = ['*'])
 * @method Autobuses first($columns = ['*'])
*/
class AutobusesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'plateNumber',
        'seats',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Autobuses::class;
    }
}
