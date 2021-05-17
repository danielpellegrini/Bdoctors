@extends('layouts.app')

<title>{{ __('BDoctors - Show') }}</title>

@section('content')

<div id="app">
    <div class="container margin-top-container">
        <div class="row">

            @if(isset($user->id))
            {{-- INFO GENERALI --}}
            <div class="col-xl-12 col-lg-12 mx-auto">
                <nav class="secondary-nav">
                    <div class="row">
                        <ul class="col-xl-12 d-flex justify-content-around">
                            <li class="active-nav">
                                Info Generali
                            </li>
                            <li>
                                <a href="#reviews-nav">Recensioni</a>
                            </li>
                            <li>
                                <a href="#curriculum-nav">Curriculum</a>
                            </li>
                            @guest
                            <li>
                                <a href="#add-reviews-nav">Lascia una recensione</a>
                            </li>
                            @endguest

                        </ul>
                    </div>
                </nav>

                {{-- box con shadow --}}
                <div class="box-general">
                    <div class="profile">

                        <div class="row">

                            {{-- LATO SINISTRO --}}
                            <div class="col-xl-4 col-lg-4 col-md-6 ml-sm-auto">
                                {{-- immagine dottore --}}
                                <figure class="doctor-pic-show-container centering">
                                    @if(file_exists('storage/'.$user->detail->pic))

                                    <img class="doctor-pic-show" src="{{ URL::asset('storage/'.$user->detail->pic)}}"
                                        alt="{{$user->name}} {{$user->lastname}}">

                                    @elseif(file_exists($user->detail->pic))
                                            <img class="doctor-pic-show" src="{{ URL::asset($user->detail->pic)}}"
                                        alt="{{$user->name}} {{$user->lastname}}">

                                    @else
                                        <img class="doctor-pic-show"
                                            src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                                            alt="{{$user->name}} {{$user->lastname}}">

                                    @endif
                                </figure>
                            </div>

                            {{-- PARTE CENTRALE E LATO DESTRO --}}
                            <div class="col-xl-8 col-lg-8 col-md-6 ml-sm-auto">
                                <div class="row">

                                    {{-- PARTE CENTRALE --}}
                                    <div class="col-xl-6 col-lg-6 info centering">

                                        {{-- nome cognome dottore --}}
                                        @if(isset($activeSponsor) && \Carbon\Carbon::parse($activeSponsor['created_at'])->addHour($chosenSponsor->duration)->gte(\Carbon\Carbon::now()))
                                          <div><h3 class="font-show">{{$user->name}} {{$user->lastname}}</h3><i class="fas fa-medal fa-lg ml-2 icon-sponsorshow" alt="badge-sponsorizzazione"></i></div>
                                          @else
                                          <div><h3 class="font-show">{{$user->name}} {{$user->lastname}}</h3></div>
                                         @endif

                                        @foreach ($user->departments as $department)
                                            <h5 class="department">{{$department->type}}</h5>
                                        @endforeach

                                        @php
                                            $voteSum = 0;

                                            foreach ($user->votes as $vote) {
                                            $voteSum += $vote->value;
                                            }

                                            if(count($user->votes) > 0) {
                                            $voteAverage = $voteSum / count($user->votes);
                                            } else {
                                            $voteAverage = 0;
                                            }

                                        @endphp

                                        {{-- media voti dottore --}}
                                        <span>
                                            Media voti:
                                            @for ($f = 0; $f < intval(ceil($voteAverage)); $f++) <i class="fas fa-star">
                                                </i>
                                            @endfor

                                            @for ($e = 0; $e < (5 - intval(ceil($voteAverage))); $e++) <i
                                                    class="far fa-star"></i>
                                            @endfor
                                        </span>

                                    </div>

                                    {{-- PARTE DESTRA --}}
                                    <div class="col-xl-6 col-lg-6 centering">

                                        {{-- Servizi medici --}}
                                        <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Prestazioni Mediche
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mx-3">
                                                        <div class="md-form mb-5">
                                                            @foreach ($medicalServices as $medicalService)
                                                            <div class="d-flex justify-content-between">
                                                                <span>{{$medicalService->name}}</span>
                                                                <button data-toggle="modal" data-target="#modalContactForm" class="btn btn-success">{{$medicalService->price}}€</button>
                                                            </div>
                                                            <hr>
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">CHIUDI</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>{{$medicalService->name}}</span>
                                            <button class="btn-success">{{$medicalService->price}}€</button>
                                        </div>
                                        <hr>

                                        <div>
                                            <a class="btn btn-success btn-rounded mb-3 p-3" data-toggle="modal"
                                                data-target="#modalSubscriptionForm">Visualizza tutte le prestazioni
                                                mediche
                                            </a>
                                        </div>

                                        {{-- form per inviare un messaggio al dottore --}}
                                        <form action="{{ route('message.store', [ 'user_id' => $user->id]) }}" method="post" class="needs-validation" novalidate>
                                            @csrf
                                            @method('POST')
                                            <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold">Scrivi un
                                                                messaggio</h4>
                                                            <button type="submit" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body mx-3">
                                                            <div class="md-form mb-5 position-relative form-group">
                                                                <i class="fas fa-user prefix grey-text"></i>
                                                                <label for="name" data-error="wrong"
                                                                data-success="right"> Nome</label>
                                                                    <input type="text" name="guest_name" id="form34" placeholder="Nome"
                                                                    class="form-control {{ $errors->has('guest_name') ? 'is-invalid' : ''}}" required>
                                                                    <div class="invalid-tooltip">
                                                                        <span>Questo campo è obbligatorio.</span>
                                                                    </div>
                                                            </div>

                                                            <div class="md-form mb-5 position-relative form-group">
                                                                <i class="fas fa-envelope prefix grey-text"></i>
                                                                <label for="email" data-error="wrong"
                                                                data-success="right"> E-mail</label>
                                                                <input type="email" name="guest_email" id="form29" placeholder="Email"
                                                                class="form-control {{ $errors->has('guest_email') ? 'is-invalid' : ''}}" required>
                                                                <div class="invalid-tooltip">
                                                                    <span>Questo campo è obbligatorio.</span>
                                                                </div>
                                                            </div>


                                                            <div class="md-form mb-5 position-relative form-group">
                                                                <i class="fas fa-pencil-alt"></i>
                                                                <label for="body" data-error="wrong"
                                                                data-success="right"> Messaggio</label>
                                                                <textarea name="content" type="text" id="form8" placeholder="Messaggio"
                                                                    class="md-textarea form-control {{ $errors->has('content') ? 'is-invalid' : ''}}" rows="4" required></textarea>
                                                                <div class="invalid-tooltip">
                                                                    <span>Questo campo è obbligatorio.</span>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">CHIUDI</button>
                                                            <button class="btn btn-success"><i class="far fa-paper-plane"></i> Invia</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <div>
                                            <a href="" class="btn btn-primary btn-rounded mb-4 p-3" data-toggle="modal"
                                                data-target="#modalContactForm">Invia un messaggio a {{$user->name}}
                                                {{$user->lastname}}
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- info dottore --}}
                        <div class="col-xl-12 col-lg-12 col-md-6 ml-sm-auto centering">
                            <span><b>Indirizzo:</b> {{$user->address}}</span>
                            <br>
                            <span><b>Email:</b> {{$user->email}}</span>
                            <br>
                            <span><b>Telefono:</b> {{$user->detail->phone}}</span>
                        </div>

                    </div>

                </div>
            </div>

            {{-- SCHEDE SOTTOSTANTI --}}
            <div class="col-xl-12 col-lg-12 mx-auto">

                {{--************ RECENSIONI ************--}}
                <nav id="reviews-nav" class="secondary-nav margin-top-container">
                    <div>
                        <ul class="justify-content-center">
                            <li>
                                <b class="active-nav">Recensioni</b>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="box-general">
                    <div class="profile">

                        <div class="row justify-content-md-center">
                            @if (count($user->reviews) > 0)

                            @foreach ($reviews as $review)
                                <div class="container-review col-md-11">
                                    <div class="header-review d-flex justify-content-between">
                                        <h5 class="text-capitalize"><b>{{$review->name}}</b></h5>
                                        <h5><b>{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</b></h5>
                                    </div>
                                    <span>{{$review->body}}</>
                                </div>
                            @endforeach

                            @else

                            <span class="text-muted">Questo dottore non ha ancora recensioni.</span>

                            @endif

                        </div>

                    </div>
                </div>

                {{--************ CURRICULUM ************--}}
                <nav id="curriculum-nav" class="secondary-nav margin-top-container">
                    <div>
                        <ul class="justify-content-center">
                            <li>
                                <b class="active-nav">Curriculum</b>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="box-general">
                    <div class="profile">
                        <div class="row">
                            <div class="curriculum p-4">
                                @if(isset($user->detail->curriculum))
                                @markdown($user->detail->curriculum)
                                @else
                                <span class="text-muted">Questo dottore non ha ancora inserito un curriculum.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{--************ RECENSIONE ************--}}
                @guest
                <nav id="add-reviews-nav" class="secondary-nav margin-top-container">
                    <div>
                        <ul class="justify-content-center">
                            <li>
                                <b class="active-nav">Lascia una recensione</b>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="box-general">
                    <div class="profile">
                        <div>
                            <form class="needs-validation" action="{{ route('review.store', [ 'user_id' => $user->id]) }}" method="post" novalidate>
                                @csrf
                                @method('POST')

                                <div class="form-group position-relative">
                                    <label for="name" class="form-label">Nome</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                        type="text" name="name" placeholder="Nome" required>
                                    <div class="invalid-tooltip">
                                        <span>Questo campo è obbligatorio.</span>
                                    </div>
                                </div>

                                <div class="form-group position-relative mt-5">
                                    <label for="email">Email</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                                        type="text" name="email" placeholder="Email" required>
                                    <div class="invalid-tooltip">
                                        <span>Questo campo è obbligatorio.</span>
                                    </div>
                                </div>

                                <div class="form-group position-relative mt-5">
                                    <label for="body">Testo </label>
                                    <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}"
                                        type="text" name="body" placeholder="Testo" rows="6" required></textarea>
                                    <div class="invalid-tooltip">
                                        <span>Questo campo è obbligatorio.</span>
                                    </div>
                                </div>

                                {{-- <input class="btn btn-success mt-4" type="submit" value="Invia"> --}}



                            {{-- form per votare il dottore --}}

                                <form action="{{ route('send.vote', $user->id) }}" method="post">
                                    @csrf
                                    @method('POST')

                                    <label class="col-lg-12 mt-4" for="votes[]">Vota il dottore</label>
                                    <select class="form-control votes-form col-lg-3 col-md-3 d-inline-block" id="votes[]"
                                        name="votes[]">
                                        <option value="default">Seleziona un voto</option>
                                        @foreach ($votes as $vote)
                                            <option required value="{{ $vote->id }}">{{ $vote->value }}</option>
                                        @endforeach
                                    </select>

                                    <div class="mt-5 col-xl-12 text-center">
                                        <input class="send_button btn btn-success "
                                        type="submit" value="Invia">
                                    </div>
                                </form>
                            </form>
                            @endguest

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @else

        <div class="container">
            <div class="row">
                <div class="text-left row">
                    <div class="col-lg-7 col-md-7 col-sm-11 text">
                        <span>Spiacenti, il medico che hai richiesto non è presente nel nostro database.</span>
                        <br>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-11">
                        <img class="img-fluid doctor-clipart" src="../../../img/doctor-clipart.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        @endif

    </div>
    {{-- row --}}

</div>
{{-- container --}}

</div>

@endsection
