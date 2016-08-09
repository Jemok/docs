@extends('layouts.app')

@section('content')
    <div class="container-image" style="background-image: url('{{ asset('/images/books.jpg')}}');">
        <div class="container container-image" >
            <div class="row">

                <div class="col-md-4 col-md-offset-4 col-file-sharing">

                    <h4>Students Lecturer Files Sharing System is a file sharing application that allows: </h4>
                    <div class="col-md-10">
                        <p><span class="glyphicon glyphicon-check"></span>
                            Lecturers to share files to groups they teach
                        </p>
                        <p><span class="glyphicon glyphicon-check"></span>
                            Students to share files to groups they belong.
                        </p>
                        <p><span class="glyphicon glyphicon-check"></span>
                            Students to share files to other student in their group.
                        </p>
                    </div>
                </div>

            </div>

            <div class="row row-buttons">
                <div class="col-md-3  col-md-offset-1">
                    <a class="btn btn-primary btn-lg btn-block" name="login" href="{{url('login')}}">Login</a>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <a class="btn btn-primary btn-lg btn-block" name="register" href="{{url('register')}}">Register Student</a>
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <a class="btn btn-primary btn-lg btn-block" name="register" href="{{url('register/lecturer')}}">Register Lecturer</a>
                </div>

            </div>

        </div>

    </div>

@endsection
