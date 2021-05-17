@extends('layouts.app')

<title>{{ __('BDoctors - Show') }}</title>

@section('content')


        <div class="container margin-top-container p-4 overflow-hidden">
            <div class="row">
                <div class="text-left row">
                    <div class="col-lg-7 col-md-7 text">
                        <h1>Il nostro database non risponde, riprova più tardi.</h1>
                        <br>
                        <h5><button class="btn btn-navbar-toggler" onclick="location.reload();"><i class="fas fa-sync"></i></button>
                             Ricarica la pagina.
                        </h5>
                        <h5><button class="btn btn-danger" onclick="window.close();"><i class="far fa-window-close"></i></button>
                             Chiudi la pagina.
                        </h5>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <img class="img-fluid doctor-clipart" src="/img/404.png" alt="404 error">
                    </div>
                </div>
            </div>
        </div>

@endsection
