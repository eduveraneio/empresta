<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CreditoService;

class CreditoController extends Controller
{
    private $creditoService;

    public function __construct(CreditoService $creditoService)
    {
        $this->creditoService = $creditoService;
    }

    public function store(Request $request)
    {
        return $this->creditoService->simular($request);
    }
}
