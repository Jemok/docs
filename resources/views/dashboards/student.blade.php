@extends('layouts.app')
@section('content')

    <div class="container">


        <div class="row">

            {{--left panel--}}
            <div class="col-md-3">
                <div class="panel">
                    <div class="panel-body">

                        <a class="col-md-offset-3">
                            <span class="glyphicon glyphicon-user"> {{ Auth::user()->name }}</span>
                        </a>
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

                                @if($members->count())
                                <tbody>

                                @foreach($members as $member)
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user glyphicon-members"></span> {{ $member->user->name }}@if($member->user->id == \Auth::user()->id) <span class="text-info text-info-size">( Me )</span> @endif
                                        @if($member->member_type == 1) <span class="text-info text-info-size">( Lecturer )</span> @endif
                                    </td>
                                </tr>
                                @endforeach
                                <td>
                                    <a href="{{ route('allMembers')  }}">More Group members&nbsp;<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                                </td>
                                </tbody>
                                @else
                                    No members in this class
                                @endif
                                <tr>
                                    <td>
                                        <a href="{{ url('/logout') }}" class="col-md-offset-5"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>{{--end of left panel--}}

            {{--right panel--}}
            <div class="col-md-9 flash-padding">

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

                <div class="row">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong>
                            @if(isset($class_name))
                               <span class="group-name"> {{ $class_name }} </span> | Code: {{ $class_code }} <span class="font-size">For lecturer use only</span>
                            @endif
                        </strong>
                    </a>
                </div>
                <div class="panel panel-border">
                    <div class="panel-body panel-height" >

                        <?php

                        $value = \Illuminate\Support\Facades\Request::get('individual_files_page')

                        ?>
                        <div class="row">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="

                                    @if($value == null)
                                            active
                                    @else
                                    @endif



                                     col-md-6 text-center"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Group Files<span class="badge">{{ $new_group_files_count }}</span></a></li>
                                    <li role="presentation" class="

                                     @if($value != null)
                                            active
                                    @else
                                    @endif

                                            col-md-6
                                             text-center"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Individual Files <span class="badge">{{ $new_inbox_files_count }}</span></a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content tab-header">
                                    <div role="tabpanel" class="tab-space tab-pane col-md-12
                                     @if($value == null)
                                            active
                                    @else
                                    @endif

                                    " id="home">


                                        @if($group_files->count())
                                        <table class="table table-responsive">
                                            <thead>
                                            </thead>
                                            <tbody>
                                            @foreach($group_files as $group_file)
                                            <tr class="@if($group_file->updated_at > $last_login) bg-info @endif">
                                                <td>
                                                    <div class="col-md-2">
                                                    @if($group_file->user_id == \Auth::user()->id)
                                                        <span class="glyphicon glyphicon-arrow-up font-size"></span>
                                                    @else
                                                        <span class="glyphicon glyphicon-arrow-down font-size"></span>
                                                    @endif

                                                    @if($group_file->file->extension == 'docx')
                                                        <img src="{{ asset('icons/word.jpg') }}" height="50px">
                                                    @endif

                                                    @if($group_file->file->extension == 'pdf')
                                                            <img src="{{ asset('icons/pdf1.png') }}" height="50px">
                                                    @endif

                                                        @if($group_file->file->extension == 'odt')
                                                            <img src="{{ asset('icons/writer.png') }}" height="50px">
                                                        @endif

                                                        @if($group_file->file->extension == 'ppt')
                                                            <img src="{{ asset('icons/ppt.png') }}" height="50px">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        @if($group_file->user_id == \Auth::user()->id)
                                                            <div>
                                                            <span class="font-size">Me . {{ $group_file->created_at->diffForHumans() }}. @if($group_file->updated_at > $last_login) <span class="new-file">New </span> @endif</span>
                                                            </div>
                                                        @else
                                                            <div>
                                                            <span class="font-size"> {{ $group_file->user->name }} . {{ $group_file->created_at->diffForHumans() }}. @if($group_file->updated_at > $last_login) <span class="new-file">New </span> @endif </span>
                                                            </div>
                                                        @endif
                                                            <div>
                                                                <span class="font-bold">({{ $group_file->file->file_name }} | {{ $group_file->file->title }} )</span>
                                                            </div>
                                                            <div>
                                                                {{ $group_file->file->description }}
                                                            </div>
                                                    </div>
                                                </td>
                                                <td><a href="{{ asset('uploads/'. $group_file->file->file_name) }}" class="btn btn-primary btn-sm">Download <span class="glyphicon glyphicon-download-alt"></span></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <div class="col-md-offset-7">{{ $group_files->links() }}</div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                            @else
                                            @if(\Auth::user()->login()->first()->status == 0)
                                                <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You have been automatically placed to a class group.</p>
                                                <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Now you can share files to individual students.</p>
                                                <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;You can also share files to the entire group.</p>
                                            @endif
                                            No files shared to this group
                                        @endif

                                    </div>
                                    <div role="tabpanel" class="tab-space tab-pane col-md-12

                                        @if($value != null)
                                            active
                                        @else
                                        @endif

                                       " id="settings">
                                        @if($inbox_files->count())
                                            <table class="table table-responsive">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                @foreach($inbox_files as $inbox_file)
                                                    <tr class="@if($inbox_file->updated_at > $last_login) bg-info @endif">
                                                        <td>
                                                            <div class="col-md-2">
                                                                @if($inbox_file->user_id == \Auth::user()->id)
                                                                    <span class="glyphicon glyphicon-arrow-up font-size"></span>
                                                                @else
                                                                    <span class="glyphicon glyphicon-arrow-down font-size"></span>
                                                                @endif

                                                                @if($inbox_file->file->extension == 'docx')
                                                                    <img src="{{ asset('icons/word.jpg') }}" height="50px">
                                                                @endif

                                                                @if($inbox_file->file->extension == 'pdf')
                                                                    <img src="{{ asset('icons/pdf1.png') }}" height="50px">
                                                                @endif

                                                                @if($inbox_file->file->extension == 'odt')
                                                                    <img src="{{ asset('icons/writer.png') }}" height="50px">
                                                                @endif

                                                                @if($inbox_file->file->extension == 'ppt')
                                                                    <img src="{{ asset('icons/ppt.png') }}" height="50px">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-8">
                                                                @if($inbox_file->user_id == \Auth::user()->id)
                                                                    <div>
                                                                        <span class="font-size">@if($inbox_file->receiver == \Auth::user()->id) MyFile @else to {{ $inbox_file->file_receiver->name }} @endif . {{$inbox_file->created_at->diffForHumans()}}. @if($inbox_file->updated_at > $last_login) <span class="new-file">New </span> @endif</span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="font-bold">({{ $inbox_file->file->file_name }} | {{ $inbox_file->file->title }} )</span>
                                                                    </div>
                                                                    <div>
                                                                        {{ $inbox_file->file->description }}
                                                                    </div>
                                                                @else
                                                                    <div>
                                                                        <span class="font-size">from {{ $inbox_file->user->name }} . {{$inbox_file->created_at->diffForHumans()}}. @if($inbox_file->updated_at > $last_login) <span class="new-file">New </span> @endif</span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="font-bold">({{ $inbox_file->file->file_name }} | {{ $inbox_file->file->title }} )</span>
                                                                    </div>
                                                                    <div>
                                                                        {{ $inbox_file->file->description }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td><a href="{{ asset('uploads/'. $inbox_file->file->file_name) }}" class="btn btn-primary btn-sm">Download <span class="glyphicon glyphicon-download-alt"></span></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <div class="col-md-offset-7">{{ $inbox_files->links() }}</div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        @else
                                            @if(\Auth::user()->login()->first()->status == 0)
                                                <p class="col-md-12"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;Now you can share files to individual students.</p>
                                            @endif
                                            No files shared to you currently
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