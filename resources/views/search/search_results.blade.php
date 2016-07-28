@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
                {{--left panel--}}
            <div class="col-md-3">
                <div class="panel panel-default panel-search-result">
                    <div class="panel-body">

                        {{--search form--}}
                        <form class="form-horizontal" method="get" action="{{ route('search') }}">
                            <div class="input-group changethisone col-md-12">
                                        <span class="input-group-addon" type="submit">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>
                                <input type="text" name="search" class="form-control" placeholder="Search a person">
                            </div>
                        </form>
                    </div>
                </div>
            </div>{{--end left panel--}}

                {{--right panel--}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">



                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <td><strong>Name</strong></td>
                                <td><strong>Group</strong></td>
                                <td><strong>Share</strong></td>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>reuben njuguna</td>
                                    <td>jfkejfk cwjfekfjk skfjekfjk swkfjk jkwfjk jckjk</td>
                                    <td>
                                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            Share file
                                        </a>

                                        <div class="collapse" id="collapseExample">
                                            <div class="well ">

                                                <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
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

                                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
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

                                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
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
                                                        <div class="col-md-3 col-md-offset-6">
                                                            <button class="btn btn-primary" type="submit" name="submit">Upload</button>
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>{{--end right panel--}}
        </div>
    </div>
@endsection