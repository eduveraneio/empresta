<?php

namespace App\Services;

use App\Repositories\CreditoRepository;
use Illuminate\Support\Facades\Validator;

class CreditoService
{
    private $creditoRepository;
    
    public function __construct(CreditoRepository $creditoRepository)
    {
        $this->creditoRepository = $creditoRepository;
    }

    public function listar()
    {
        return $this->creditoRepository->listar();
    }

    function simular($request)
    {        
        $validator = Validator::make($request->all(), [
            'valor_emprestimo' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'instituicoes' => 'nullable|array',
            'convenios' => 'nullable|array',
            'parcela' => 'nullable|integer'
        ]);

        if($validator->fails())
            exit('Parametros inválidos');

        return $this->creditoRepository->simular($request);
    }
}
