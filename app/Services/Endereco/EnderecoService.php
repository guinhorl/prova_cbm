<?php

namespace App\Services\Endereco;

use App\Models\Endereco;
use App\Services\Cidade\CidadeService;
use App\Services\Cidade\Iterfaces\ICidadeService;
use App\Services\Endereco\Interfaces\IEnderecoService;
use App\Services\Estado\EstadoService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EnderecoService implements IEnderecoService
{
    /**
     * @throws Exception
     */
    private function viaCep(string $cep){
        try {
            $result = Http::get('https://viacep.com.br/ws/'.$cep.'/json/')->json();
            if (isset($result['erro'])){
                return redirect()->route('endereco.index')->with('errocep', 'CEP não encontrado!');;
            }else{
                return $this->create($result);
            }
        } catch (\Exception $e){
            throw new Exception('Erro ao buscar cep! '. $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function index()
    {
        try {
            $enderecos = Endereco::query()->with('cidade.estado')->get()->all();
            return view('enderecos.index', ['enderecos' => $enderecos]);
        } catch (Exception $e){
            throw new Exception('Erro ao listar os endereços! '. $e->getMessage());
        }
    }

    private function create($data)
    {
        return view('enderecos.create', ['data' => $data]);
    }

    public function store(array $request)
    {
        DB::beginTransaction();
        try {
            Endereco::create($request);
            DB::commit();
            return redirect()->route('endereco.index')->with('msg', 'Salvo com sucesso!');
        }catch (Exception $errors){
            DB::rollBack();
            return 'Mensagem: ' .$errors->getMessage();
        }
    }

    /**
     * @throws Exception
     */
    public function vincularCidadeEstadoEndereco(array $data)
    {
        try {
            $do_endereco = [
                'cep' => $data['cep'],
                'logradouro' => $data['logradouro'],
                'complemento' => $data['complemento'],
                'bairro' => $data['bairro'],
                'cidade_ibge' => $data['ibge']
            ];
            $estado_cod = substr($data['ibge'], 0,-5);
            $da_cidade = [
                'ibge' => $data['ibge'],
                'nome' => $data['cidade'],
                'estado_cod' => $estado_cod
            ];
            $do_estado = [
                'estado_cod' => $estado_cod,
                'uf' => $data['estado']
            ];

            $estado = (new EstadoService());
            if (!$estado->getestado($estado_cod))
                $estado->store($do_estado);

            if ($estado->getestado($estado_cod)){
                $cidade = new CidadeService();
                if (!$cidade->getCidade($data['ibge'])){
                    $cidade->store($da_cidade);
                }
            }

            $this->store($do_endereco);
            return redirect()->route('endereco.index')->with('msg', 'Salvo com sucesso!');

        } catch (Exception $e){
            throw new Exception('Erro na vinculação! '. $e->getMessage());
        }
    }

    public function getCep(array $request)
    {
        $cep = $request['cep'];
        $endereco = Endereco::where('cep', $cep)->first();
        if (empty($endereco)){
            return $this->viaCep($cep);
        }
        return view('enderecos.show', ['data' => $endereco]);
    }

    public function show($id)
    {
        $endereco = Endereco::find($id);
        return view('enderecos.show', ['data' => $endereco]);
    }

    public function edit(int $id)
    {
        $endereco = Endereco::find($id);
        return view('enderecos.editar', ['data' => $endereco]);
    }

    public function update(array $request, int $id)
    {
        DB::beginTransaction();
        try {
            Endereco::where('id',$id)->update([
                'logradouro'  => $request['logradouro'],
                'complemento' => $request['complemento'],
                'bairro'      => $request['bairro']
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
        return redirect()->route('endereco.index')->with('deletado', 'Excluido com sucesso!');
    }
}
