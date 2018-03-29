@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Thank You!</h1>
                <hr>
                <p>Your results have been recorded. Thank you for your participation!</p>
                <a href="{{route('logout')}}" class="btn btn-lg btn-primary">Logout</a>
            </div>
        </div>
    </div>
@endsection
