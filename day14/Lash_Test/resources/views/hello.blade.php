@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-8 text-center">
            <h1>Hello From <b>
                    <font color="red">{{ $name }}</font>
                </b></h1>
            <div class="alert alert-success" type="alert">
                Welcom Back To our System
            </div>

        </div>
    </div>

@endsection