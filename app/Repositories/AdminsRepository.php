<?php

namespace App\Repositories;

use App\Models\Admins;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AdminsRepository
 * @package App\Repositories
 * @version April 18, 2018, 5:13 pm UTC
 *
 * @method Admins findWithoutFail($id, $columns = ['*'])
 * @method Admins find($id, $columns = ['*'])
 * @method Admins first($columns = ['*'])
*/
class AdminsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'image',
        'password',
        'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Admins::class;
    }
}
