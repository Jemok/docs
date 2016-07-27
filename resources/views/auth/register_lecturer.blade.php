@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 style="text-align: center;"><strong><u>Register as a lecturer</u></strong></h5>

                        <form class="form-horizontal" method="post" action="">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label" >Name:</label>

                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label" >Email:</label>

                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 control-label" >Password:</label>

                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password_confirmation" class="col-md-3 control-label" >Password confirmation:</label>

                                <div class="col-md-9">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('staff_id') ? ' has-error' : '' }}">
                                <label for="staff_id" class="col-md-3 control-label" >Staff id:</label>

                                <div class="col-md-9">
                                    <input id="staff_id" type="text" class="form-control" name="staff_id" value="{{ old('staff_id') }}">

                                    @if ($errors->has('staff_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('campus') ? ' has-error' : '' }}">
                                <label for="campus" class="col-md-3 control-label" >Campus:</label>

                                <div class="col-md-9">
                                    <select class="form-control" name="campus">
                                        <option value="#">campus</option>
                                    </select>

                                    @if ($errors->has('campus'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('campus') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3 col-md-offset-4">
                                <button class="btn btn-primary btn-block" type="submit" name="save" >Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

