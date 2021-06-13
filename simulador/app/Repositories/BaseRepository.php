<?php   

namespace App\Repositories;

use App\Repositories\Contracts\EloquentRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;   

class BaseRepository
{         
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
}