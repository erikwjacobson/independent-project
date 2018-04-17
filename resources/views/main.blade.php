@extends('layouts.app')

@section('content')

    <div class="container">
        {!! Form::open(['route' => ['main.store', $sentence->id], 'method' => 'POST', 'id' => 'mainForm']) !!}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('welcome')}}"><&nbsp;&nbsp;Exit</a>
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <h2>! Please Note !</h2>
                            <p>
                                This is just a demonstration. None of the answers that you provide will
                                be saved in the system.
                            </p>
                            <p>Once you've had your fun, press the "< Exit" button in the top left corner to go back.</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">Message</div>
                            <div class="col-md-3">
                                <b>Timer:</b>&nbsp;&nbsp;<span id="timer">-</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="count" class="text-center">
                            <h1 id="countValue">Starting...</h1>
                            <br>
                            <div class="typing-indicator">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <br>
                        </div>
                        <div id="sentence" class="text-center" hidden>
                            <h2>{{$sentence->text}}</h2>
                        </div>
                        <div id="question" hidden>
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
                                            <input type="radio" name="answer" value="{{$emotion->id}}">&nbsp;{{$emotion->name}}
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
        $(function() {
            setTimeout(function() {
                begin();
            }, 3000);

            /**
             * Begin the question
             */
            function begin()
            {
                setTimeout(function() {
                    // timer(5, 'timer', '-');
                    $('#count').attr('hidden', true);
                    $('#sentence').attr('hidden', false);
                }, 1000);

                setTimeout(function() {
                    timer(10, 'timer', 'EXPIRED');
                    $('#sentence').attr('hidden', true);
                    $('#question').attr('hidden', false);
                }, 6000);

                var questionTimeout = setTimeout(function() {
                    $('#question-text').attr('hidden', true);
                    // If there are no answers
                    var checked = $("input[name='answer']:checked");
                    if(!checked.val()){
                        // Add a hidden input with 0 as value
                        $('#hidden').attr('checked', true);
                    }
                    $('#mainForm').submit(); // Submit the form
                }, 16000);

                // If submit, stop timer in case of timeout
                $('#submitButton').on('click', function() {
                    if($('input[name="answer"]').is(":checked")) { // If there is something checked
                        console.log('StoppedTimer');
                        clearTimeout(questionTimeout); // Stop the timer
                    }
                });
            }

            /**
             * Sets a timer for the specified number of seconds
             *
             * @param seconds - number of seconds for the timer
             * @param element - the element to display the seconds
             * @param text - the text to display
             */
            function timer(seconds, element, text) {
                var countDownDate = new Date();
                countDownDate.setSeconds(countDownDate.getSeconds() + seconds);
                var x = setInterval(function() {
                    // Get todays date and time
                    var now = new Date().getTime();
                    // Find the distance between now an the count down date
                    var distance = countDownDate - now;
                    // Time calculations for days, hours, minutes and seconds
                    var s = Math.floor((distance % (1000 * 60)) / 1000);
                    console.log(s);
                    // Display the result in the element with id="demo"
                    var el = document.getElementById(element);
                    el.innerHTML = s + " s";
                    // If the count down is finished, write some text
                    if(s < 10) {
                        el.style.color = 'red';
                        el.style.fontWeight = 'bold';
                    }
                    if (distance < 0) {
                        clearInterval(x);
                        el.innerHTML = text;
                        el.style.color = 'black';
                        el.style.fontWeight = 'normal';
                        console.log(text);
                    }
                }, 1000);
            }
        });
    </script>
@endsection
