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
                        <form class="form-horizontal" method="post" action="#">
                            <div class="input-group changethisone col-md-12">
                                <input type="text" class="form-control" placeholder="Search a group">
                                <span class="input-group-addon">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>
                            </div>
                        </form>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <td><strong>Current Group</strong></td>
                                    </thead>
                                    <tbody>
                                    <td>{{ $group_name }} . <span class="font-size">{{ $group_code }} </span></td>
                                    <tr>
                                        <td>
                                            <a href="{{ url('/home') }}" class="col-md-offset-4">Back Home</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ url('/logout') }}" class="col-md-offset-5"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>
                </div>
            </div>{{--end left panel--}}

            {{--right panel--}}
            <div class="col-md-9 flash-padding">
                @include('flash.flash_message')
                <div class="panel panel-border">
                    <div class="panel-heading"><strong>Uploald a file to {{ $group_name }} . <span class="font-size">{{ $group_code }} </span></strong></div>
                    <div class="panel-body">
                         <form class="form-horizontal" method="post" action="{{ route('lecturerShare', [$group_id]) }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="title" class="col-md-3 control-label">Title:</label>

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
                                                <label for="description" class="col-md-3 control-label">Description:</label>

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
                                                <label for="file" class="col-md-3 control-label">Upload file:</label>

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
                            </div>
                        </div>

                    </div>

@endsection