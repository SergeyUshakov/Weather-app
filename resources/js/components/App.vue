<template>
    <div>
        <nav-bar></nav-bar>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Select City</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <ul class="cities-list list-inline">
                            <li class="list-inline-item"
                                v-for="city in cities"
                                @click="selectCity(city.id)">
                                <a href="javascript:void(0);"
                                   @click="activeCity(city.id)"
                                   :class="{active : activeCityEl === city.id}">
                                    {{ city.name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="scroll-group">
                    <div class="daily-list row">
                        <div class="col-12 col-sm-8 col-md-5 col-lg-3 border-left"
                             v-for="dailyForecast in dailyForecasts"
                             @click="selectDay(dailyForecast.id)">
                            <div @click="activeDay(dailyForecast.id)"
                                 :class="{active : activeDayEl === dailyForecast.id}">
                                <daily-forecasts :forecast="dailyForecast"></daily-forecasts>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="scroll-group">
                    <div class="row">
                        <div class="col-12 p-0">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item"
                                    v-for="hourlyForecast in hourlyForecasts">
                                    <hourly-forecasts v-bind:forecast="hourlyForecast"></hourly-forecasts>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <google-map></google-map>
        </section>
    </div>
</template>

<script>
    import NavBar from "./NavBar.vue";
    import DailyForecasts from "./DailyForecasts.vue";
    import HourlyForecasts from "./HourlyForecasts.vue";
    import GoogleMap from "./GoogleMap.vue"

    export default {
        name: "App",
        components: {
            NavBar,
            DailyForecasts,
            HourlyForecasts,
            GoogleMap
        },
        data () {
            return {
                cities: [],
                dailyForecasts: [],
                hourlyForecasts: [],
                activeCityEl: 1,
                activeDayEl: null
            }
        },
        created() {
            this.getQuery('cities').then(response => (this.cities = response.data || []));
            this.getQuery('daily_forecasts/1').then(response => (this.dailyForecasts = response.data.data || []));
            this.getQuery('hourly_forecasts/1').then(response => (this.hourlyForecasts = response.data.data || []));
        },
        methods: {
            selectCity: function(cityId) {
                this.getQuery('daily_forecasts/' + cityId)
                    .then(response => (this.dailyForecasts = response.data.data || []));

                this.getQuery('hourly_forecasts/' + cityId)
                    .then(response => (this.hourlyForecasts = response.data.data || []));
            },
            selectDay: function(forecastId) {
                this.getQuery('hourly_forecasts/' + forecastId)
                    .then(response => (this.hourlyForecasts = response.data.data || []));
            },
            activeCity: function(el){
                this.activeCityEl = el;
            },
            activeDay: function(el){
                this.activeDayEl = el;
            }
        }
    }
</script>

<style scoped>
    .list-inline {
        margin: 0;
    }

    .cities-list a {
        color: #000;
    }

    .cities-list a:hover {
        font-size: 20px;
        text-decoration: none;
    }

    .cities-list .active {
        font-size: 20px;
    }

    .scroll-group > .row {
        overflow-x: auto;
        white-space: nowrap;
        flex-wrap: nowrap;
    }
</style>