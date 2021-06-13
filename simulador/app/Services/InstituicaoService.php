<?php

namespace App\Services;

use App\Repositories\InstituicaoRepository;

class InstituicaoService
{
    private $instituicaoRepository;
    
    public function __construct(InstituicaoRepository $instituicaoRepository)
    {
        $this->instituicaoRepository = $instituicaoRepository;
    }

    public function retornar()
    {     
        return $this->instituicaoRepository->retornar();

    }
}
