<?php

namespace App\Services\Endereco\Interfaces;

interface IEnderecoService
{
    public function index();
    public function getCep(array $request);
    public function vincularCidadeEstadoEndereco(array $data);
    public function edit(int $id);
    public function show(int $id);
    public function update(array $request, int $id);
    public function destroy(int $id);

}
