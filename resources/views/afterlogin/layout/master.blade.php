<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS (Latest Version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome (Latest Version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @yield('style_css')

</head>

<body>

    <!-- Include the navbar -->
    @include('afterlogin.layout.includes.navbar')
    <br>

    <div class="container-fluid">
        <div class="row">
            <!-- Left side content -->
            <div class="col-lg-3">
                @include('afterlogin.layout.includes.left_side')
            </div>

            <!-- Main content -->
            <div class="col-lg-6">
                @yield("content")
            </div>

            <!-- Right side content -->
            <div class="col-lg-3">
                @include('afterlogin.layout.includes.right_side')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Already included in the head section) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

    @stack('scripts')
</body>

</html>