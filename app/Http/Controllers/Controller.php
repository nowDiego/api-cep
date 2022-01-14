<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Server(url="http://127.0.0.1:8000/api"),
 * @OA\Info(title="API Consulta Cep Laravel",version="1.0")
 * @OA\Schemes={"http", "https"},
 * @OA\SecurityScheme(
 * type="http",
 * scheme="bearer",
 * securityScheme="BasicAuth"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
