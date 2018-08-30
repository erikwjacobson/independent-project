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
                                    As part of our research methods course at <a target="_blank" href="https://mnsu.edu">Minnesota State University, Mankato</a>,
                                    we were required to plan and conduct
                                    an experimental study relating to the psychological sciences. Our group chose to explore a topic relating to
                                    the emotional interpretation of text messages. In the present experiment,
                                    we examined the relationship between text messaging styles and the ability for participants to perceive emotion.
                                </p>
                                <br>
                                <div class="text-center">
                                    <label for="abstract">Abstract</label>
                                </div>
                                <p id="abstract">
                                    With the recent developments in online communication, new research has begun exploring how online
                                    communication is fundamentally different from traditional face to face communication. The present
                                    study looked at how participants could depict an emotion through a text message that was presented
                                    in different styles. The researchers used abbreviated, grammatically correct text, and grammatically
                                    correct text with emojis to present various styles of text. Each text style was conveying either
                                    positive, neutral, or negative emotional context. Participants were asked to interpret the emotional
                                    context of each text message presented to them. The results found that grammatical text messaging style
                                    produced the most accurate interpretations of the emotion portrayed. The study also analyzed the
                                    differences of emotional context in text style which lead to the discovery of text style and emojis’
                                    impact on emotional interpretation.
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Methodology</h3>
                                <p>
                                    The study gathered data on participants using a web application developed by Erik Jacobson. It was created using
                                    the web development framework known as Laravel, and was hosted online for participants to access during the experiment.
                                    Participants used the application to examine and answer questions about various text messages and their emotional context.
                                    Following each experimental trial the application was also developed to export the participant's data in a format for
                                    ease of analysis.
                                </p>
                                <br>
                                <p>Click the Demo button to check out the demonstration of the methods!</p>
                                <a href="{{ route('demo') }}" class="btn btn-lg btn-primary">Demo</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Resources</h3>
                                <p>
                                    In order to share out results with the community, we have decided to make
                                    the essay and PowerPoint presentation publicly available.
                                </p>
                                <ul>
                                    <li><h4><a href="{{ route('download', ['path' => 'finaldraft.docx']) }}">Essay</a></h4></li>
                                    <li><h4><a href="{{ route('download', ['path' => 'IndependentProjectInstructions.pptx']) }}">PowerPoint Presentation</a></h4></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection