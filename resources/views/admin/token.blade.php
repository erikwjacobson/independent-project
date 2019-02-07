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
                        <a class="nav-link active" href="{{route('admin.api.info')}}">API</a>
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
                        <h2>API Keys</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning" role="alert">
                                    Copy and paste the API key below to use for your application. This is the
                                    only time you will have access to this key. Keys expire after 15 days.
                                </div>
                                <br>
                                <div class="card card-body bg-light">
                                    {{'Bearer ' . $token}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection