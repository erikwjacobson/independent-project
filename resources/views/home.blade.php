@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instructions</div>

                <div class="card-body">
                    <h4>Please carefully review the following instructions:</h4>
                    <ul>
                        <li>You will be presented with a text message followed by a question regarding that message.
                            Please answer the question to the best of your ability.</li>
                        <li>Each message will only be displayed for 10 seconds. A timer will display in the upper right hand corner
                        to indicate the amount of time remaining to view the sentence.</li>
                        <li>Each question will only be displayed for 30 seconds. A timer will display in the upper right hand corner
                        to indicate the amount of time remaining to answer the question.
                        </li>
                        <li>Do your best to answer the question in the allotted time.
                            If you do not answer the question in the time given, it will be marked incorrect.
                        When you are finished with the question, you may click next to continue, regardless of the time
                        remaining.</li>
                    </ul>
                    <br>
                    <p>Click proceed to begin the assessment.</p>
                    <div class="text-right">
                        <a href="{{route('main')}}" class="btn btn-lg btn-primary">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
