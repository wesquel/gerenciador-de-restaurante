<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" type='text/css' media='screen' href="{{asset('css/index.css')}}">

    </head>
    <body class="centralizar">
        <div class="main-div container">
            <img src="{{asset('img/pageImage.png')}}">
            <div class="div-img-button">
                <div class="text-img">
                    <h1>Gerenciador de Restaurantes</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed dictum nulla. Integer gravida
                        magna ac neque tincidunt pulvinar. Orci varius natoque penatibus et magnis dis parturient
                        montes, nascetur ridiculus mus. Nullam interdum rutrum dolor non porta. Sed et erat varius orci
                        tincidunt aliquam. Duis facilisis, mauris ut dictum bibendum, orci ipsum cursus mi, sed pretium
                        tellus neque vel augue. Vivamus tristique luctus ex, non imperdiet massa ullamcorper sed.
                        Vivamus porttitor justo dui, ac ultricies mauris aliquet ac. Aliquam nec elementum turpis.</p>
                </div>

                <div class="button-img">
                    <a href="{{route('login')}}"><button class="btn btn-primary">Iniciar</button></a>
                </div>
            </div>

        </div>
    </body>
</html>
