@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card m-2">
                    <div class="card-header text-white" style="background: #343a40">
                        <b style="font-size: x-large">Setores</b>
                        <a href="{{route('admin.departments.create')}}" class="btn btn-primary float-right">
                            <i class="fas fa-plus-circle"></i>
                            Novo Setor
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="setores" class="table table-striped">
                            <thead>
                                <tr>
                                    <td style="width: 15%">Sigla</td>
                                    <td style="width: 65%">Nome</td>
                                    <td style="width: 20%">Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{$department->acronym}}</td>
                                        <td>{{$department->name}}</td>
                                        <td>
                                            <a href="{{route('admin.departments.edit', $department->id)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                                Editar
                                            </a>
                                            <form method="POST" action="{{route('admin.departments.destroy', $department->id)}}" class="d-inline">
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
        new DataTable('#setores', {
            sortable: true,
            searchable: true
        })
    </script>
@endsection
