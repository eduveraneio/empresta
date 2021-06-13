<?php

namespace App\Services;

use App\Repositories\ConvenioRepository;

class ConvenioService
{
    private $convenioRepository;
    
    public function __construct(ConvenioRepository $convenioRepository)
    {
        $this->convenioRepository = $convenioRepository;
    }

    public function retornar()
    {     
        return $this->convenioRepository->retornar();

    }
}
