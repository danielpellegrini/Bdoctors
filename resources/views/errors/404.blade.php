@extends('layouts.app')

<title>{{ __('BDoctors - Show') }}</title>

@section('content')


        <div class="container margin-top-container p-4 overflow-hidden">
            <div class="row">
                <div class="text-left row">
                    <div class="col-lg-7 col-md-7 text">
                        <h1>La pagina che hai cercato non esiste!</h1>
                        <br>
                        <h5>clicca <button class="btn btn-navbar-toggler" onclick="window.history.back();"><i>qui</i></button>
                             per tornare a quello che stavi facendo.
                        </h5>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <img class="img-fluid doctor-clipart" src="/img/404.png" alt="404 error">
                    </div>
                </div>
            </div>
        </div>

@endsection
