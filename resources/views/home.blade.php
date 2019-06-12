@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach( $notifications as $notification )
                        <tr>
                          <th> {{ $notification->type }} </th>
                          <th> {{ $notification->place }} </th>
                          <th> {{ $notification->status }} </th>
                          <th> {{ $notification->created_at }} </th>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>

                  <div class="links">                    
                      {{ $notifications->links() }}
                  </div>

              </div>


            </div>
        </div>
    </div>
</div>
@endsection
