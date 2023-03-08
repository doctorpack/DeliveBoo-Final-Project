@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card border-danger w-50">
        <div class="card-body text-center ">
          <h5 class="card-title"><h1 class="text-uppercase p-3">Accesso non autorizzato</h1></h5>
          <p class="card-text p-2">Non sei autorizzato ad accedere a questa pagina.</p>
          <a href="{{ url('/admin') }}" class="btn btn-primary">Torna alla pagina principale</a>
        </div>
      </div>
</div>
@endsection
