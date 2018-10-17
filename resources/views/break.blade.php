@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                Break
                            </div>
                            <div class="col-md-3 text-right">
                                Timer:&nbsp;<span id="timer">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="text center">Take a short break before beginning the second phase.</h3>
                        <br>
                        <p>Once you are ready, you can click Proceed to begin the remaining questions.</p>
                        <div class="text-right">
                            <a href="{{route('main')}}" class="btn btn-lg btn-primary">Proceed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            timer(30, 'timer', 'EXPIRED');
        });
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
    </script>
@endsection
