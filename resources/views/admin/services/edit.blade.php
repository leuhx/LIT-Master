@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card m-2">
                    <div class="card-header text-white" style="background: #343a40">
                        <b style="font-size: x-large">Editar Serviço</b>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.services.update', $service->id)}}">
                            @method('PUT')
                            @csrf
                            <x-adminlte-input name="name" label="Nome" placeholder="Nome do Serviço" value="{{$service->name}}"/>
                            <x-adminlte-textarea name="description" label="Descrição" placeholder="Descrição do Serviço">
                                {{$service->description}}
                            </x-adminlte-textarea>
                            <x-adminlte-input type="number" min="0.00" step="0.01" name="price" label="Preço" placeholder="Preço do Serviço" value="{{$service->price}}"/>

                            <button type="submit" class="btn btn-primary float-right">Salvar</button>
                            <a href="{{route('admin.services.index')}}" class="btn btn-secondary float-right mx-2">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
