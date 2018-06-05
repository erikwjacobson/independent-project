@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Access to the Data</h2>
                    </div>
                    <div class="card-body">
                        <p>
                            In the spirit of scientific discovery, we are allowing anyone who registers to access
                            the data that was for this experiment. To do so, we are presenting the data in two different ways.
                        </p>
                        <p>
                            First, anyone who registers will be allowed to download the excel document of compiled participant's scores.
                            Additionally, we are providing access to the database itself through the use of an API. To gain access
                            to this information, please register an account through the site.
                        </p>
                        <br>
                        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
