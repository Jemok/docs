@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3">
                <div class="panel panel-default panel-left">
                    <div class="panel-body">

                        {{--search form--}}
                        <form class="form-horizontal" method="post" action="#">
                            <div class="input-group changethisone col-md-12">
                                <input type="text" class="form-control" placeholder="Search a group">
                                <span class="input-group-addon">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <td><strong>Current Group</strong></td>
                                    </thead>
                                    <tbody>
                                    <td><a href="#">Bit 2013 BSc Information technology</a></td>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>
            </div>{{--end left panel--}}

            {{--right panel--}}
            <div class="col-md-9">
                <div class="panel panel-default panel-right">
                    <div class="panel-heading"><strong>Files</strong></div>
                    <div class="panel-body">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default panel-lecturer">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#lecturerCollapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Share files
                                        </a>
                                    </h4>
                                </div>
                                <div id="lecturerCollapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body panel-lecturer-body">
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
                </div>
            </div>

        </div>

    </div>
@endsection