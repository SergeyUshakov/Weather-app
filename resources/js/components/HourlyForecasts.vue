<template>
    <div class="hourly-box border-left">
            <div class="hourly-base text-center d-inline-block" data-toggle="collapse" :data-target="'#' + collapseId" aria-expanded="false">
                <ul class="list-unstyled">
                    <li class="font-weight-bold">{{ hour }}</li>
                    <li><img :src="weatherType" :alt="forecast.weather_type"></li>
                    <li class="font-weight-bold">{{forecast.real_temperature}}&#8451;</li>
                    <li><img :src="humidityPic" alt="humidity"></li>
                </ul>
            </div>
            <div :id="collapseId" class="collapse width">
                <div class="hourly-details">
                    <ul class="list-unstyled">
                        <li class="font-weight-bold weather-text">{{forecast.weather_type}} with {{windSpeedDescription}}</li>
                        <li>Temperature Feels like <span class="font-weight-bold">{{forecast.feel_temperature}}&#8451;</span></li>
                        <li>Humidity <span class="font-weight-bold">{{forecast.humidity}}%</span></li>
                    </ul>
                </div>
            </div>
        <!--<p>id: {{forecast.id}}</p>-->
        <!--<p>hour: {{forecast.hour}}</p>-->
        <!--<p>humidity: {{forecast.humidity}}</p>-->
        <!--<p>wind_speed: {{forecast.wind_speed}}</p>-->
        <!--<p>feel_temperature: {{forecast.feel_temperature}}</p>-->
        <!--<p>real_temperature: {{forecast.real_temperature}}</p>-->
        <!--<p>weather_type: {{forecast.weather_type}}</p>-->
    </div>
</template>

<script>
    export default {
        name: "HourlyForecasts",
        props:{
            forecast: Object
        },
        data() {
            return {
                hour: null,
                weatherType: null,
                windSpeedDescription: null,
                humidityPic: this.$route.path + '/img/Humidity.png',
                collapseId: 'collapse' + this.forecast.id
            }
        },
        mounted() {
            this.weatherType = this.$route.path + '/img/' + this.forecast.weather_type + '.png';
            this.setWindDescription(this.forecast.wind_speed);
            this.hour = this.setTime(this.forecast.hour);
        },
        methods: {
            setTime(hour) {
                return hour = (hour < 9) ? '0' + hour + ':00' : hour + ':00';
            },
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
    .hourly-base {
        cursor: pointer;
    }

    .list-unstyled {
        margin: 10px 20px;
    }

    .list-unstyled li:nth-child(-n+3) {
        margin-bottom: 20px;
    }

    .list-unstyled li img {
        width: 30px;
    }

    .hourly-details .list-unstyled {
        margin-bottom: 0;
    }

    .hourly-details .list-unstyled li {
        margin: 0;
    }

    .hourly-details .list-unstyled li:first-child {
        margin-bottom: 70px;
    }

    .hourly-details .list-unstyled li:nth-child(2) {
        margin-bottom: 25px;
    }

    .collapse {
        visibility: hidden;
        vertical-align: top;
    }
    .collapse.show {
        visibility: visible;
        display: inline-block;
    }

    .collapsing.width {
        position: relative;
        height: auto;
        width: 0;
        display: inline-block;
        vertical-align: top;
        -webkit-transition: all 1.35s ease, visibility;
        transition: all 1.35s ease, visibility;
    }
</style>