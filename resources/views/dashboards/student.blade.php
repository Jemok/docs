@extends('layouts.app')
@section('content')

    <div class="container">


        <div class="row">

            {{--left panel--}}
            <div class="col-md-3">
                <div class="panel panel-default panel-left">
                    <div class="panel-body">

                        <h5 style="text-align: center;"><u><strong>Upload file to a group</strong></u></h5>
                        <p style="text-align: center;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".upload_file_to_group">
                                Upload file&nbsp;<span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                            </button>
                            @include('files.create_file')
                        </p>

                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <td><strong><u>Group members</u></strong></td>
                                </thead>

                                {{--search form--}}
                                <form class="form-horizontal" method="get" action="{{ route('search') }}">
                                    <div class="input-group changethisone col-md-12">
                                        <span class="input-group-addon" type="submit">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control" placeholder="Search a person">
                                    </div>
                                </form>

                                <tbody>

                                <tr>
                                    <td>Reuben njuguna</td>

                                </tr>
                                <tr>
                                    <td><a href="{{ route('allMembers')  }}">More Group members&nbsp;<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a> </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>{{--end of left panel--}}

            {{--right panel--}}
            <div class="col-md-9">

                @if($errors->count())
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Better check your upload. &nbsp;
                    <a data-toggle="modal" data-target=".upload_file_to_group">
                        Try again
                    </a>

                </div>
                @endif

                @include('flash.flash_message')

                <div class="panel panel-default panel-right">
                    <div class="panel-heading"><strong>Files</strong></div>

                    <div class="panel-body panel-body-height" >

                        <div class="row">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active col-md-6 text-center"><a href="#group-files" aria-controls="group-files" role="tab" data-toggle="tab">Group Files<span class="badge">4</span></a></li>
                                    <li role="presentation" class="col-md-6 text-center"><a href="#individual-files" aria-controls="individual-files" role="tab" data-toggle="tab">Individual Files <span class="badge">4</span></a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content tab-header">
                                    <div role="tabpanel" class="tab-pane tab-space active col-md-12" id="group-files">

                                        @if(\Auth::user()->login()->first()->status == 0)
                                            <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You have been automatically placed to a class group.</p>
                                            <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Now you can share files to individual students.</p>
                                            <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You can also share files to the entire group.</p>
                                        @endif

                                        <div class="row">
                                            <div class=" col-md-offset-1 col-md-6">
                                                <table class="table table-results">
                                                    <thead>
                                                    <td>icon and filename | title |</td>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>description | sent by reuben njuguna </td>
                                                    </tr>
                                                    <tr>
                                                        <td><button class="btn btn-primary btn-sm">Download <span class="glyphicon glyphicon-download-alt"></span></button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>




                                    </div>
                                    <div role="tabpanel" class="tab-pane tab-space col-md-12" id="individual-files">

                                        @if(\Auth::user()->login()->first()->status == 0)
                                        <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You have been automatically placed to a class group.</p>
                                        <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Now you can share files to individual students.</p>
                                        <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You can also share files to the entire group.</p>
                                        @endif

                                            <div class="row">
                                                <div class=" col-md-offset-1 col-md-6">
                                                    <table class="table table-results">
                                                        <thead>
                                                        <td>icon and filename | title |</td>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>description | sent by reuben njuguna </td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn btn-primary btn-sm">Download <span class="glyphicon glyphicon-download-alt"></span></button></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
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