@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h5 style="text-align: center;"><u><strong>Upload file to a group</strong></u></h5>
                        <p style="text-align: center;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload_file_to_group">
                                Upload file
                            </button>
                            {{--@include('teams.create_team')--}}
                        </p>

                        <p style="text-align: center;">
                            <strong><u>Group name</u></strong>
                        </p>

                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <td><strong><u>Group members</u></strong></td>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Name1</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>{{--end of left panel--}}

            {{--right panel--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Dashboard</div>

                    <div class="panel-body">

                        <p>You are logged in as a student</p>

                        <div class="row">

                                <p class="col-md-5 col-md-offset-7"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You have been automatically placed to a class group.</p>
                                <p class="col-md-5 col-md-offset-7"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Now you can share files to individual students.</p>
                                <p class="col-md-5 col-md-offset-7"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You can also share to the entire group.</p>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-md-6">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#group_files" aria-expanded="false" aria-controls="collapseExample">
                                    Group activities
                                </button>
                                <a href="#"><span class="badge" >1</span></a>
                                <div class="collapse" id="group_files">
                                    <div class="well">
                                        group feeds
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#inbox" aria-expanded="false" aria-controls="collapseExample">
                                    Individual activities
                                </button>
                                <a href="#"><span class="badge" >1</span></a>
                                <div class="collapse" id="inbox">
                                    <div class="well">
                                        personal feeds
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>{{--end of rightpanel--}}

        </div>

    </div>
@endsection