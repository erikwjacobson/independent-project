@extends('layouts.admin')
@section('adminContent')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Data Export</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-primary" href="{{route('admin.api.token')}}">Generate Key</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Routes:</h4>
                            <br>
                            TODO
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection