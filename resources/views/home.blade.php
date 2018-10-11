@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instructions // TODO Fix this page</div>
                <div class="card-body">
                    <h4>Please carefully review the following instructions:</h4>
                    <ul>
                        <li>This study will consist of two sections consisting of 50 questions each.
                            In between each section you will be allowed a break.</li>
                        <li>You will be presented with a text message followed by a question about that message.
                            Please answer the question to the best of your ability.</li>
                        <li>Each message will display for 5 seconds, and afterwards
                            you will have 10 seconds to answer the question.</li>
                        <li>
                            Do your best to answer the question in the allotted time.
                            If you do not answer the question in the time given, it will be marked incorrect.
                            When you are finished with the question, you may click next to continue, regardless of the time
                            remaining.
                        </li>
                        <li>The study will begin with 5 practice questions.
                            Your results will not be scored for these questions.
                        </li>
                        {{--<li>Your progress will be shown on the green bar at the bottom of the screen.</li>--}}
                        <li>After you complete both sections, please notify the researcher.</li>
                    </ul>
                    <br>
                    <p>Click proceed to begin the practice questions</p>
                    <div class="text-right">
                        <a href="{{route('practice')}}" class="btn btn-lg btn-primary">Practice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
