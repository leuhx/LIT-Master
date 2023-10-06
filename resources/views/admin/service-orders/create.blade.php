@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card m-2">
                    <div class="card-header">Nova Ordem de Serviço</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.service-orders.store')}}">
                            @csrf
                            <x-adminlte-select name="department_id" label="Setor">
                                <option value="">Selecione um Setor</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </x-adminlte-select>

                            <x-adminlte-select2 id="services" name="services[]" label="Serviços" data-placeholder="Selecione os Serviços" multiple>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </x-adminlte-select2>

                            <button type="submit" class="btn btn-primary float-right">Salvar</button>
                            <a href="{{route('admin.service-orders.index')}}" class="btn btn-secondary float-right mx-2">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#services').select2();
        });
    </script>
@endsection
