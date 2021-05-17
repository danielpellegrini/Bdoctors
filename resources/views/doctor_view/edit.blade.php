    @extends('layouts.app')

    <title>{{ __('BDoctors - Modifica Profilo') }}</title>
    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
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

    <div class="container margin-top-container">
        <div class="col-xl-12 mt-4 mb-4">
            <a href="{{route('dashboard')}}"><button class="btn btn-navbar-toggler"><i class="far fa-hand-point-left"></i> <span>Torna alla Dashboard</span></button></a>
        </div>

        <form method="post" action="{{ route('doc.update', $user->id) }}" enctype="multipart/form-data">

            @METHOD('PATCH')
            @csrf

            <nav class="secondary-nav">
                <div>
                    <ul>
                        <li class="active-nav">
                            <b>Il mio profilo</b>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="box-general">
                <div class="profile">
                    <div class="form-group d_flex_column">
                        <div class="row container-box1">
                            {{-- pic --}}
                            <div class="col-md-5 offset-col-md-2">
                                <figure class=" doctor-pic-show-container">
                                    @if(file_exists('storage/'.$user->detail->pic))

                                        <img class="doctor-pic-show" src="{{ URL::asset('storage/'.$user->detail->pic)}}"
                                            alt="{{$user->name}} {{$user->lastname}}">

                                    @elseif(file_exists($user->detail->pic))
                                        <img class="doctor-pic-show" src="{{ URL::asset($user->detail->pic)}}"
                                        alt="{{$user->name}} {{$user->lastname}}">

                                    @else

                                        <img class="doctor-pic-show" src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                                            alt="{{$user->name}} {{$user->lastname}}">

                                    @endif
                                </figure>
                            </div>
                            {{-- name --}}
                            <div class="col-md-5 align-self-center">
                                <label class="" for="name"><b>Nome</b></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Insert your name" value="{{$user->name}}" required>
                                <br>
                                {{-- last name --}}
                                <label class="" for="lastname"><b>Cognome</b></label>
                                <input type="text" name="lastname" id="lastname" class="form-control"
                                    placeholder="Insert your lastname" value="{{$user->lastname}}" required>
                                <br>
                            </div>
                        </div>
                        <div class="row container-box2">

                            {{-- address --}}
                            <div class="col-md-4">
                                <label class="" for="address"><b>Indirizzo</b></label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Insert your address" value="{{$user->address}}" required>
                            </div>
                            {{-- Email --}}
                            <div class="col-md-4">
                                <label class="" for="email"><b>Email</b></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Insert your email" value="{{$user->email}}" required>
                            </div>
                            {{-- <label class="" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Change your password">
                                            <br> --}}
                            {{-- phone --}}
                            <div class="col-md-4">
                                <label class="" for="phone"><b>Numero di telefono</b></label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Insert your phone" value="{{$userDetail->phone}}">
                            </div>
                        </div>
                        {{-- departments --}}
                        <div class="text-center mt-4">
                            <div><b>Specializzazioni attuali:</b></div>
                            <div>
                            @foreach ($user->departments as $index => $department)
                                @if(($index + 1) !== count($user->departments))
                                    <span class="department">{{$department->type}},</span>
                                @else
                                    <span class="department">{{$department->type}}</span>
                                @endif
                        @endforeach
                    </div>

                        @php
                            $takenDepartments = [];
                            foreach($user->departments as $index => $userDepartment) {
                                foreach($departments as $department) {
                                    if($department->id === $userDepartment->id) {
                                        array_push($takenDepartments, $index);
                                    }
                                }
                            }
                        @endphp

                        <label for="departments"><b>Lista specializzazioni disponibili</b></label>
                        <select class="form-control h-25" name="departments[]" id="departments" multiple>
                            @foreach($departments as $index => $department)
                                    @if(!in_array($index, $takenDepartments))
                                        <option value="{{$department->id}}">{{$department->type}}</option>
                                    @endif
                            @endforeach
                        </select>
                        </div>
                        {{-- <multiple-select-departments></multiple-select-departments> --}}


                        {{-- curriculum --}}
                        <div class="text-center mt-4">
                        <label for="curriculum"><b>Curriculum</b></label>
                        <textarea style="resize: none;" class="form-control " id="curriculum" name="curriculum" rows="10">
                            {{$userDetail->curriculum}}
                        </textarea>`
                        </div>

                        {{-- upload --}}
                        <div class="text-center">
                            <label for="pic"><b>Immagine del profilo</b></label>
                            <input class="form-control p-2 height-input " type="file" name="pic" id="pic">

                            <button onclick="window.history.back();" class="btn btn-danger mt-4 mr-3">Annulla</button>
                            <button type="submit" class="btn btn-success mt-4">Conferma</button>
                        </div>


                    </div>
                </div>
            </div>
        </form>
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
