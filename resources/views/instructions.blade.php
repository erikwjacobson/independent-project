@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--TODO Fix this page--}}
                    <div class="card-header">Instructions</div>
                    <div class="card-body">
                        <h4>Please carefully review the following instructions before beginning:</h4>
                        <ul>
                            <li>
                                This study will consist of two phases.
                                In between the two sections you will be allowed a short break.
                            </li>
                            <li>
                                You will be presented with a text message followed by a question about that message.
                                Please answer the question to the best of your ability.
                            </li>
                            <li>
                                Each message will display for 5 seconds, and afterwards
                                you will have 10 seconds to answer the question.
                            </li>
                            <li>
                                Do your best to answer the question in the allotted time.
                                If you do not answer the question in the time given, it will be marked incorrect.
                            </li>
                            <li>
                                When you are finished with the question, you may click next to continue,
                                regardless of the time remaining.
                            </li>
                            <li>Your progress will be shown on the green bar at the bottom of the screen.</li>
                            <li>Before you begin, please tell the researchers if you have any questions.</li>
                            <li>After you complete both sections, please tell the researcher.</li>
                        </ul>
                        <br>
                        <p>Once you are ready, click Proceed to begin the assessment</p>
                        <div class="text-right">
                            <a href="{{route('main')}}" class="btn btn-lg btn-primary">Proceed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
