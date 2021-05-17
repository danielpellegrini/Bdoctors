@extends('layouts.app')

<title>{{ __('BDoctors - Modifica Profilo') }}</title>

@section('content')

    @php
        $slicedURI = $_SERVER['REQUEST_URI'];

        // Estrapoliamo dall'URI la posizione del valore numerico associato all'id
        preg_match('/[0-9]/', $slicedURI, $matches, PREG_OFFSET_CAPTURE);
        $idPosition = $matches[0][1];
        $idInURL = intval(substr($slicedURI, $idPosition, (strlen($slicedURI) - $idPosition)));
    @endphp

    {{-- Verifichiamo che l'id dell'utente che sta modificando il suo profilo si trovi
        alla posizione estrapolata in precedenza --}}
    @if($idInURL === $user->id)

        <div class="container">
            <div class="col-xl-12 mt-5">
                <a href="{{route('dashboard')}}"><button class="btn btn-navbar-toggler"><i class="far fa-hand-point-left"></i> <span>Torna alla Dashboard</span></button></a>
            </div>

            <nav class="secondary-nav margin-top-container">
                <div>
                    <ul class="justify-content-center">
                        <li>
                            <b class="active-nav">Messaggi ricevuti</b>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="box-general">
                <div class="profile">

                    <div class="row justify-content-md-center">

                        <div class="box-review">
                            @if (count($user->messages) > 0)
                                @foreach ($messages as $message)
                                    <div class="container-review">
                                        <div class="header-review d-flex justify-content-between">
                                            <span class="text-capitalize"><b>{{$message->guest_name}}</b></span>
                                            <span><b>{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y')}}</b></span>
                                        </div>
                                        <h5 class="mt-4 mb-4">{{$message->content}}</h5>
                                        <a href="mailto:{{$message->guest_email}}" class="btn btn-navbar-toggler">
                                            <span>Rispondi a <span class="text-capitalize">{{$message->guest_name}}</span></span>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <h3>Non hai ancora ricevuto nessun messaggio.</h3>
                                <h4>Clicca <a href="/dashboard">qui</a> per tornare alla tua dashboard.</h4>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>


    {{-- Semplice verifica che l'id estrapolato dall'URI non sia superiore agli utenti totali del database --}}
    @elseif($idInURL > count($users) || $idInURL === 0)

        <div class="col-xl-10 col-lg-10 mx-auto mt-4">
            <div class="container">
                <div class="row">
                    <div class="text-left row">
                        <div class="col-lg-7 col-md-7 col-sm-11 text">
                            <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
                            <br>
                            <br>
                            <h5>clicca <button class="btn btn-navbar-toggler" onclick="window.history.back();"><i>qui</i></button>
                                per tornare a quello che stavi facendo.
                            </h5>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-11">
                            <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="col-xl-10 col-lg-10 mx-auto mt-4">
            <div class="col-xl-10 col-lg-10 mx-auto">
                <div class="container">
                    <div class="row">
                        <div class="text-left row">
                            <div class="col-lg-7 col-md-7 col-sm-11 text">
                                <span>Stai cercando di modificare un profilo che non è il tuo.</span>
                                <br>
                                <br>
                                <h5>clicca <button class="btn btn-navbar-toggler" onclick="window.history.back();"><i>qui</i></button>
                                    per tornare a quello che stavi facendo.
                                </h5>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-11">
                                <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif


@endsection
