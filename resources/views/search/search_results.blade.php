@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
                {{--left panel--}}
            <div class="col-md-3 flash-padding">
                <div class="panel">
                    <div class="panel-body">

                        <a class="col-md-offset-3">
                            {{ Auth::user()->name }}
                        </a>
                        {{--search form--}}
                        <div class="flash-padding">
                        <form class="form-horizontal" method="get" action="{{ route('search') }}">
                            <div class="input-group changethisone col-md-12">
                                        <span class="input-group-addon" type="submit">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>

                                <input type="text" name="search" class="form-control" placeholder="Search a person">
                            </div>
                        </form>
                        </div>
                        <div class="flash-padding">
                            <a class="col-md-offset-3">
                                <a href="{{ url('/home') }}">Back Home</a>
                            </a>
                        </div>
                        <div class="flash-padding">
                        <a href="{{ url('/logout') }}" class="col-md-offset-3"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>{{--end left panel--}}

                {{--right panel--}}
            <div class="col-md-9 flash-padding">
                @include('flash.flash_message')

                @if($errors->count())
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Better check your upload.Try again
                </div>
                @endif

                <div class="panel panel-border">
                    <div class="panel-body">

                        <div class="col-md-12">
                            @if($users->count())
                            <table class="table">
                                <thead>
                                <td><strong>Name</strong></td>
                                <td><strong>Group</strong></td>
                                <td><strong>Share</strong></td>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    @foreach($group_names as $group_name)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $group_name }}</td>
                                    <td>
                                        <a data-toggle="collapse" href="#share_file_{{$user->id}}" aria-expanded="false" aria-controls="collapseExample">
                                            Share file
                                        </a>

                                        <div class="collapse @if(Session::has("receiver")) @if(session("receiver") == $user->id) in @endif @endif" id="share_file_{{$user->id}}">
                                            <div class="well">

                                                <form class="form-horizontal" method="post" action="{{ route('shareFileToUser', [$user->id]) }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}

                                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                        <label for="title" class="col-md-4 control-label">Title:</label>

                                                        <div class="col-md-8">
                                                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                                            @if ($errors->has('title'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('title') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                        <label for="description" class="col-md-4 control-label">Description:</label>

                                                        <div class="col-md-8">
                                                            <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>

                                                            @if ($errors->has('description'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('description') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                                                        <label for="file" class="col-md-4 control-label">Upload file:</label>

                                                        <div class="col-md-8">
                                                            <input id="file" type="file" class="form-control" name="file" value="{{ old('file') }}">

                                                            @if ($errors->has('file'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('file') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-3 col-md-offset-5">
                                                            <button class="btn btn-primary" type="submit" name="submit">Upload</button>
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                No results found
                            @endif
                        </div>


                    </div>
                </div>
            </div>{{--end right panel--}}
        </div>
    </div>
@endsection