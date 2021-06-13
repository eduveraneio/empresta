<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ConvenioService;

class ConvenioController extends Controller
{
    private $convenioService;

    public function __construct(ConvenioService $convenioService)
    {
        $this->convenioService = $convenioService;
    }

    public function index()
    {
        return $this->convenioService->retornar();
    }
}
