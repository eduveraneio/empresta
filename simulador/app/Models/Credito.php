<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Credito extends Model
{
    public function collection($request)
    {
        $collection = $this->getJsonCollection($request);
        $collection = $this->getResultCollection($collection, $request->valor_emprestimo);

        return $collection;
    }

    public function getJsonCollection($request)
    {
        $file = dirname(__DIR__).'/Files/taxas_instituicoes.json';
        $data = json_decode(file_get_contents($file));

        $collection = collect($data);
        $collection = $collection->whereIn('instituicao',$request->instituicoes);
        $collection = $collection->whereIn('convenio',$request->convenios);
        //$collection = $collection->whereIn('parcelas',$request->parcela);

        return $collection;
    }

    public function getResultCollection($collection, $valor)
    {
        $result = collect();

        for($i=0; $i<count($collection); $i++) {
            $result->put($i, [
                'taxa' => $collection[$i]->taxaJuros, 
                'parcelas' => $collection[$i]->parcelas,
                'valor_parcela' => number_format($collection[$i]->coeficiente*$valor,2),
                'convenio' => $collection[$i]->convenio,
                'instituicao' => $collection[$i]->instituicao
            ]);
        }
        
        return $result->groupBy(['instituicao'], $preserveKeys = false);
    }
}