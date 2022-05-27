<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuscarEnderecoRequest;
use App\Models\Endereco;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\EnderecoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EnderecoController extends Controller
{
    public function viaCep($cep){

        $result = Http::get('https://viacep.com.br/ws/'.$cep.'/json/')->json();
        if (isset($result['erro'])){
            return $this->index();
        }else{
            return $this->create($result);
        }
    }
    public function index()
    {
        $enderecos = Endereco::all();
        return view('enderecos.index', ['enderecos' => $enderecos]);
    }

    public function create($data)
    {
        return view('enderecos.create', ['data' => $data]);
    }

    public function store(EnderecoRequest $request)
    {
        DB::beginTransaction();
        try {
            Endereco::create($request->validated());
            DB::commit();
            return redirect()->route('endereco.index');
        }catch (Exception $errors){
            DB::rollBack();
            return 'Mensagem: ' .$errors->getMessage();
        }
    }

    public function show(BuscarEnderecoRequest $request)
    {
        $endereco = Endereco::where('cep', $request->cep)->first();
        if (empty($endereco)){
            return $this->viaCep($request->cep);
        }
        return view('enderecos.show', ['data' => $endereco]);
    }

    public function edit($id)
    {
        $endereco = Endereco::find($id);
        return view('enderecos.editar', ['data' => $endereco]);
    }

    public function update(EnderecoRequest $request, $id)
    {

        DB::beginTransaction();
        try {
            Endereco::where('id',$id)->update([
                'logradouro'  => $request->logradouro,
                'complemento' => $request->complemento,
                'bairro'      => $request->bairro,
                'cidade'      => $request->cidade,
                'estado'      => $request->estado
            ]);
            DB::commit();
            return redirect()->route('endereco.index')->with('msg', 'Alterado com sucesso!');
        }catch (Exception $errors){
            DB::rollBack();
            return 'Mensagem: ' .$errors->getMessage();
        }
    }

    public function destroy($id)
    {
        Endereco::destroy($id);
        return redirect()->route('endereco.index');
    }
}
