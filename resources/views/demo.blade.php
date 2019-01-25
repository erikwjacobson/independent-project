@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-danger btn-sm" href="{{route('instructions')}}"><&nbsp;&nbsp;Exit</a>
                <br><br>
                <div class="alert alert-warning" role="alert">
                    <h3 class="text-center">! Demonstration !</h3>
                    <p>
                        This interface was used to study individual's ability to interpret messages written in
                        different ways. Some are poorly written, some are written with proper grammar, and others
                        make use of emojis. We predicted that people would better interpret emoji messages than
                        poorly written messages.
                    </p>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row iphone-frame-text">
                            <div class="col-md-9" data-toggle="tooltip"
                                 data-placement="left"
                                 title="The layout was designed in part to simulate a standard text messaging interface.">
                                Message
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="count">
                            <br>
                            <div class="typing-indicator">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <br>
                        </div>
                        <div id="sentence" class="message" hidden>
                            <h2 data-toggle="tooltip"
                                data-placement="left"
                                title="Each sentence's emotional value was determined both by the researchers as well as IBM Watson's Natural Language Processor.">
                                {{$sentence->text}}</h2>
                        </div>
                        <div id="question" hidden>
                            <br>
                            <div id="question-text">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        What is the underlying emotion of the displayed sentence?
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <input id="hidden" type="radio" name="answer" value="0" hidden required>
                                    @foreach($emotions as $emotion)
                                        <div class="col-md-{{floor(12 / $emotions->count())}}">
                                            <input id="emotion_{{$emotion->id}}" type="radio" name="answer"
                                                   value="{{$emotion->id}}">&nbsp;<label
                                                    for="emotion_{{$emotion->id}}">{{$emotion->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                            </div>
                            <br>
                            <div class="text-right">
                                <a id="submitButton" href="{{route('demo')}}" class="btn col-md-12 btn-primary">Next</a>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: {{$num = rand(10, 100)}}%;" aria-valuenow="{{$num}}"
                                 aria-valuemin="5" aria-valuemax="100">{{$num}}%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        /**
         * On document load, countdown and begin.
         */
        $(function () {

            setTimeout(function () {
                begin();
            }, 3000);

            /**
             * Begin the question
             */
            function begin() {
                setTimeout(function () {
                    $('#count').attr('hidden', true);
                    $('#sentence').attr('hidden', false);
                }, 1000);

                setTimeout(function () {
                    $('#question').attr('hidden', false);
                }, 6000);

                var questionTimeout = setTimeout(function () {
                    $('#question-text').attr('hidden', true);
                    // If there are no answers
                    var checked = $("input[name='answer']:checked");
                    if (!checked.val()) {
                        // Add a hidden input with 0 as value
                        $('#hidden').attr('checked', true);
                    }
                    location.reload();
                }, 16000);

                // If submit, stop timer in case of timeout
                $('#submitButton').on('click', function () {
                    if ($('input[name="answer"]').is(":checked")) { // If there is something checked
                        clearTimeout(questionTimeout); // Stop the timer
                    }
                });
            }
        });
    </script>
@endsection
