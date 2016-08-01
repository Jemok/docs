@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3 flash-padding">
                <div class="panel">
                    <div class="panel-body">

                        <a class="col-md-offset-5">
                            {{ Auth::user()->name }}
                        </a>

                        {{--search form--}}
                        <div class="flash-padding">
                        <form class="form-horizontal" method="get" action="{{ route('searchGroup') }}">
                            <div class="input-group changethisone col-md-12">
                                <input type="text" name="search" class="form-control" placeholder="Search a group by its code">
                                <span class="input-group-addon">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>
                            </div>
                        </form>
                        </div>

                        <div class="row flash-padding">
                            <div class="col-md-12">

                                <table class="table">
                                    <thead>
                                    <td><strong>Favorites</strong></td>
                                    </thead>
                                    @if($lecturer_groups->count())
                                    <tbody>
                                    @foreach($lecturer_groups as $lecturer_group)

                                    <tr>
                                    <td><a href="{{ route('showGroup', [$lecturer_group->id, $classRepository->makeName($lecturer_group), $lecturer_group->group_code  ])  }}">{{  $classRepository->makeName($lecturer_group)  }}. <span class="font-size">{{$lecturer_group->group_code}}</span></a></td>
                                    </tr>

                                    @endforeach

                                    </tbody>
                                    @else
                                     You have no favorites
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
                </div>
            </div>

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
                            <div class="panel">
                                <div class="panel-heading">Sent Files</div>
                                    <div class="panel-body panel-border">
                                        @if($lecturer_files->count())
                                            <table class="table table-responsive">
                                                <thead>
                                                </thead>
                                                <tbody>
                                                @foreach($lecturer_files as $lecturer_file)
                                                    <tr>
                                                        <td>
                                                            <div class="col-md-2">
                                                                @if($lecturer_file->user_id == \Auth::user()->id)
                                                                    <span class="glyphicon glyphicon-arrow-up font-size"></span>
                                                                @else
                                                                    <span class="glyphicon glyphicon-arrow-down font-size"></span>
                                                                @endif

                                                                @if($lecturer_file->file->extension == 'docx')
                                                                    <img src="{{ asset('icons/word.jpg') }}" height="50px">
                                                                @endif

                                                                @if($lecturer_file->file->extension == 'pdf')
                                                                    <img src="{{ asset('icons/pdf1.png') }}" height="50px">
                                                                @endif

                                                                @if($lecturer_file->file->extension == 'odt')
                                                                    <img src="{{ asset('icons/writer.png') }}" height="50px">
                                                                @endif

                                                                @if($lecturer_file->file->extension == 'ppt')
                                                                    <img src="{{ asset('icons/ppt.png') }}" height="50px">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div>
                                                                    <span class="font-size">to {{ $classRepository->makeName($lecturer_file->group) }} . {{ $lecturer_file->group->group_code }} . {{ $lecturer_file->created_at->diffForHumans() }}</span>
                                                                </div>
                                                                <div>
                                                                    <span class="font-bold">({{ $lecturer_file->file->file_name }} | {{ $lecturer_file->file->title }} )</span>
                                                                </div>
                                                                <div>
                                                                    {{ $lecturer_file->file->description }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><a href="{{ asset('uploads/'. $lecturer_file->file->file_name) }}" class="btn btn-primary btn-sm">Download <span class="glyphicon glyphicon-download-alt"></span></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <div class="col-md-offset-7">{{ $lecturer_files->links() }}</div>
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
                                </div>
                            </div>
                </div>
            </div>
@endsection