@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sentences')}}">Sentences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.export')}}">Export</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 text-right">
                {!! Form::open(['route' => ['admin.build.export'], 'method' => 'POST']) !!}
                <button id="clearCache" type="submit"
                        class="btn btn-danger"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Click this button if there are missing users in the data export file.">
                    Build Exports
                </button>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Data Export</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['admin.export.data'], 'method' => 'POST', 'id' => 'exportForm']) !!}
                        <div class="row">
                            <div class="col-md-8">
                                {!! Form::select('type', ['q' => 'User\'s scores on individual sentences', 'c' => 'Percentage scores for individual categories', 's' => 'Average scores on individual sentences'], null, ['class' => 'form-control', 'placeholder' => 'Select type of data to export...']) !!}
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-lg btn-success">Export</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection