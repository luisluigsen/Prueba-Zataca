<?php

namespace App\Adapters\Http\Controllers;

use App\Application\UseCase\FacturasImpagadasServicio;
use Illuminate\Http\JsonResponse;

class FacturasApagarController extends Controller
{
    protected $facturasApagarService;

    public function __construct(FacturasImpagadasServicio $facturasApagarService)
    {
        $this->facturasApagarService = $facturasApagarService;
    }

    public function obtenerFacturas(): JsonResponse
    {
        $facturas = $this->facturasApagarService->facturasData();
        return response()->json($facturas);
    }
}
