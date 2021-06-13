<?php

namespace App\Repositories;

use App\Models\Convenio;
use App\Repositories\Contracts\ConvenioRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ConvenioRepository extends BaseRepository implements ConvenioRepositoryInterface
{
    public function __construct(Convenio $model)
    {
        parent::__construct($model);
    }

    public function retornar()
    {
        return $this->model->collection();
    }
}
