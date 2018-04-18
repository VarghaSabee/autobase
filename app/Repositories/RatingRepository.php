<?php

namespace App\Repositories;

use App\Models\Rating;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RatingRepository
 * @package App\Repositories
 * @version April 18, 2018, 4:56 pm UTC
 *
 * @method Rating findWithoutFail($id, $columns = ['*'])
 * @method Rating find($id, $columns = ['*'])
 * @method Rating first($columns = ['*'])
*/
class RatingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'booking_id',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rating::class;
    }
}
