<?php

namespace App\Repositories;

use App\Models\Instituicao;
use App\Repositories\Contracts\InstituicaoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class InstituicaoRepository extends BaseRepository implements InstituicaoRepositoryInterface
{
    public function __construct(Instituicao $model)
    {
        parent::__construct($model);
    }

    public function retornar()
    {
        return $this->model->collection();
    }
}
