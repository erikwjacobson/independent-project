@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a id="dashboard" class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a id="sentences" class="nav-link" href="{{route('admin.sentences')}}">Sentences</a>
                    </li>
                    <li class="nav-item">
                        <a id="api" class="nav-link" href="{{route('admin.api.info')}}">API</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                           href="#"
                           role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Notebooks</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.notebooks', ['notebook' => 'data-aggregation'])}}">Data Aggregation</a>
                            <a class="dropdown-item" href="{{route('admin.notebooks', ['notebook' => 'emotion-analysis'])}}">Emotion Analysis</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        @yield('adminContent')
    </div>

@endsection
@section('scripts')
    <script>
        var route = '{{url()->current()}}';
        var a = ['dashboard', 'api', 'sentences'];
        $.each(a, function(index,item) {
            if(route.includes(item)) {
                $('#' + item).addClass('active');
            }
        });
    </script>
@endsection
