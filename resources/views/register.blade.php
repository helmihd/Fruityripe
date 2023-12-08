<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    </head>
    <body>
        <h4>Register</h4>

        @if(session('error'))
            <div class="alert alert-danger mb-3">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('register') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" aria-describedby="basic-addon1">
            </div>  
            <div class="input-group mb-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control" aria-describedby="basic-addon1">
            </div>             
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>