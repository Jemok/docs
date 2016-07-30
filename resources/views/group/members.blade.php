@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">

            {{--left panel--}}
            <div class="col-md-3">
                <div class="panel panel-default panel-left">
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

                <div class="panel panel-default panel-right">
                    <div class="panel-heading"><strong>Members</strong></div>
                    <div class="panel-body panel-body-height" >

                        <div class="row">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active col-md-6 text-center"><a href="#group-members" aria-controls="group-members" role="tab" data-toggle="tab">Group Members<span class="badge">4</span></a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tab-header">
                                <div role="tabpanel" class="tab-pane tab-space active col-md-12" id="group-members">

                                    <div class="row">
                                        <div class=" col-md-offset-1 col-md-6">
                                            <table class="table table-results">
                                                <thead>
                                                <td>Name</td>
                                                <td>e-mail</td>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Reuben Njuguna </td>
                                                    <td>renn@docs.com</td>
                                                </tr>
                                                </tbody>
                                            </table>
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
