<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Credito extends Model
{
    public function collection($request)
    {
        $collection = $this->getJsonCollection();
        
        if(count($request->instituicoes))
            $collection = $collection->whereIn('instituicao', $request->instituicoes);
        
        if(count($request->convenios))
            $collection = $collection->whereIn('convenio', $request->convenios);

        if($request->parcela)
            $collection = $collection->where('parcelas', $request->parcela);
        
        $collection = $this->getResultCollection($collection->values(), $request->valor_emprestimo);

        return $collection;
    }

    public function getJsonCollection()
    {
        $file = dirname(__DIR__).'/Files/taxas_instituicoes.json';
        $data = json_decode(file_get_contents($file));

        $collection = collect();

        for($i=0; $i<sizeof($data); $i++) {
            $collection->put($i, [
                'parcelas' => $data[$i]->parcelas, 
                'taxaJuros' => $data[$i]->taxaJuros,
                'coeficiente' => $data[$i]->coeficiente,
                'convenio' => $data[$i]->convenio,
                'instituicao' => $data[$i]->instituicao
            ]);
        }
            
        return $collection;
    }

    public function getResultCollection($data, $valor)
    {
        $collection = collect();

        for($i=0; $i<sizeof($data); $i++) {
            $collection->put($i, [
                'taxa' => $data[$i]['taxaJuros'], 
                'parcelas' => $data[$i]['parcelas'],
                'valor_parcela' => number_format($data[$i]['coeficiente']*$valor,2),
                'convenio' => $data[$i]['convenio'],
                'instituicao' => $data[$i]['instituicao']
            ]);
        }
        
        $collection = $collection->groupBy(['instituicao'], $preserveKeys = false);

        return $collection;
    }
}
