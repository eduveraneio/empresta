<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\storage;

class Instituicao extends Model
{
    public function collection()
    {
        $file = dirname(__DIR__).'/Files/instituicoes.json';
        $data = json_decode(file_get_contents($file));

        $collection = collect($data);

        return $collection;
    }
}