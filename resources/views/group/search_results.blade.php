@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3 flash-padding">
                <div class="panel panel-border panel-left">
                    <div class="panel-body">

                        <a class="col-md-offset-5">
                            {{ Auth::user()->name }}
                        </a>

                        {{--search form--}}
                        <div class="flash-padding">
                            <form class="form-horizontal" method="get" action="{{ route('searchGroup') }}">
                                <div class="input-group changethisone col-md-12">
                                    <input type="text" name="search" class="form-control" placeholder="Search a group">
                                    <span class="input-group-addon">
                                             <i class="glyphicon glyphicon-search"></i>
                                        </span>
                                </div>
                            </form>
                        </div>

                        <div class="row flash-padding">
                            <div class="col-md-12">
                                <table class="table">

                                    <tbody>
                                    {{--<td><a href="{{ route('showGroup')  }}">Bit 2013 BSc Information technology</a></td>--}}

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
            </div>

            {{--right panel--}}
            <div class="col-md-9 flash-padding">
                <div class="panel panel-border panel-lecturer">
                    <div class="panel-heading">Search Results</div>
                    <div class="panel-body panel-lecturer-body">
                        @if($results != null)
                        <table class="table">
                            <thead>
                            <td>Group Name</td>
                            <td>Group Code</td>
                            <td>Add</td>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $group_name }}</td>
                                <td>{{ $group->group_code }}</td>
                                <td>
                                    <form method="post" action="{{ route('lecturerFavorite', [$group->id]) }}">
                                        {{ csrf_field() }}
                                        @if($favorite == 0)
                                        <button type="submit" class="btn btn-primary">Add group</button>
                                        @else
                                            <button type="button" class="btn btn-primary disabled">Already in your group</button>
                                        @endif
                                    </form>
                                </td>


                            </tr>
                            </tbody>
                        </table>
                        @else
                            No group found matching your code, check your code and try again
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection