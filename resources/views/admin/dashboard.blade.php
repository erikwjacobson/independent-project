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
            <div class="col-md-2 text-right">
                {!! Form::open(['route' => ['admin.cache'], 'method' => 'POST']) !!}
                <button id="clearCache" type="submit"
                        class="btn btn-danger"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Click this button if there are missing users in the data export file.">
                    Clear Cache
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
                            <div class="col-md-9">
                                Administrator Dashboard
                            </div>
                            <div class="col-md-3">
                                <b>Total Participants:</b>&nbsp;{{$participants->count()}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['admin.store'], 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Username</th>
                                        <th>Complete</th>
                                        <th>Date</th>
                                        <th>Computer</th>
                                        <th>Researcher</th>
                                        <th>Overtime</th>
                                        <th>Credit Granted</th>
                                        <th>Comments</th>
                                    </tr>
                                    @foreach($participants as $participant)
                                        <input type="hidden" value="{{$participant->id}}" name="id[]">
                                        <tr>
                                            <td>{{$participant->username}}</td>
                                            @if($participant->complete)
                                                <td>Completed</td>
                                            @else
                                                <td>Incomplete</td>
                                            @endif
                                            <td>
                                                {{Carbon\Carbon::parse($participant->created_at)->format('M d, Y')}}
                                                <br>
                                                {{Carbon\Carbon::parse($participant->created_at)->format('h:m A')}}
                                            </td>
                                            <td>
                                                {!! Form::select('computer[' . $participant->id . ']', ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'], $participant->computer, ['placeholder' => '', 'class' => 'form-control', 'style' => 'width: 4em;']) !!}
                                            </td>
                                            <td>{!! Form::text('researcher_initials[' . $participant->id . ']', $participant->researcher_initials, ['placeholder' => 'Initials', 'class' => 'form-control', 'style' => 'width: 5em;']) !!}</td>
                                            <td>{!! Form::select('overtime[' . $participant->id . ']', [true => 'TRUE', false => 'FALSE'], $participant->overtime, ['placeholder' => '', 'class' => 'form-control']) !!}</td>
                                            <td>{!! Form::select('credit_granted[' . $participant->id . ']', [true => 'TRUE', false => 'FALSE'], $participant->credit_granted, ['placeholder' => '', 'class' => 'form-control']) !!}</td>
                                            <td>{!! Form::textArea('comments[' . $participant->id . ']', $participant->comments, ['placeholder' => 'Comments...', 'class' => 'form-control', 'rows' => '3', 'style' => 'width: 20em;']) !!}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::open(['route' => ['admin.export'], 'method' => 'POST', 'id' => 'exportForm']) !!}
                        <h3>Data Export</h3>
                        {!! Form::select('type', ['q' => 'User\'s scores on individual sentences', 'c' => 'Percentage scores for individual categories', 's' => 'Average scores on individual sentences'], null, ['class' => 'form-control', 'placeholder' => 'Select type of data to export...']) !!}
                        <br>
                        <button type="submit" class="btn btn-lg btn-success">Export</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection