@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row flash-padding">

            <div class="col-md-5">
                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                <h4><strong> You can share the following type of files</strong></h4>
                <div class="flash-padding">
                    <div class="row col-md-3">
                        <img src="{{asset('icons/pdf.jpg')}}" alt="pdf">
                    </div>
                    <div class="row col-md-3">
                        <img src="{{asset('icons/ppt.png')}}">
                    </div>

                    <div class="row col-md-3">
                        <img src="{{asset('icons/writer.png')}}" alt="writer">
                    </div>
                    <div class="row col-md-3">
                        <img src="{{asset('icons/word.jpg')}}" alt="writer">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-border ">
                    <div class="panel-body">
                        <h5 style="text-align: center;"><strong><u>Select year to join a group</u></strong></h5>
                        <form class="form-horizontal" method="post" action="{{ route('storeUserSchoolDetails') }}">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('campus') ? ' has-error' : '' }}">
                                    <label for="campus" class="col-md-3 control-label">Campus:</label>

                                <div class="col-md-9">
                                    <select class="form-control" name="campus">
                                        @if($campuses->count())
                                            <option selected disabled>Select a campus</option>
                                            @foreach($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->campus_name }}</option>
                                            @endforeach
                                        @else
                                            <option class="disabled" disabled="">No campuses to display</option>
                                        @endif
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
                                        @if($courses->count())
                                            <option disabled selected>Select a course</option>
                                            @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                            @endforeach
                                        @else
                                            <option selected disabled>No courses to display</option>
                                        @endif
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
                                        @if($years->count())
                                            <option disabled selected>Select an year</option>
                                            @foreach($years as $year)
                                                <option value="{{ $year->id }}">{{ $year->year  }}</option>
                                            @endforeach
                                        @else
                                            <option disabled selected>No years to display</option>
                                        @endif
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
                                        @if($months->count())
                                            <option disabled selected>Select a month</option>
                                            @foreach($months as $month)
                                            <option value="{{ $month->id }}">{{ $month->month }}</option>
                                            @endforeach
                                        @else
                                            <option disabled selected>No momths to display</option>
                                        @endif
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
                                        @if($groups->count())
                                            <option disabled selected>Select your class group</option>
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->division }}</option>
                                            @endforeach
                                        @else
                                                <option disabled selected>No groups to display</option>
                                        @endif
                                    </select>

                                    @if ($errors->has('group'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('notify') ? ' has-error' : '' }}">
                                <label for="notify" class="col-md-3 control-label">Get email notifications?</label>

                                <div class="col-md-9">


                                    <input type="checkbox" value="1" name="notify" checked>

                                    @if($errors->has('notify'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('notify') }}</strong>
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
