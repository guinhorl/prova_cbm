@extends('layouts.padrao')
@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <h1>SHOW</h1>
                </div>
            </div>
            <form>

                <div class="col">
                    <div class="mb-3">
                        <label for="inputCep" class="form-label">Cep</label>
                        <input type="text" readonly value="{{$data['cep']}}" id="inputCep" name="cep" class="form-control cep {{$errors->has('cep') ? 'is-invalid' : ''}}">
                        <div class="invalid-feedback">{{$errors->first('cep')}}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="inputLogradouro" class="form-label">Logradouro</label>
                        <input type="text" readonly value="{{$data['logradouro']}}" id="inputLogradouro" name="logradouro" class="form-control {{$errors->has('logradouro') ? 'is-invalid' : ''}}">
                        <div class="invalid-feedback">{{$errors->first('logradouro')}}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="inputComplemento" class="form-label">Complemento</label>
                          <input type="text" class="form-control" readonly value="{{$data['complemento']}}" id="inputComplemento" name="complemento">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="inputBairro" class="form-label">Bairro</label>
                        <input type="text" readonly value="{{$data['bairro']}}" id="inputBairro" name="bairro" class="form-control {{$errors->has('bairro') ? 'is-invalid' : ''}}">
                        <div class="invalid-feedback">{{$errors->first('bairro')}}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="inputCidade" class="form-label">Cidade</label>
                        <input type="text" readonly value="{{$data['cidade']}}" id="inputCidade" name="cidade" class="form-control {{$errors->has('cidade') ? 'is-invalid' : ''}}">
                        <div class="invalid-feedback">{{$errors->first('cidade')}}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="inputEstado" class="form-label">Estado</label>
                        <input type="text" readonly value="{{$data['estado']}}" id="inputEstado" name="estado" class="form-control {{$errors->has('estado') ? 'is-invalid' : ''}}">
                        <div class="invalid-feedback">{{$errors->first('estado')}}</div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{url('/enderecos/'.$data['id'].'/editar')}}" class="btn btn-outline-info" type="button">Editar</a>
                    <a href="{{route('endereco.index')}}" class="btn btn-outline-warning" type="button">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
