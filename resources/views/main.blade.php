@extends('layouts.app')

@section('content')

    <div class="container">
        {!! Form::open(['route' => ['main.store', $sentence->id], 'method' => 'POST']) !!}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Message</div>

                    <div class="card-body">
                        <div class="text-center">
                            <p>{{$sentence->text}}</p>
                        </div>
                        <hr>
                        <br>
                        <div class="row text-center">
                            <div class="col-md-12">
                                What is the underlying emotion of this sentence?
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            @foreach($emotions as $emotion)
                                <div class="col-md-{{floor(12 / $emotions->count())}}">
                                    <input type="radio" name="answer" value="{{$emotion->id}}">&nbsp;{{$emotion->name}}
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="text-right">
                            <button type="submit" class="btn btn-lg btn-primary">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection