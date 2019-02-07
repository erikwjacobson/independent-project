@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sentences')}}">Sentences</a>
                    </li>
                    <li class="nav-item">
                        {{--href="{{route('admin.api.info')}}"--}}
                        <a class="nav-link active"
                           data-toggle="tooltip"
                           data-placement="right"
                           title="Under Construction" >API</a>
                    </li>
                </ul>
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
                        <p>Under Construction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection