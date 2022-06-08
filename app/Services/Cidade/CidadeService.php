<?php

namespace App\Services\Cidade;

use App\Models\Cidade;
use App\Services\Cidade\Iterfaces\ICidadeService;
use Exception;
use Illuminate\Support\Facades\DB;

class CidadeService implements ICidadeService
{
    public function store(array $cidade)
    {
        DB::beginTransaction();
        try {
            $cidadeObj = Cidade::create($cidade);
            DB::commit();
            return $cidadeObj;
        }catch (Exception $errors){
            DB::rollBack();
            return 'Mensagem: ' .$errors->getMessage();
        }
    }

    public function getCidade($ibge)
    {
        return (bool)Cidade::find($ibge);
    }
}
