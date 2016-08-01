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


        {{--<div class="col-md-3">--}}
            {{--<div class="panel panel-default panel-left">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h5><strong>About Docs</strong></h5>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}

                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}

        {{--<div class="col-md-8 col-md-offset-1">--}}
            {{--<div class="panel panel-default panel-right">--}}
                {{--<div class="panel-heading">Welcome</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<img src="{{"images/open-book-1690.jpg"}}" alt="open-book" class="index-image"/>--}}

                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
@endsection
