@extends('layouts.app')

<title>{{ __('BDoctors - Dashboard') }}</title>

@section('content')


    <div class="container-fluid">
        <div class="row">

            <nav class="col-lg-2 col-md-3 d-none d-md-block bg-light sidebar navbar-expand-md">
                <div class="sidebar-sticky ">
                    {{-- immagine di profilo --}}
                    <figure class="doctor-pic-dashboard-container ">
                        <a href="../doctor/{{Auth::user()->id}}">
                        @if(file_exists('storage/'.Auth::user()->detail->pic))

                        <img class="doctor-pic-dashboard"
                                src="{{ URL::asset('storage/'.Auth::user()->detail->pic) }}"
                                alt="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">
                            </a>

                        @elseif(file_exists(Auth::user()->detail->pic))
                            <img class="doctor-pic-dashboard" src="{{ URL::asset(Auth::user()->detail->pic)}}"
                            alt="{{Auth::user()->name}} {{Auth::user()->lastname}}">

                        @else

                            <a href="../doctor/{{Auth::user()->id}}"><img class="doctor-pic-dashboard"
                                src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                                alt="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">
                            </a>

                        @endif
                    </figure>

                    <div class="collapse navbar-collapse margin-top-container" id="navbarSupportedContent">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../admin/doc/{{$user->id}}/edit ">
                                    <span data-feather="home"></span>
                                    Modifica il profilo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../myMessages/{{$user->id}}">
                                    <span data-feather="file"></span>
                                    Messaggi ricevuti
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../myReviews/{{$user->id}}">
                                    <span data-feather="shopping-cart"></span>
                                    Recensioni ricevute
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="payment/make">
                                    <span data-feather="users"></span>
                                    Sponsorizzazione profilo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../admin/chart-js/reviews/{{$user->id}}">
                                    <span data-feather="bar-chart-2"></span>
                                    Statistiche
                                </a>
                            </li>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModalCenter{{ $user->id }}">
                                ELIMINA PROFILO
                            </button>

                            {{-- modale --}}
                            <div class="modal fade" id="exampleModalCenter{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" data-backdrop="false">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">SEI SICURO DI VOLER ELIMINARE
                                                IL PROFILO?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            L'AZIONE E' IRREVERSIBILE
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annulla</button>
                                            <form action="{{ route('doc.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Elimina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- fine modale --}}

                        </ul>
                    </div>
                </div>
            </nav>

            {{-- dropdown attivo da 992px in giù --}}
            <div class="container-fluid navbar-sidebar">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-light p-4 row">
                        {{-- immagine di profilo --}}
                        <div class="col-sm-4">

                            <figure class="doctor-pic-dashboard-container ">
                                @if(file_exists('storage/'.$user->detail->pic))

                                    <a href="../doctor/{{$user->id}}">
                                        <img class="doctor-pic-dashboard" src="{{ URL::asset('storage/'.$user->detail->pic) }}"
                                        alt="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">
                                    </a>

                                @elseif(file_exists($user->detail->pic))
                                    <img class="doctor-pic-dashboard" src="{{ URL::asset($user->detail->pic)}}"
                                    alt="{{$user->name}} {{$user->lastname}}">

                                @else

                                    <a href="../doctor/{{$user->id}}"><img class="doctor-pic-dashboard"
                                        src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                                        alt="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">
                                    </a>

                                @endif
                            </figure>

                        </div>

                        {{-- dropdown visalizza info --}}
                        <div class="col-sm-8 col-auto links">

                            <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                            <a class="nav-link" href="../admin/doc/{{$user->id}}/edit ">
                                <span data-feather="home"></span>
                                Modifica il profilo
                            </a>
                            <a class="nav-link" href="../myMessages/{{$user->id}}">
                                <span data-feather="file"></span>
                                Messaggi ricevuti
                            </a>
                            <a class="nav-link" href="../myReviews/{{$user->id}}">
                                <span data-feather="shopping-cart"></span>
                                Recensioni ricevute
                            </a>
                            <a class="nav-link" href="payment/make">
                                <span data-feather="users"></span>
                                Sponsorizzazione profilo
                            </a>
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Statistiche
                            </a>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModalCenter{{ $user->id }}">
                                ELIMINA PROFILO
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-light bg-light">
                    <button class="navbar-toggler btn-navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="far fa-eye"> Visualizza info</span>
                    </button>
                </nav>
                <hr>
            </div>

            <section role="main" class="margin-top-container col-lg-10 col-md-12 ml-sm-auto ml-md-auto px-6">

                <div class="card-deck">

                    {{-- card messaggi ricevuti --}}
                    <div class="card">
                        <nav class="secondary-nav text-center">
                            <div>
                                <ul>
                                    <li class="active-nav">
                                        <b>Messaggi ricevuti</b>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="card-body text-left">

                            @if(isset($message))

                                <div>
                                    <small class="text-muted text-capitalize d-block">Nome: {{$message->guest_name}}</small>
                                    <small class="text-muted">Email: {{$message->guest_email}}</small>
                                    <p class="margin-top-container">{{$message->content}}</p>
                                </div>

                            @else

                                <div>
                                    <small class="text-muted">Nessun messaggio trovato.</small>
                                </div>

                            @endif
                            @if (isset($message))

                            <a href="mailto:{{$message->guest_email}}" class="btn btn-navbar-toggler">
                                <span>Rispondi a <span class="text-capitalize">{{$message->guest_name}}</span></span>
                            </a>
                            @endif
                        </div>

                        <div class="card-footer">
                            @if(isset($message))

                                <small class="text-muted">Ultimo messaggio ricevuto il
                                    {{ \Carbon\Carbon::parse($message->updated_at)->format('d/m/Y')}}
                                </small>
                                <small class="text-muted">alle
                                    {{ \Carbon\Carbon::parse($message->updated_at)->addHour(2)->format('H:i')}}
                                </small>

                            @endif

                        </div>
                    </div>

                    {{-- card recensoni ricevute --}}
                    <div class="card">
                        <nav class="secondary-nav text-center">
                            <div>
                                <ul>
                                    <li class="active-nav">
                                        <b>Recensioni ricevute</b>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="card-body text-left">
                            @if(isset($review))

                                <div>
                                    <small class="text-muted text-capitalize d-block">Nome: {{$review->name}}</small>
                                    <small class="text-muted">Email: {{$review->email}}</small>
                                    <p class="margin-top-container">{{$review->body}}</p>
                                </div>

                            @else

                                <div>
                                    <small class="text-muted">Nessuna recensione trovata.</small>
                                </div>

                            @endif
                        </div>
                        <div class="card-footer">
                            @if(isset($review))

                                <small class="text-muted">Ultima recensione ricevuta il
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}
                                </small>
                                <small class="text-muted">alle
                                    {{ \Carbon\Carbon::parse($review->created_at)->addHour(2)->format('H:i')}}
                                </small>

                            @endif
                        </div>
                    </div>

                    {{-- card sponsorizzazione profilo --}}
                    <div class="card">

                        <nav class="secondary-nav text-center">
                            <div>
                                <ul>
                                    <li class="active-nav">
                                        <b>Sponsorizzazione</b>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                        <div class="card-body text-left">
                            <div>

                                @if(isset($activeSponsor))

                                    <div>
                                        @if(\Carbon\Carbon::parse($activeSponsor['created_at'])->addHour($chosenSponsor->duration)->gte(\Carbon\Carbon::now()))
                                            <h4 class="mb-4">
                                                Sponsorizzazione in corso:
                                                <span class="department chosen_sponsor">{{$chosenSponsor->type}}</span>
                                            </h4>
                                            <h4>
                                                Data scadenza:
                                                <span class="department chosen_sponsor">
                                                    {{ \Carbon\Carbon::parse($activeSponsor['created_at'])->addHour($chosenSponsor->duration)->translatedFormat('d M Y')}}
                                                    <small>alle</small>
                                                    {{ \Carbon\Carbon::parse($activeSponsor['created_at'])->addHour($chosenSponsor->duration)->format('H:i')}}
                                                </span>
                                            </h4>
                                            <small>(</small>
                                            {{ \Carbon\Carbon::now()->addHour($chosenSponsor->duration)->diffForHumans()}}
                                            <small>)</small>
                                        @else
                                            <span class="text-muted">La tua ultima sponsorizzazione è scaduta!</span>
                                        @endif

                                    </div>

                                @else

                                    <div>
                                        <small class="text-muted">Nessuna sponsorizzazione trovata.</small>
                                    </div>

                                @endif

                            </div>
                        </div>

                        <div class="card-footer">
                            @if (isset($activeSponsor))
                                <small class="text-muted">Ultima sponsorizzazione il
                                    {{ \Carbon\Carbon::parse($activeSponsor['created_at'])->format('d/m/y')}}
                                    alle
                                    {{ \Carbon\Carbon::parse($activeSponsor['created_at'])->format('H:i')}}
                                </small>

                            @endif
                        </div>


                    </div>


                </div>

            </section>

        </div>
        {{-- row --}}
    </div>
    {{-- container fluid --}}

@endsection
