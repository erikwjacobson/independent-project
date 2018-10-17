@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sentences')}}">Sentences</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 text-right">
                {!! Form::open(['route' => ['admin.cache'], 'method' => 'POST']) !!}
                    <button id="clearCache" type="submit"
                            class="btn btn-danger"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="Click this button if there are missing users in the data export file.">
                        Clear Cache</button>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                Administrator Dashboard
                            </div>
                            <div class="col-md-3">
                                <b>Total Participants:</b>&nbsp;{{$participants->count()}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Username</th>
                                        <th>Complete</th>
                                        <th>Registered</th>
                                    </tr>
                                    @foreach($participants as $participant)
                                        <tr>
                                            <td>{{$participant->username}}</td>
                                            @if($participant->complete)
                                                <td>Completed</td>
                                            @else
                                                <td>Incomplete</td>
                                            @endif
                                            <td>{{Carbon\Carbon::parse($participant->created_at)->toFormattedDateString()}}</td>
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
@section('scripts')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection