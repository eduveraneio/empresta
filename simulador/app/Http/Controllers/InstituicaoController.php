<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstituicaoService;

class InstituicaoController extends Controller
{
    private $instituicaoService;

    public function __construct(InstituicaoService $instituicaoService)
    {
        $this->instituicaoService = $instituicaoService;
    }

    public function index()
    {
        return $this->instituicaoService->retornar();
    }
}
