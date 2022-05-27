@extends('layouts.padrao')
@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <h1>Buscar Endereço</h1>
            </div>
        </div>
        <form method="post" action="{{route('endereco.buscar')}}">
            @csrf
            <div class="col">
                <div class="mb-3">
                    <label for="inputCep" class="form-label">Cep</label>
                    <input type="text" id="cep" name="cep" class="form-control cep {{$errors->has('cep') ? 'is-invalid' : ''}}">
                    <div class="invalid-feedback">{{$errors->first('cep')}}</div>
                </div>
            </div>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

    </div>
    <br>
    <br>
    <div class="row">
        <div class="col text-center">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Cep</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($enderecos as $endereco)
                <tr>
                    <td>{{$endereco->cep}}</td>
                    <td>{{$endereco->logradouro}}</td>
                    <td>{{$endereco->bairro}}</td>
                    <td>{{$endereco->cidade}}</td>
                    <td>{{$endereco->estado}}</td>
                    <td>
                        <a href="{{url('/enderecos/'.$endereco->id.'/editar')}}" class="btn btn-outline-info btn-sm" type="button">Editar</a>
                        &nbsp;
                        <a href="{{url('enderecos/'.$endereco->id)}}" class="btn btn-outline-danger btn-sm" type="button">Excluir</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
