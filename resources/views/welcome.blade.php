<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Management</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form action="{{ route("login") }}" method="post">
            <div class="d-flex justify-content-center align-items-center min-vh-100">
                @csrf
                <div class="card col-lg-6">
                    <div class="card-header text-center">
                        Login
                    </div>
                    <div class="card-body">
                        <label for="email" class="form-label my-3">Email</label>
                        <input type="text" name="email" id="email" class="form-control my-3" placeholder="johndoe@gmail.com">

                        <label for="password" class="form-label my-3">Password</label>
                        <input type="password" name="password" id="password" class="form-control my-3" placeholder="********">
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <p class="text-center">New Here? <a href="{{ route("register") }}">Register</a>
                    </p>
                </div>
            </div>
            </form>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
