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
<div class="container">
    @include('flash-message')
    <div class="row">
        <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-12 col-form-label">Title</label>
                <div class="col-12">
                    <input id="name" name="name" placeholder="Game name" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="region" class="col-12 col-form-label">Region</label>
                <div class="col-12">
                    <select id="region" name="region" required="required" class="custom-select">
                        <option value="EUR">EUR</option>
                        <option value="USA">USA</option>
                        <option value="JPN">JPN</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-12 col-form-label">Cover</label>
                <div class="col-12">
                    <input id="image" name="image" placeholder="Link to image" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="eshop" class="col-12 col-form-label">eShop</label>
                <div class="col-12">
                    <input id="eshop" name="eshop" placeholder="Link to eShom (if applicable)" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="game">CIA file</label>
                <input type="file" class="form-control-file" id="game" name="game">
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
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
