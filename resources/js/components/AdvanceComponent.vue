<template>

    <div class="container margin-top-container">

        <div class="row">

            <!-- colonna sinistra -->
            <div class="col-lg-3">
                <div class="box-general ">
                    <div class="profile profile-filters mb-5">

                        <!-- Filter results part -->
                        <div class="filters ">
                            <b>Filtra per:</b>
                            <hr>

                            <div>
                                <input @change="restoreResults(checkedVote)" type="checkbox" v-model="checkedVote">
                                <small>Media voti</small>

                                <div v-for="i in 5" v-if="checkedVote">
                                    <input @change="filterByVote()" type="radio" :value="i"  v-model="checkedVoteValue">
                                    <span>
                                        <i class="fas fa-star" v-for="number in i"></i>
                                    </span>
                                </div>
                            </div>

                            <div>
                                <input @change="restoreResults(checkedReview)" type="checkbox" v-model="checkedReview">
                                <small>Numero di recensioni</small>

                                <div @change="filterByReviews()" v-if="checkedReview">
                                    <input type="radio">
                                    <i class="far fa-edit"></i> <span>In ordine decrescente</span>
                                </div>
                            </div>
                        </div>

                        <!-- navbar collapsible che appare sotto ai 768px -->
                        <div class="container-fluid filters-navbar">
                            <div class="collapse" id="navbarToggleExternalContent">
                                <div class=" p-4 row">
                                    <div class="col-sm-12">
                                        <div class="">
                                            <b>Filtra per:</b>
                                            <hr>

                                            <div>
                                                <input @change="restoreResults(checkedVote)" type="checkbox" v-model="checkedVote">
                                                <small>Media voti</small>

                                                <div v-for="i in 5" v-if="checkedVote">
                                                    <input @change="filterByVote()" type="radio" :value="i"  v-model="checkedVoteValue">
                                                    <span>
                                                        <i class="fas fa-star" v-for="number in i"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div>
                                                <input @change="restoreResults(checkedReview)" type="checkbox" v-model="checkedReview">
                                                <small>Numero di recensioni</small>

                                                <div @change="filterByReviews()" v-if="checkedReview">
                                                    <input type="radio">
                                                    <i class="far fa-edit"></i> <span>In ordine decrescente</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav class="navbar navbar-light bg-light">
                                <button class="navbar-toggler btn-navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
                                    <span>Filtra </span><i class="fas fa-sliders-h"></i>
                                </button>
                            </nav>
                            <hr>
                        </div>

                    </div>
                </div>
            </div>

            <!-- colonna destra -->
            <div class="col-lg-9">


                <div v-if="filteredResults.length === 0">
                    <h3>La tua ricerca non ha prodotto risultati.</h3>
                    <h4>Per effettuare una nuova ricerca, torna sulla <a href="/">homepage</a> o cambia filtri.</h4>
                </div>

                <!-- Mostriamo i risultati iniziali della ricerca effettuata nella homepage -->

                <div class="strip-list position-relative" v-for="(doctor, index) in filteredResults" :key="index">
                    <a :href="`doctor/${doctor.id}`" class="doc-element">
                        <div class="sponsored-doc position-absolute" v-if="doctor.sponsors.length > 0 && isSponsored(doctor)">

                            <i class="fas fa-medal"></i> <span>Sponsorizzato</span>
                        </div>

                        <div class="col-md-3 col-sm-4 align-self-center">

                            <div class="">
                                <b>Recensioni:</b>
                                <span>{{doctor.reviews.length}}</span>
                            </div>

                            <div>
                                <i class="fas fa-star" v-for="vote in getVotesAverage(doctor)" v-if="getVotesAverage(doctor)"></i><i class="far fa-star" v-for="vote in (5 - getVotesAverage(doctor))"></i>
                            </div>

                        </div>

                        <div class="col-md-3 col-sm-4 align-self-center department">
                            <span v-for="(obj, index) in doctor.departments" :key="index">

                                <!-- Non mettiamo la virgola se è l'ultimo elemento della lista -->
                                {{obj.type}}{{(index !== doctor.departments.length - 1) ? ',' : ''}}
                            </span>
                        </div>

                        <div class="col-md-3 col-sm-2 align-self-center doc-name">
                            <span>{{doctor.name}} {{doctor.lastname}}</span>
                        </div>

                        <div class="doctor-pic-dashboard-container">
                            <img @error="correctPicUrl(doctor, index)" class="doctor-pic-dashboard" :src="`storage/${doctor.detail.pic}`" alt="profile pic">
                        </div>
                    </a>
                </div>

            </div>

        </div>
        <!-- row -->
    </div>
    <!-- container -->

</template>

<script>

    export default {

        data: function () {

            return {
                searchedDepartment: window.location.search.substring(window.location.search.lastIndexOf('=') + 1),

                checkedVote: '',
                checkedVoteValue: '',
                checkedReview: '',

                results: [],
                filteredResults: []
            }
        },

        mounted() {

            const self = this;

            // Chiamata Axios all'API dottori
            axios.get('http://127.0.0.1:8000/api/doctors', {
            })
            .then((resp) => {
                self.results = resp.data.data;

                this.initialFilters();
            });
        },

        methods: {

            /* Diamo l'URL corretto all'immagine del profilo, nel caso in cui questa non provenga
            dallo storage */
            correctPicUrl: function(element, index) {
                const allPics = document.getElementsByClassName('doctor-pic-dashboard');

                allPics[index].src = element.detail.pic;
            },

            /* Verifichiamo che il medico abbia una sponsorizzazione in corso
            per visualizzarlo all'inizio dei risultati, comparando i millisecondi correnti
            con quelli della somma tra la creazione della sponsorship e la sua durata */
            isSponsored: function(doctor) {
                const today = Date.parse(new Date());

                if(today <= Date.parse(doctor.sponsors[doctor.sponsors.length - 1].pivot['created_at']) + (doctor.sponsors[doctor.sponsors.length - 1].duration * 3600000)) {
                    return true;
                } else {
                    return false;
                }
            },

            // Parametri di ricerca iniziali
            initialFilters: function() {

                // Convertiamo la data corrente in millisecondi UNIX
                const byDepartment = [];

                this.results.forEach(element => {

                    /* Sostituiamo gli eventuali + derivanti dalla query string per poterla confrontare
                    con i risultati */
                    while (this.searchedDepartment.includes('+')) {
                        this.searchedDepartment = this.searchedDepartment.replace('+', ' ');
                    }

                    // Filtro risultati in base al department scelto in home
                    element.departments.forEach(item => {
                        if(item.type === this.searchedDepartment) {
                            byDepartment.push(element);
                        }
                    });
                });

                const sponsored = [];
                const notSponsored = [];

                byDepartment.forEach(elem => {
                    if(elem.sponsors.length > 0) {

                        if(this.isSponsored(elem)) {
                            sponsored.push(elem);
                        }

                    } else {
                        notSponsored.push(elem);
                    }
                });

                // Posizioniamo gli sponsorizzati più recenti all'inizio
                sponsored.sort((a, b) => (b.sponsors[b.sponsors.length - 1].pivot['created_at'] > a.sponsors[a.sponsors.length - 1].pivot['created_at']) ? 1 : -1);

                this.filteredResults = [...sponsored,...notSponsored];
            },

            /* Ripristiniamo i risultati a quelli iniziali;
            utile in caso di passaggio da un filtro ad un altro */
            restoreResults: function(check) {
                if (!check) {
                    this.filteredResults = [];
                    this.initialFilters();

                    if (this.checkedVote && !this.checkedReview) {
                        this.filterByVote();
                    } else if (!this.checkedVote && this.checkedReview) {
                        this.filterByReviews();
                    }
                }
            },

            // Recuperiamo la media voti di un dottore, arrotondata per eccesso
            getVotesAverage: function(element) {
                const votesCount = element.votes.length;
                let votesSum = 0;
                let votesAverage;

                element.votes.forEach(elem => {
                    votesSum += elem.value;
                });

                votesAverage = Math.ceil(votesSum / votesCount);

                // Se il medico non ha ancora ricevuto voti la divisione sarà tra due zeri, restituendo NaN
                if(!isNaN(votesAverage)) {
                    return votesAverage;
                } else {
                    return 0;
                }
            },

            // Filtriamo i risultati per voto
            filterByVote: function () {
                const filteredByVote = [];

                this.filteredResults = [];
                this.initialFilters();

                this.filteredResults.forEach(element => {

                    if (this.getVotesAverage(element) === this.checkedVoteValue) {
                        filteredByVote.push(element);
                    }

                });

                this.filteredResults = filteredByVote;

                /* Se il filtro per review è attivo contemporaneamente a quello per voti, continua
                ad ordinare anche per review */
                if (this.checkedReview) {
                    this.filterByReviews();
                }
            },

            // Filtriamo i risultati per recensione
            filterByReviews: function() {
                const filteredByReviews = [];

                this.filteredResults.forEach(element => {
                    filteredByReviews.push(element);

                    /* Ordine decrescente:
                    Posizioniamo i risultati con più review all'inizio dell'array */
                    filteredByReviews.sort((a, b) => (b.reviews.length > a.reviews.length) ? 1 : -1);

                });

                this.filteredResults = filteredByReviews;
            },

        }
    }
</script>
