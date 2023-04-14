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
                    <div class="card-header">{{ __('LISTADO POKEMON') }}</div>

                    <div class="content">
                        <div class="clearfix">
                        <div class="box box-primary">
                          <div class="box-body">
                            <table class="table table-hover table-striped table-bordered  {{-- table-responsive--}}" style="border: 1px solid #000000;" id="seguimiento"> 
                              <thead class="table table-hover table-info table-bordered " style="background-color: #d9f2e6 ;border: 1px solid #000000;">
                                 
                                <tr>
                              <th>Nombre pokemon</th>
                              <th >Acciones</th>
                              
                            </tr>
                          </thead>
                          <tbody id="table">
                            <tr>
                                
                    @foreach ($pokemonList->results as $pokemon)
                    <div>
                        <td><h2>{{ $pokemon->name }}</h2></td>
                        <td>
                        <a href="{{ route('pokemon.show', $pokemon->name) }}" class="btn btn-success"> Detalle</a>
                
                        @if (DB::table('favoritos')->where('ref_api', $pokemon->name)->where('id_usuario', Auth::id())->exists())
                            <a href="{{ route('pokemon.fav', $pokemon->name) }}" title="DETALLE" class="btn btn-primary" disabled>
                                <span class="icon-zoom-in"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>


                                
                            </a>

                            <form action="{{ route('favoritos.destroy', $pokemon->name) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        @else
                            <a href="{{ route('pokemon.fav', $pokemon->name) }}" title="DETALLE" class="btn btn-primary">
                                <span class="icon-zoom-in"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3.5c-1.622 0-3.21.655-4.365 1.805C1.655 6.79 1 8.378 1 10.005c0 1.626.655 3.214 2.635 5.195a.575.575 0 00.81 0C9.345 13.22 10 11.632 10 10.005c0-1.627-.655-3.215-2.635-5.195A5.5 5.5 0 008 3.5zm0-2a7.5 7.5 0 017.365 6.195c.588 2.227.818 4.526.677 6.692-.07.968-.391 1.414-1.013 1.414-.622 0-.943-.446-1.013-1.414-.14-2.165.088-4.464.676-6.692A7.5 7.5 0 018 1.5z"/>
                                </svg>
                            </a>
                            <form action="{{ route('favoritos.destroy', $pokemon->name) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                       
                        @endif
                 
                    </td>
                </tr>
                
                @endforeach
            </tbody>
                
        </table>
     
     
      
        </div>
        </div>
      </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @endsection
</body>
</html>