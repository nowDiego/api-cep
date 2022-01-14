<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    
    
     /**
     * @OA\Post(
     * tags={"/Consulta CEP"},
     *   path="/cep",
     *   summary="Consultar cep",
     *   description="Consultar cep",        
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="cep", type="string" , example="22020002"),       
       * )
     * ),     
     * @OA\Response(
     * response="200", description="Retornar Cep"
     * ) 
     * )
     *
     */
    public function store(Request $request)   
    {
         
         $request->validate([
            'cep' => 'required|min:8|max:8',          
        ]);     
                       

        $url = "https://viacep.com.br/ws/{$request->cep}/json/";

        $response = Http::get($url);
         
             
        $error = $response->object();

       
          if(isset($error->erro)){
            return response()->json([
           "status"=>false,
           "message"=>'Invalid Cep'
            ]);
        }

        return response()->json([
             "status"=>true,
            "data"=> $response->json()
        ]
        );
    
          
    
    }

 
}
