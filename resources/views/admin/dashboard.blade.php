@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sentences')}}">Sentences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.api.info')}}">API</a>
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
                            <div class="col-md-10">
                                Administrator Dashboard
                            </div>
                            <div class="col-md-2">
                                <b>Total Participants:</b>&nbsp;{{$participants->count()}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                {!! Form::open(['route' => ['admin.export.users'], 'method' => 'POST']) !!}
                                <button type="submit" class="btn btn-success"
                                        title="Download user information into an excel spreadsheet">Download
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <br>
                        {!! Form::open(['route' => ['admin.store'], 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr class="fixed">
                                        <th class="fixed-header">User</th>
                                        <th class="fixed-header">Date</th>
                                        <th class="fixed-header">Computer</th>
                                        <th class="fixed-header">Researcher</th>
                                        <th class="fixed-header">Overtime</th>
                                        <th class="fixed-header">Credit Granted</th>
                                        <th class="fixed-header">Comments</th>
                                    </tr>
                                    @foreach($participants as $participant)
                                        <input type="hidden" value="{{$participant->id}}" name="id[]">
                                        <tr>
                                            <td>
                                                {{$participant->username}}
                                                <br><br>
                                                @if($participant->complete)
                                                    <span class="oi oi-circle-check text-success"
                                                          title="User has completed the study"></span>
                                                @else
                                                    <span class="oi oi-circle-x text-danger"
                                                          title="User has completed {{round($participant->progress, 2)}}% of the study"></span>
                                                @endif
                                            </td>
                                            <td>
                                                {{Carbon\Carbon::parse($participant->created_at)->format('M d, Y')}}
                                                <br>
                                                {{Carbon\Carbon::parse($participant->created_at)->format('h:i A')}}
                                            </td>
                                            <td>
                                                {!! Form::select('computer[' . $participant->id . ']', ['A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'], $participant->computer, ['placeholder' => '', 'class' => 'form-control', 'style' => 'width: 5em;', 'title' => 'Computer']) !!}
                                            </td>
                                            <td>{!! Form::text('researcher_initials[' . $participant->id . ']', $participant->researcher_initials, ['placeholder' => 'Initials', 'class' => 'form-control', 'style' => 'width: 5em;', 'title' => 'Researcher Initials']) !!}</td>
                                            <td>{!! Form::select('overtime[' . $participant->id . ']', [true => 'TRUE', false => 'FALSE'], $participant->overtime, ['placeholder' => '', 'class' => 'form-control', 'title' => 'Overtime']) !!}</td>
                                            <td>{!! Form::select('credit_granted[' . $participant->id . ']', [true => 'TRUE', false => 'FALSE'], $participant->credit_granted, ['placeholder' => '', 'class' => 'form-control', 'title' => 'Credit Given']) !!}</td>
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
            </div>
        </div>
    </div>
@endsection