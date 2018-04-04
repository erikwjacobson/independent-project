@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sentences')}}">Sentences</a>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Administrator Dashboard</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Username</th>
                                        <th>Complete</th>
                                        <th>Score</th>
                                    </tr>
                                    @foreach($participants as $participant)
                                        <tr>
                                            <td>{{$participant->username}}</td>
                                            @if($participant->complete)
                                                <td>Completed</td>
                                            @else
                                                <td>Incomplete</td>
                                            @endif
                                            <td>{{$participant->score * 100}}%</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['route' => ['admin.export'], 'method' => 'POST', 'id' => 'exportForm']) !!}
                            <button type="submit" class="btn btn-lg btn-success">Export Data</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection