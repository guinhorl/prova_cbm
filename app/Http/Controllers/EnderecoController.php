<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuscarEnderecoRequest;
use App\Services\Endereco\EnderecoService;
use App\Services\Endereco\Interfaces\IEnderecoService;
use Exception;
use App\Http\Requests\EnderecoRequest;


class EnderecoController extends Controller
{
    private IEnderecoService $service;

    public function __construct()
    {
        $this->service = new EnderecoService();
    }

    /**
     * @throws Exception
     */
    public function index()
    {
        try {
            return $this->service->index();
        } catch (\Exception $e){
            throw new Exception('Erro ao listar os endereços! '. $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function store(EnderecoRequest $request)
    {
        try {
            return $this->service->vincularCidadeEstadoEndereco($request->all());
        }catch (Exception $e){
            throw new Exception('Erro ao cadastrar o endereço! '. $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function getCep(BuscarEnderecoRequest $request)
    {
        try {
            return $this->service->getCep($request->all());
        }catch (Exception $e){
            throw new Exception('Erro na busca do cep! '. $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function edit($id)
    {
        try {
            return $this->service->edit($id);
        }catch (\Exception $e){
            throw new Exception('Erro ao editar o endereço! ' . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function show($id)
    {
        try {
            return $this->service->show($id);
        }catch (\Exception $e){
            throw new Exception('Erro ao exibir! ' . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function update(EnderecoRequest $request, $id)
    {
        try {
            return $this->service->update($request->all(), $id);
        } catch (\Exception $e){
            throw new Exception('Erro na edição! ' . $e->getMessage());
        }

    }

    /**
     * @throws Exception
     */
    public function destroy(string $id)
    {
        try {
            return $this->service->destroy($id);
        }catch (\Exception $e){
            throw new Exception('Erro ao excluir endereço! ' . $e->getMessage());
        }
    }
}
