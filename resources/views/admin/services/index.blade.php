@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card m-2">
                    <div class="card-header text-white" style="background: #343a40">
                        <b style="font-size: x-large">Serviços</b>
                        <a href="{{route('admin.services.create')}}" class="btn btn-primary float-right">
                            <i class="fas fa-plus-circle"></i>
                            Novo Serviço
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="servicos" class="table table-striped">
                            <thead>
                                <tr>
                                    <td style="width: 30%">Nome</td>
                                    <td style="width: 35%">Descrição</td>
                                    <td style="width: 15%">Preço</td>
                                    <td style="width: 20%">Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->description}}</td>
                                        <td>R$ {{$service->price}}</td>
                                        <td>
                                            <a href="{{route('admin.services.edit', $service->id)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                                Editar
                                            </a>
                                            <form method="POST" action="{{route('admin.services.destroy', $service->id)}}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                                                    <i class="fas fa-trash"></i>
                                                    Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        new DataTable('#servicos', {
            sortable: true,
            searchable: true
        })
    </script>
@endsection
