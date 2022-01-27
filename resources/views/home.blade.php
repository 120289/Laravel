<!doctype html>
<html lang="en">
    <head>
        @extends('layouts.app')

        @section('content')
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Dashboard') }}</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                            </div>
                            @endif

                            {{ __('You are logged in!') }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endsection
                  
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Home page !</title>
    </head>
    <body>
        <h1> {{ $id }}  </h1>
    </body>
</html>
