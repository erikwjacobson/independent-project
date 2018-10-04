@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['route' => ['demographics.store'], 'method' => 'POST', 'id' => 'demographicsForm']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Additional Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="age">Age</label>
                                {!! Form::text('age', null, ['class' => 'form-control', 'id' => 'age']) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                {!! Form::select('gender', ['M' => 'Male', 'F' => 'Female', 'O' => 'Other'], null, ['class' => 'form-control', 'id' => 'gender']) !!}
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