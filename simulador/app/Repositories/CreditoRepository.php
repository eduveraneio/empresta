<?php

namespace App\Repositories;

use App\Models\Instituicao;
use App\Models\Convenio;
use App\Models\Credito;
use App\Repositories\Contracts\CreditoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CreditoRepository extends BaseRepository implements CreditoRepositoryInterface
{
    public function __construct(Credito $model)
    {
        parent::__construct($model);
    }

    public function retornar()
    {
        return $this->model->collection();
    }

    public function simular($request)
    {
        return $this->model->collection($request);
    }
}
