@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card m-2">
                    <div class="card-header text-white" style="background: #343a40">
                        <b style="font-size: x-large">Editar Setor</b>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.departments.update', $department->id)}}">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <x-adminlte-input name="acronym" label="Sigla" placeholder="Sigla do Setor" value="{{$department->acronym}}"/>
                                </div>
                                <div class="col-9">
                                    <x-adminlte-input name="name" label="Nome" placeholder="Nome do Setor" value="{{$department->name}}"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Salvar</button>
                            <a href="{{route('admin.departments.index')}}" class="btn btn-secondary float-right mx-2">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
