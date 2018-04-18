<?php

namespace App\Repositories;

use App\Models\Routes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoutesRepository
 * @package App\Repositories
 * @version April 18, 2018, 6:11 am UTC
 *
 * @method Routes findWithoutFail($id, $columns = ['*'])
 * @method Routes find($id, $columns = ['*'])
 * @method Routes first($columns = ['*'])
*/
class RoutesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Routes::class;
    }
}
