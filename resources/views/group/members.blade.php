@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3 flash-padding">
                <div class="panel panel-border">
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

                <div class="panel panel-border">
                    <div class="panel-body panel-body-height" >

                        <div class="row">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active col-md-6 text-center"><a href="#group-members" aria-controls="group-members" role="tab" data-toggle="tab">Group Members<span class="badge">{{$members->count()}}</span></a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tab-header">
                                <div role="tabpanel" class="tab-pane tab-space active col-md-12" id="group-members">

                                    <div class="row">
                                        <div class=" col-md-offset-1 col-md-6">
                                            @if($members->count())
                                            <table class="table table-results">
                                                <thead>
                                                <td><strong>Name</strong></td>
                                                <td><strong>E-mail</strong></td>
                                                <td><strong>Membership</strong></td>
                                                </thead>
                                                <tbody>
                                                @foreach($members as $member)
                                                <tr>
                                                    <td><span class="glyphicon glyphicon-user glyphicon-members"></span> {{ $member->user->name }}@if($member->user->id == \Auth::user()->id)( Me )@endif</td>
                                                    <td>{{ $member->user->email }}</td>
                                                    <td>
                                                        @if($member->member_type == 1)  Lecturer @endif
                                                        @if($member->member_type == 0)  Student @endif

                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            No more members in this group
                                            @endif

                                            {{ $members->links() }}
                                        </div>
                                    </div>


                                </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>{{--end of rightpanel--}}


        </div>




    </div>

@endsection
