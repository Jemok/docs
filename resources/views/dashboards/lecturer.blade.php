@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3">
                <div class="panel panel-default left-panel-height">
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
                    </div>
                </div>
            </div>

            {{--right panel--}}
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default right-panel-height">
                    <div class="panel-heading"><strong>Lecturer's Dashboard</strong></div>

                    <div class="panel-body">

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection