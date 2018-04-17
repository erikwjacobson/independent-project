@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h2>PSYC 211W Research Project</h2>
                                <p><b>Created by</b>: Erik Jacobson, Narissa Gran, Sarah Hagar, Megan Straka, & Molly Burmeister</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>The Study</h3>
                                <p>
                                    As part of our research methods course, we were required to develop and execute
                                    an experimental study relating to the behavioral sciences. We chose to explore the
                                    topic of emotional interpretation of text messages.
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Methodology</h3>
                                <p>
                                    Discuss the website
                                </p>
                                <p>Check out the demonstration of the methods!</p>
                                <a href="{{ route('home') }}" class="btn btn-lg btn-primary">Demo</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Results</h3>
                                <p>
                                    Discuss the findings
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Conclusions</h3>
                                <p>
                                    Discuss the conclusions
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection