@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card m-2">
                    <div class="card-header text-white" style="background: #343a40">
                        <b style="font-size: x-large">Ordens de Serviços</b>
                        <a href="{{route('admin.service-orders.create')}}" class="btn btn-primary float-right">
                            <i class="fas fa-plus-circle"></i>
                            Nova Ordem de Serviço
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="ordens-de-servico" class="table table-striped">
                            <thead>
                                <tr>
                                    <td style="width: 20%">Setor</td>
                                    <td style="width: 30%">Serviços</td>
                                    <td style="width: 10%">Preço Total</td>
                                    <td style="width: 20%">Data de Abertura</td>
                                    <td style="width: 20%">Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serviceOrders as $serviceOrder)
                                    <tr>
                                        <td>{{$serviceOrder->department->name}}</td>
                                        <td>
                                            @php($services = json_decode($serviceOrder->services))
                                            @foreach($services as $service)
                                                {{$service->name}}<br>
                                            @endforeach
                                        </td>
                                        <td>R$ {{number_format($serviceOrder->total_price, 2, ',', '.')}}</td>
                                        <td>{{$serviceOrder->created_at->format('d/m/Y H:i:s')}}</td>
                                        <td>
                                            <a href="{{route('admin.service-orders.edit', $serviceOrder->id)}}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                                Editar
                                            </a>
                                            <form method="POST" action="{{route('admin.service-orders.destroy', $serviceOrder->id)}}" class="d-inline">
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
        new DataTable('#ordens-de-servico', {
            sortable: true,
            searchable: true
        })
    </script>
@endsection
