@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instructions</div>

                <div class="card-body">
                    <p>You will be presented with a text message followed by a question regarding that message.
                        Please answer the question to tbe best of your ability.</p>
                    <div class="text-right">
                        <a href="{{route('main')}}" class="btn btn-lg btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
