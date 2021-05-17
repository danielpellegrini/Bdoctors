<template>
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item container" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating-prev color-chevron" href="#multi-item-example" data-slide="prev">
                <i class="fas fa-chevron-left fa-3x"></i>
            </a>
            <a class="btn-floating-next color-chevron" href="#multi-item-example" data-slide="next">
                <i class="fas fa-chevron-right fa-3x"></i>
            </a>
        </div>
        <!--/.Controls-->

        <!--Indicators-->
        <ol class="carousel-indicators">
            <!-- Creiamo tanti indicatori quante le slide -->
            <li v-for="i in slidesNumber" data-target="#multi-item-example"
                :data-slide-to="(i - 1)" :class="(i === 1) ? 'active' : ''"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!-- Creiamo le slide, inoltre se il cliente è sponsorizzato verrà visualizzato o meno -->
            <div>

                <div class="carousel-item" :class="(i === 1) ? 'active' : ''"
                    v-for="(i, index) in slidesNumber">

                    <div class="row container d-flex flex-row p-2 flex-wrap">

                        <div class="card col-md-4 p-5 bd-highlight doctor-card"
                            :class="(i === 1) ? 'clearfix d-md-block' : ''"
                            v-for="(doctor, ind) in carouselLoop(i, sponsored)">

                            <div class="doctor-pic-dashboard-container">
                                <a :href="`doctor/${doctor.id}`">
                                    <img @error="correctPicUrl(doctor, index, ind)" class="doctor-pic-dashboard" :src="`storage/${doctor.detail.pic}`" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{doctor.name}} {{doctor.lastname}}</h4>
                                <h6 class="card-text department" v-for="department in doctor.departments">{{department.type}}</h6>
                                <a :href="`doctor/${doctor.id}`"
                                    class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register">Info</a>
                            </div>

                        </div>

                        <!-- Cards placeholder nel caso in cui non vi sia nessun medico sponsorizzato -->
                        <div class="card col-md-4 p-2 bd-highlight doctor-card" v-if="sponsored.length === 0" v-for="n in cardsPerSlide">

                            <div class="img-container">
                                <img class="card-img-top"
                                    src="img/logosponsor.png"
                                    alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">

                                    <button class="btn btn-success" onclick="location.href='login'">Sponsorizza il tuo profilo</button>
                                </h4>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->
</template>

<script>
    export default {

        data: function () {

            return {
                results: [],
                sponsored: [],

                cardsPerSlide: '',
                slidesNumber: ''
            }
        },

        mounted() {
            const self = this;

            /* Se lo schermo, al caricamento pagina, è di grandezza inferiore a 768px lo slider
            riporta 1 card per volta, altrimenti 3 */
            if (window.matchMedia('(max-width: 768px)').matches) {
                self.cardsPerSlide = 1;
            } else {
                self.cardsPerSlide = 3;
            }

            // Chiamata Axios all'API
            axios.get('http://127.0.0.1:8000/api/doctors', {
            })
            .then((resp) => {

                // Convertiamo la data corrente in millisecondi UNIX
                const today = Date.parse(new Date());

                self.results = resp.data.data;

                self.results.forEach(elem => {
                    if(elem.sponsors.length > 0) {

                        /* Verifichiamo che il medico abbia una sponsorizzazione in corso
                        per visualizzarlo all'inizio dei risultati, comparando i millisecondi correnti
                        con quelli della somma tra la creazione della sponsorship e la sua durata */
                        if(today <= (Date.parse(elem.sponsors[elem.sponsors.length - 1].pivot['created_at']) + (elem.sponsors[elem.sponsors.length - 1].duration * 3600000))) {
                            self.sponsored.push(elem);
                        }
                    }
                });

                // Posizioniamo gli sponsorizzati più recenti all'inizio
                self.sponsored.sort((a, b) => (b.sponsors[b.sponsors.length - 1].pivot['created_at'] > a.sponsors[a.sponsors.length - 1].pivot['created_at']) ? 1 : -1);


                // Se non vi sono sponsorizzati, creiamo comunque una slide
                if (self.sponsored.length === 0) {
                    self.slidesNumber = 1;
                } else {

                    /* Creiamo tante slide quanto il quoziente tra la lunghezza dell'array
                    e il numero di card in ogni slide */
                    self.slidesNumber = Math.ceil(self.sponsored.length / self.cardsPerSlide);
                }

            });
        },

        methods: {

            /* Diamo l'URL corretto all'immagine del profilo, nel caso in cui questa non provenga
            dallo storage */
            correctPicUrl: function(element, slideIndex, doctorIndex) {
                const slidePics = document.getElementsByClassName('carousel-item')[slideIndex].getElementsByClassName('doctor-pic-dashboard');

                slidePics[doctorIndex].src = element.detail.pic;
            },

            /* Scomponiamo l'array di risultati per recuperare di volta in volta
            i valori con cui popolare le slide */
            carouselLoop: function (index, array) {
                const limit = this.cardsPerSlide;
                let start, end;

                end = index * limit;
                start = end - limit;

                return array.slice(start, end);
            },


        }
    }

</script>

<style scoped>
    .img-container {
        width: 300px;
    }

    .card-img-top {
        width: 100%;
    }
</style>
