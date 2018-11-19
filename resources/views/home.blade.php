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
                        <li>
                            This study will consist of two sections with 50 questions each.
                            In between the two sections you will be allowed a short break.
                        </li>
                        <li>
                            The study will begin with 5 practice questions.
                            Your results will not be scored for these questions.
                        </li>
                        <li>
                            You will be presented with a text message followed by a question about that message.
                            Please answer the question to the best of your ability.
                        </li>
                        <li>
                            The practice questions do not contain a timer, but each question will be timed when
                            answering the real questions.
                        </li>
                        <li>Your progress will be shown on the green bar at the bottom of the screen.</li>
                    </ul>
                    <br>
                    <p>Once you are ready, click Practice to begin the practice questions</p>
                    <br>
                    <div class="text-right">
                        <a href="{{route('practice')}}" class="btn col-md-12 btn-primary">Practice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
