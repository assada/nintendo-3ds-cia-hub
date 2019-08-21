<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nintendo 3DS Games Portal | Free Download CIA | CIA Games</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Nintendo 3DS Games</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">How to</a>
        </nav>
<!--        <a class="btn btn-outline-primary" href="#">Sign up</a>-->
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Use FBI QR Scanner</h1>
        <p class="lead">For installing game use FBI remote installer by scanning QR code</p>
    </div>

    <div class="container">
        @include('flash-message')
        <div class="row">
            @foreach($games as $game)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <a href="{{ $game->getMetadata()->getEshop() }}" target="_blank"><strong class="d-inline-block mb-2 text-primary">{{ $game->getMetadata()->getName() }} ({{ $game->getMetadata()->getRegion() }})</strong></a>
                        <div class="mb-1 text-muted small">{{ $game->getMetadata()->getFormattedSize() }} <span class="pull-right">{{ $game->getMetadata()->getFormattedUploaded() }}</span></div>
                        <p class="card-text mb-auto"></p>
                        <button class="btn btn-outline-primary btn-sm qr" role="button" data-toggle="popover" title="{{ $game->getMetadata()->getName() }}" data-content="Scan QR code below: <br><img src='http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl={{ url('/') . $game->getLink() }}' />">Get Game</button>
                    </div>
                    <img class="card-img-right flex-auto d-none d-lg-block" alt="{{ $game->getMetadata()->getName() }}" src="{{ $game->getMetadata()->getImage() }}" style="height: 250px;">
                </div>
            </div>
            @endforeach
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('.qr').popover({
                container: 'body',
                html: true
            })
        })
    </script>
</html>
