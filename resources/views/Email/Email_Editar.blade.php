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
                    <h1>Editar: {{$email->email_address}}</h1>
                </div>
                <div class="card-body">
                    <form class="card p-2" method="POST" action="{{ route('Email.update', $email->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Email</label>
                            <input required minlength="5" maxlength="255" type="email" class="form-control" name="email_address" value="{{$email->email_address}}">
                        </div>
                        <div>
                            <a href="{{ route('Cliente.show', $email->client_id) }}" class="btn btn-danger">Voltar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection