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
                    <h1>Adicionar Cliente</h1>
                </div>
                <div class="card-body">
                    <form class="card p-2" method="POST" action="{{ route('Cliente.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nome</label>
                            <input required minlength="5" maxlength="255" type="text" class="form-control" name="client_name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input required minlength="5" maxlength="255" type="email" class="form-control" name="email_address">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input required  type="number" class="form-control" name="telephone_number">
                        </div>
                        <div>
                            <a href="{{ route('Cliente.index') }}" class="btn btn-danger">Voltar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection