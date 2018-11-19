@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['route' => ['demographics.store'], 'method' => 'POST', 'id' => 'demographicsForm', 'autocomplete' => 'off']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Additional Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Basic Information</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="age">Age</label>
                                {!! Form::text('age', null, ['class' => 'form-control', 'id' => 'age']) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'O' => 'Other', 'NA' => 'Prefer not to say'], null, ['class' => 'form-control', 'id' => 'gender']) !!}
                                <div id="other" style="display:none;">
                                    <br>
                                    {!! Form::text('', null, ['class' => 'form-control', 'placeholder' => 'Please Specify', 'id' => 'otherGender']) !!}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Language Information</h5>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Is English your primary language?</label>
                                Yes&nbsp;<input type="radio" name="primaryLang" class="language">
                                No&nbsp;<input type="radio" name="primaryLang" class="language" id="english_no">
                            </div>
                            <div id="english_no_text" class="col-md-6" style="display: none;">
                                {!! Form::text('language', null, ['class' => 'form-control', 'placeholder' => 'Please specify your primary language', 'id' => 'language_text']) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Social Media Use</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Facebook</label>
                                <input type="checkbox" name="social[facebook]" id="facebook">
                            </div>
                            <div class="col-md-3">
                                <label>Twitter</label>
                                <input type="checkbox" name="social[twitter]" id="twitter">
                            </div>
                            <div class="col-md-3">
                                <label>YouTube</label>
                                <input type="checkbox" name="social[youtube]" id="youtube">
                            </div>
                            <div class="col-md-3">
                                <label>Instagram</label>
                                <input type="checkbox" name="social[instagram]" id="instagram">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6" id="facebook_text" style="display: none;">
                                <label>How many times do you check Facebook per day?</label>
                                {!! Form::text('facebook_use', null, ['class' => 'form-control', 'placeholder' => 'Times Per Day']) !!}
                                <br>
                            </div>
                            <div class="col-md-6" id="twitter_text" style="display: none;">
                                <label>How many times do you check Twitter per day?</label>
                                {!! Form::text('twitter_use', null, ['class' => 'form-control', 'placeholder' => 'Times Per Day']) !!}
                                <br>
                            </div>
                            <div class="col-md-6" id="youtube_text" style="display: none;">
                                <label>How many times do you check YouTube per day?</label>
                                {!! Form::text('youtube_use', null, ['class' => 'form-control', 'placeholder' => 'Times Per Day']) !!}
                                <br>
                            </div>
                            <div class="col-md-6" id="instagram_text" style="display: none;">
                                <label>How many times do you check Instagram per day?</label>
                                {!! Form::text('instagram_use', null, ['class' => 'form-control', 'placeholder' => 'Times Per Day']) !!}
                                <br>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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
        $(function () {
            $('#gender').on('change', function () {
                if ($(this).val() === 'O') {
                    $('#other').show();
                    $('#otherGender').attr('name', 'gender');
                    $('#gender').attr('name', '');
                } else {
                    $('#other').hide();
                    $('#otherGender').attr('name', '');
                    $('#gender').attr('name', 'gender');
                }
            });

            $('.language').on('change', function () {
                if ($('#english_no').is(':checked')) {
                    $('#english_no_text').show();
                } else {
                    $('#english_no_text').hide();
                    $('#language_text').val('english');
                }
            });

            var array = [
                '#facebook',
                '#twitter',
                '#youtube',
                '#instagram',
            ];
            $(array).each(function (index, item) {
                $(item).on('change', function (e) {
                    console.log('Change');
                    if ($(this).is(':checked')) {
                        $(item + '_text').show();
                    } else {
                        $(item + '_text').hide();
                    }
                });
            });
        });
    </script>
@endsection