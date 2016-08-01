@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-border">
                <div class="panel-heading">Welcome to Docs</div>

                <div class="panel-body">
                    <h1>A file sharing application:</h1>
                    <div class="col-md-offset-3">
                        <p>Lecturers to groups they teach</p>
                        <p>Students to groups they belong</p>
                        <p>Student to another student</p>
                    </div>
                    <h2>Allows you to share the following:</h2>
                    
                    <div class="row flash-padding">
                        <div class="col-md-3">
                            <img src="{{ asset('icons/pdf.jpg') }}">
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('icons/word.jpg') }}">
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('icons/ppt.png') }}">
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('icons/writer.png') }}">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
