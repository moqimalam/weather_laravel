<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1 class="p-3">Weather Appication using Laravel</h1>
        </div>
        
        <div class=" weather__header">
            <form method="post" class="weather__search" action="{{ route('index') }}">
                @csrf
                <input type="text" name="city" value="{{ old('city') }}" placeholder="Search for a city..." class="weather__searchform">
                <i class="fa-solid fa-magnifying-glass"></i>
                <button type="submit" class="btn">Search</button>
            </form> 
            
        </div>
        <div class="weather__body">
            <h2 class="weather__city"></h2>
            
            
            <div class="weather__icon">
                @if (isset($data['weather'][0]['icon']))
                <img src="https://openweathermap.org/img/wn/{{ $data['weather'][0]['icon'] }}@2x.png" alt="Weather Icon">
                <p>{{ $data['weather'][0]['main'] }}</p>
                <p>({{ ucfirst($data['weather'][0]['description']) }})</p>
                @endif
            </div>
            <p class="weather__temperature">
            </p>
            <div class="weather__minmax">
                <p>Longitute: @if (isset($data['coord']['lon'])) {{ $data['coord']['lon']}} @else -- @endif</p>
                <p>Latitude: @if (isset($data['coord']['lat'])) {{ $data['coord']['lat']}} @else -- @endif</p>
            </div>
        </div>

        <div class="weather__info">
            <div class="weather__card">
                <i class="fa-solid fa-temperature-full"></i>
                <div>
                    <p>Real Feel</p>
                    <p class="weather__realfeel">@if (isset($data['main']['temp'])) 
                         <?php $tempCelsius = ($data['main']['temp'] - 32) * (5 / 9); ?>
                        {{ round($tempCelsius)}}&#176 @else -- @endif </p>
                </div>
            </div>
            <div class="weather__card">
                <i class="fa-solid fa-droplet"></i>
                <div>
                    <p>Humidity</p>
                    <p class="weather__humidity">@if (isset($data['main']['humidity'])) 
                        <?php $humidityCelsius = ($data['main']['temp'] - 32) * (5 / 9); ?>
                        {{ round($humidityCelsius)}}&#176 @else -- @endif</p>
                </div>
            </div>
            <div class="weather__card">
                <i class="fa-solid fa-wind"></i>
                <div>
                    <p>Wind</p>
                    <p class="weather__wind">@if (isset($data['wind']['speed'])) 
                        <?php $windKmh = $data['wind']['speed'] * 3.6; ?>
                        {{ round($windKmh, 1) }} km/h @else -- @endif </p>
                </div>
            </div>
            <div class="weather__card">
                <i class="fa-solid fa-gauge-high"></i>
                <div>
                    <p>Pressure</p>
                    <p class="weather__pressure">@if (isset($data['main']['pressure'])) 
                        <?php $pressureMmHg = $data['main']['pressure'] * 0.75006; ?>
                        {{ round($pressureMmHg, 1) }} mmHg @else -- @endif </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a692e1c39f.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>