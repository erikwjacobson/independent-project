@extends('layouts.app')

@section('content')

    <div class="container">
        {!! Form::open(['route' => ['main.store', $sentence->id], 'method' => 'POST', 'id' => 'mainForm']) !!}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-danger btn-sm" href="{{route('instructions')}}"><&nbsp;&nbsp;Exit</a>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <div class="row iphone-frame-text">
                            <div class="col-md-9">Message</div>
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
                            <br>
                            <div class="text-right">
                                <button id="submitButton" type="submit" class="btn col-md-12 btn-primary">Next</button>
                            </div>
                        </div>
                        {{--TODO Reconsider if we need a progress bar--}}
                        <br>
                        <hr>
                        <br>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                 style="width: {{Auth::user()->progress}}%;" aria-valuenow="{{Auth::user()->progress}}"
                                 aria-valuemin="5" aria-valuemax="100">{{floor(Auth::user()->progress)}}%
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
            var url = '{{ route('main.refresh', $sentence->id) }}';
            window.onbeforeunload = function () {
                $.ajax({
                    url: url,
                    method: 'POST',
                    success: function () {
                        console.log('Submitted Refresh');
                    }
                });
            };

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
                    $('#mainForm').submit(); // Submit the form
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
