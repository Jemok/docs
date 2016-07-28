@extends('layouts.app')
@section('content')

    <div class="container">

        @if($errors->count())
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Better check your credentials. &nbsp;
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".upload_file_to_group">
                        Try again
                    </button>

                </div>
            </div>
        </div>
        @endif

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h5 style="text-align: center;"><u><strong>Upload file to a group</strong></u></h5>
                        <p style="text-align: center;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".upload_file_to_group">
                                Upload file
                            </button>
                            @include('files.create_file')
                        </p>

                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <td><strong><u>Group members</u></strong></td>
                                </thead>

                                {{--search form--}}
                                <form class="form-horizontal" method="post" action="#">
                                    <div class="input-group changethisone col-md-12">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-addon">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>
                                    </div>
                                </form>

                                <tbody>
                                <tr>
                                    <td>Reuben njuguna</td>
                                </tr>
                                </tbody>
                            </table>



                        </div>
                    </div>
                </div>
            </div>{{--end of left panel--}}

            {{--right panel--}}
            <div class="col-md-9">

                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Better check your upload. &nbsp;
                    <a data-toggle="modal" data-target=".upload_file_to_group">
                        Try again
                    </a>

                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Student Dashboard</strong></div>

                    <div class="panel-body panel-height" >

                        <div class="row">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active col-md-6 text-center"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Group activities<span class="badge">4</span></a></li>
                                    <li role="presentation" class="col-md-6 text-center"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Individual activities <span class="badge">4</span></a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content tab-header">
                                    <div role="tabpanel" class="tab-pane tab-space active col-md-12" id="home">

                                        @if(\Auth::user()->login()->first()->status == 0)
                                            <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You have been automatically placed to a class group.</p>
                                            <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Now you can share files to individual students.</p>
                                            <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You can also share files to the entire group.</p>
                                        @endif

                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default panel-file">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h5 class="panel-title">
                                                        <strong>
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Group files Item #1
                                                            </a>
                                                        </strong>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        ....file name button
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane tab-space col-md-12" id="settings">

                                        @if(\Auth::user()->login()->first()->status == 0)
                                        <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You have been automatically placed to a class group.</p>
                                        <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Now you can share files to individual students.</p>
                                        <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You can also share files to the entire group.</p>
                                        @endif

                                    </div>
                                </div>


                        </div>
                    </div>
                </div>
            </div>{{--end of rightpanel--}}

        </div>

    </div>
@endsection