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
                        <a class="nav-link active" href="{{route('admin.sentences')}}">Sentences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.export')}}">Export</a>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sentence List</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Sentence</th>
                                        <th>Style</th>
                                        <th>Watson Sentiment Value</th>
                                        <th>Correct Emotion</th>
                                    </tr>
                                    @foreach($sentences as $sentence)
                                        <tr>
                                            <td>{{$sentence->text}}</td>
                                            <td>{{$sentence->style->name}}</td>
                                            <td>{{$sentence->value}}</td>
                                            <td>{{$sentence->emotion->name}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection