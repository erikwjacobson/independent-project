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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Notebooks</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.notebooks', ['notebook' => 'EmotionAnalysis'])}}">EmotionAnalysis</a>
                        </div>
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
                            <div class="col-md-6">
                                <h3>Data Export</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-primary" href="{{route('admin.api.token')}}">Generate Key</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Routes:</h4>
                                <br>
                                TODO
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection