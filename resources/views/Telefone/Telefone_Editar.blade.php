@extends('Share')

@section('content')
@if($errors->any())
<div class="container">
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Editar: {{$telephone->telephone_number}}</h1>
                </div>
                <div class="card-body">
                    <form class="card p-2" method="POST" action="{{ route('Telefone.update', $telephone->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Telefone</label>
                            <input required minlength="5" maxlength="255" type="number" class="form-control" name="telephone_number" value="{{$telephone->telephone_number}}">
                        </div>
                        <div>
                            <a href="{{ route('Cliente.show', $telephone->client_id) }}" class="btn btn-danger">Voltar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection