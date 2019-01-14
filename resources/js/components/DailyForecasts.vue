<template>
    <div class="daily-box">
        <div class="row">
            <div class="col-12">
                <p class="forecast-date">{{forecast.day}}
                    <span v-if="forecast.day !== 'Today'"> {{moment(forecast.date).format('Do')}}</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6 weather-details d-inline-block float-left">
                <img :src="weatherType" :alt="forecast.weather_type" class="d-block">
                <ul class="list-unstyled d-inline-block position-absolute">
                    <li class="font-weight-bold">{{forecast.highest_temperature}}&#8451;</li>
                    <li>{{forecast.lowest_temperature}}&#8451;</li>
                </ul>
            </div>
            <div class="col-6 weather-desc d-inline-block float-left border-left">
                <div class="weather-text">{{forecast.weather_type}} with {{windSpeedDescription}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    let moment = require('moment');
    export default {
        name: "DailyForecasts",
        props:{
            forecast: Object
        },
        data() {
            return {
                moment: moment,
                weatherType: null,
                windSpeedDescription: null
            }
        },
        mounted() {
            this.weatherType = this.$route.path + '/img/' + this.forecast.weather_type + '.png';
            this.setWindDescription(this.forecast.wind_speed);
        },
        methods: {
            setWindDescription: function(speed) {
                let windType = [];
                windType[0] = "no wind";
                windType[1] = "gentle breeze";
                windType[2] = "moderate winds";
                windType[3] = "extreme winds";
                windType[4] = "hurricane";

                switch(speed) {
                    case 0:
                        this.windSpeedDescription = windType[0];
                        break;
                    case 1:
                    case 2:
                    case 3:
                        this.windSpeedDescription = windType[1];
                        break;
                    case 4:
                    case 5:
                    case 6:
                        this.windSpeedDescription = windType[2];
                        break;
                    case 7:
                    case 8:
                    case 9:
                        this.windSpeedDescription = windType[3];
                        break;
                    case 10:
                        this.windSpeedDescription = windType[4];
                        break;
                    default:
                        this.windSpeedDescription = windType[0];
                        break;
                }
            }
        }
    }
</script>

<style scoped>
    .daily-box {
        padding: 20px;
    }

    .daily-box:hover {
        cursor: pointer;
    }

    .daily-list .active .weather-details img {
        width: 46px;
    }

    .daily-list .active .weather-details li,
    .daily-list .active .weather-desc,
    .daily-list .active .forecast-date {
        font-size: 18px;
    }

    .weather-details img {
        width: 40px;
        margin-bottom: 25px;
    }

    .weather-details ul {
        top: 0;
        right: 15px;
    }

    .weather-desc {
        white-space: pre-line;
    }
</style>