@extends('layouts.app')

@section('content')

    <div class="container">
        {!! Form::open(['route' => ['practice.store'], 'method' => 'POST', 'id' => 'practiceForm']) !!}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-danger btn-sm" href="{{route('home')}}">
                    <&nbsp;&nbsp;Exit
                </a>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <div class="row iphone-frame-text">
                            <div class="col-md-3">Message</div>
                            <div class="col-md-6 text-center">
                                <h4>Practice</h4>
                            </div>
                            <div class="col-md-3 text-right">
                                <b>Timer:</b>&nbsp;&nbsp;<span id="timer">-</span>
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
                            <h2>{{$sentence->text}}</h2>
                        </div>
                        <div id="question" hidden>
                            <br>
                            <div id="question-text">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        What is the underlying emotion of the previously displayed sentence?
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <input id="hidden" type="radio" name="answer" value="0" hidden required>
                                    @foreach($emotions as $emotion)
                                        <div class="col-md-{{floor(12 / $emotions->count())}}">
                                            <input type="radio" name="answer"
                                                   value="{{$emotion->id}}">&nbsp;{{$emotion->name}}
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                            </div>
                            <div class="text-right">
                                <button id="submitButton" type="submit" class="btn btn-lg btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
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

                // If submit, stop timer in case of timeout
                $('#submitButton').on('click', function () {
                    if ($('input[name="answer"]').is(":checked")) { // If there is something checked
                        console.log('StoppedTimer');
                        clearTimeout(questionTimeout); // Stop the timer
                    }
                });
            }
        });
    </script>
@endsection
