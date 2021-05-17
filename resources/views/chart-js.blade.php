<!DOCTYPE html>
<html>

    <head>
        <title>{{ __('BDoctors - Grafico') }}</title>
            <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>

    <body>
        <div id="app">

            <go-top bg-color="#1DB487" :bottom="50"></go-top>
            @include('layouts/guest/partials/navbar')

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


            <div class="margin-top-chart overflow-hidden">
                <div class="row p-4">
                    <div class="col-xl-2 col-md-3 col-md-12">
                        <a href="{{route('dashboard')}}"><button class="btn btn-navbar-toggler"><i class="far fa-hand-point-left"></i> <span>Torna alla Dashboard</span></button></a>
                    </div>

                </div>

                <div class="row d-flex justify-content-center">

                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mt-3 mb-5">
                        <canvas id="bar-chart" width="500" height="500"></canvas>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mt-3 mb-5">
                        <canvas id="bar1-chart" width="500" height="500"></canvas>
                    </div>
                    <div class="col-xl-12 mt-5 p-5">
                        <canvas id="bar2-chart" width="1000" height="300"></canvas>
                    </div>

                </div>

            </div>

        {{-- Semplice verifica che l'id estrapolato dall'URI non sia superiore agli utenti totali del database --}}
        @elseif($idInURL > count($users) || $idInURL === 0)

            <div class="col-xl-10 col-lg-10 mx-auto mt-4">
                <div class="container">
                    <div class="row margin-top-container">
                        <div class="text-left row margin-top-container">
                            <div class="col-lg-7 col-md-7 col-sm-11 text margin-top-container">
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
                        <div class="row margin-top-container">
                            <div class="text-left row margin-top-container">
                                <div class="col-lg-7 col-md-7 col-sm-11 text margin-top-container">
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

            @include('layouts/guest/partials/footer')
        </div>

        <!-- javascript -->
        <script>
            $(function () {
                //get the bar chart canvas
                var cData = JSON.parse(`<?php echo $dataCollection[0]['chart_data']; ?>`);
                var cDataM = JSON.parse(`<?php echo $dataCollection[1]['chart1_data'] ?>`);
                var cDataV = JSON.parse(`<?php echo $dataCollection[2]['chart2_data']; ?>`);

                var ctx = $("#bar-chart");
                var ctx1 = $("#bar1-chart");
                var ctx2 = $("#bar2-chart");

                var data = {
                    labels: cData.label,
                    datasets: [{
                        label: cData.label,
                        data: cData.data,
                        backgroundColor: [
                            "#DEB887",
                            "#A9A9A9",
                            "#DC143C",
                            "#F4A460",
                            "#2E8B57",
                            "#1D7A46",
                            "#CDA776",
                        ],
                        borderColor: [
                            "#CDA776",
                            "#989898",
                            "#CB252B",
                            "#E39371",
                            "#1D7A46",
                            "#F4A460",
                            "#CDA776",
                        ],
                        borderWidth: [1, 1, 1, 1, 1, 1, 1]
                    }]
                };

                //options
                var options = {
                    responsive: true,
                    title: {
                        display: true,
                        position: "top",
                        text: "Recensioni ricevute nell'ultima settimana",
                        fontSize: 18,
                        fontColor: "#112"
                    },
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#331",
                            fontSize: 16
                        }
                    }
                };

                // DA QUA INIZIA LA TORTA!!

                var dataM = {
                    labels: cDataM.label,
                    datasets: [{
                        label: cDataM.label,
                        data: cDataM.data,
                        backgroundColor: [
                            "#DEB887",
                            "#A9A9A9",
                            "#DC143C",
                            "#F4A460",
                            "#2E8B57",
                            "#1D7A46",
                            "#CDA776",
                        ],
                        borderColor: [
                            "#CDA776",
                            "#989898",
                            "#CB252B",
                            "#E39371",
                            "#1D7A46",
                            "#F4A460",
                            "#CDA776",
                        ],
                        borderWidth: [1, 1, 1, 1, 1, 1, 1]
                    }]
                };

                //options
                var optionsM = {
                    responsive: true,
                    title: {
                        display: true,
                        position: "top",
                        text: "Messaggi ricevuti nell'ultima settimana",
                        fontSize: 18,
                        fontColor: "#111"
                    },
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                            fontSize: 16
                        }
                    }
                };

                var dataV = {
                    labels: cDataV.label,
                    datasets: [{
                        axis: 'y',
                        data: cDataV.data,
                        backgroundColor: [
                            "#DEB887",
                            "#A9A9A9",
                            "#DC143C",
                            "#F4A460",
                            "#2E8B57",
                            "#1D7A46",
                            "#CDA776",
                            "#FC143C",
                            "#A4A369",
                            "#6E8B59",
                            "#9D7A36",
                            "#CEA994",
                        ],
                        borderColor: [
                            "#CDA776",
                            "#989898",
                            "#CB252B",
                            "#E39371",
                            "#1D7A46",
                            "#F4A460",
                            "#CDA776",
                        ],
                        borderWidth: [1, 1, 1, 1, 1, 1, 1]
                    }]
                };

                //options
                var optionsV = {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        position: "top",
                        text: "Voti ricevuti nell'ultimo anno",
                        fontSize: 18,
                        fontColor: "#111"
                    },
                    legend: {
                        display: false,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                            fontSize: 16
                        }
                    }
                };



                //create bar Chart class object
                var chart1 = new Chart(ctx, {
                    type: "doughnut",
                    data: data,
                    options: options
                });

                var chart2 = new Chart(ctx1, {
                    type: "doughnut",
                    data: dataM,
                    options: optionsM
                });

                var chart3 = new Chart(ctx2, {
                    type: "bar",
                    data: dataV,
                    options: optionsV
                });


            });

        </script>



    </body>

</html>
