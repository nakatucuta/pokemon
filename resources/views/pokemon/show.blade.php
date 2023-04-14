<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <h2>{{ $pokemon->name }}</h2>

<img src="{{ $pokemon->sprites->front_default }}" alt="{{ $pokemon->name }}">

<h3>HABILIDADES</h3>

<ul>
    @foreach ($pokemon->abilities as $ability)
        <li>{{ $ability->ability->name }}</li>
    @endforeach
</ul>

<h3>MOVIMIENTOS</h3>

<ul>
    @foreach ($pokemon->moves as $move)
        <li>{{ $move->move->name }}</li>
    @endforeach
</ul>





                       
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @endsection
</body>
</html>