<?php

namespace App\Repositories;

use App\Models\available;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class availableRepository
 * @package App\Repositories
 * @version April 21, 2018, 7:22 am UTC
 *
 * @method available findWithoutFail($id, $columns = ['*'])
 * @method available find($id, $columns = ['*'])
 * @method available first($columns = ['*'])
*/
class availableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'route_id',
        'route_name',
        'bus_id',
        'bus_plate_number',
        'seats'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return available::class;
    }
}
