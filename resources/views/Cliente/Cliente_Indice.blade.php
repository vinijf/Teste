@extends('Share')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Clientes</h1>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group select-group">
                                <input type="search" class="form-control mb-2" id="client_search" name="client_search" placeholder="Pesquisar Cliente" @if($client_search !=null) value="{{$client_search}}" @endif />
                                    <select name="client_filter" class="form-control input-group-addon">
                                        <option @if($client_filter==null) selected @endif selected hidden value="%">Filtrar Status</option>
                                        <option @if($client_filter=="%" ) selected @endif value="%">TODOS</option>
                                        <option @if($client_filter=="1" ) selected @endif value="1">ATIVOS</option>
                                        <option @if($client_filter=="0" ) selected @endif value="0">DESATIVADOS</option>
                                    </select>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Status</th>
                                <th scope="col"><a href="{{ route('Cliente.create') }}" class="btn btn-success text-center">Adicionar Cliente</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $c)
                            <tr>
                                <th scope="row">{{$c->id}}</th>
                                <td><a href="{{ route('Cliente.show', $c->id) }}">{{$c->client_name}}</a></td>
                                @if($c->client_status == '1')
                                <td>Ativo</td>
                                <form method="POST" action="{{ route('Status', $c->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <td><button type="submit" class="btn btn-danger">Desativar</button></td>
                                </form>
                                @else
                                <td>Desativado</td>
                                <form method="POST" action="{{ route('Status', $c->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <td><button type="submit" class="btn btn-success">Ativar</button></td>
                                </form>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection