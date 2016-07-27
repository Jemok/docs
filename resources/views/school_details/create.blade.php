@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Successful!</strong> Your group has been created successfully.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 style="text-align: center;"><strong><u>Select year to join a group</u></strong></h5>
                        <form class="form-horizontal" method="post" action="#">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('campus') ? ' has-error' : '' }}">
                                    <label for="campus" class="col-md-3 control-label">Campus:</label>

                                <div class="col-md-9">
                                    <select class="form-control" name="campus">
                                        <option value="#">campus name</option>
                                    </select>

                                    @if ($errors->has('campus'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('campus') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('course') ? ' has-error' : '' }}">
                                    <label for="course" class="col-md-3 control-label">Course:</label>

                                <div class="col-md-9">
                                    <select class="form-control" name="course">
                                        <option value="#">course</option>
                                    </select>

                                    @if ($errors->has('course'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('course') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
                                    <label for="year" class="col-md-3 control-label">Year:</label>

                                <div class="col-md-9">
                                    <select class="form-control" name="year">
                                        <option value="#">Year</option>
                                    </select>

                                    @if ($errors->has('year'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">

                                <label for="month" class="col-md-3 control-label">Month</label>

                                <div class="col-md-9 {{ $errors->has('month') ? ' has-error' : '' }}">
                                    <select class="form-control" name="month">
                                        <option value="#">month</option>
                                    </select>

                                    @if ($errors->has('month'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('group') ? ' has-error' : '' }}">
                                <label for="group" class="col-md-3 control-label">Group</label>

                                <div class="col-md-9">
                                    <select class="form-control" name="group">
                                        <option value="#">group</option>
                                    </select>

                                    @if ($errors->has('group'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <button class="btn btn-primary btn-block"  name="create" type="submit">Create</button>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
