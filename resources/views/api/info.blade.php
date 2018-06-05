@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Excel</h2>
                    </div>
                    <div class="card-body">
                        <p>
                            You can download the Excel document to access the data. The data returned is the proportion
                            of emotional context guessed correct, and is grouped by text style and emotion.
                        </p>
                        <br>
                        {!! Form::open(['route' => ['data.export'], 'method' => 'POST']) !!}
                            <button type="submit" class="btn btn-lg btn-success">Export Data</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">
                        <h2>API</h2>
                    </div>
                    <div class="card-body">
                        <p>
                            API Coming Soon!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
