<?php

namespace App\Services\Estado;

use App\Models\Estado;
use App\Services\Estado\Iterfaces\IEstadoService;
use Exception;
use Illuminate\Support\Facades\DB;

class EstadoService implements IEstadoService
{
    public function store(array $estado)
    {
        DB::beginTransaction();
        try {
            $estadoObj = Estado::create($estado);
            DB::commit();
            return $estadoObj;
        }catch (Exception $errors){
            DB::rollBack();
            return 'Mensagem: ' .$errors->getMessage();
        }
    }
    public function getestado($estado_cod)
    {
        return (bool)Estado::find($estado_cod);
    }
}
