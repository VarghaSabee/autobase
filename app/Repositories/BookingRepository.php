<?php

namespace App\Repositories;

use App\Models\Booking;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BookingRepository
 * @package App\Repositories
 * @version April 18, 2018, 5:04 pm UTC
 *
 * @method Booking findWithoutFail($id, $columns = ['*'])
 * @method Booking find($id, $columns = ['*'])
 * @method Booking first($columns = ['*'])
*/
class BookingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'route_ids',
        'status',
        'seats',
        'fare'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Booking::class;
    }
}
