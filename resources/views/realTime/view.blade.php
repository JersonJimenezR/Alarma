@extends('layouts.app')

<script type="text/javascript" src="{{ asset('js/refresh.js') }}"></script>


@section('content')

  <div class="container">
    <div class="row">
        <div class="plano">
          <img src= "{{ asset( $img ) }}" alt="">
        </div>

        @if( $alert )

          <div class="">
            <a href=" {{ route('home') }} "> Ver Historial </a>
          </div>

        @endif


    </div>
  </div>

@endsection
