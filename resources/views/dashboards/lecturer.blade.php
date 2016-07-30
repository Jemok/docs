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
                                    <td><strong>My Groups</strong></td>
                                    </thead>
                                    <tbody>
                                    <td><a href="{{ route('showGroup')  }}">Bit 2013 BSc Information technology</a></td>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{--right panel--}}
            <div class="col-md-9">
                <div class="panel panel-default panel-right">
                    <div class="panel-heading"><strong>Files</strong></div>
                    <div class="panel-body">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default panel-lecturer">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Sent files
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body panel-lecturer-body">
                                       <table class="table">
                                           <thead>
                                           <td>Name and icon</td>
                                           <td>Title</td>
                                           <td>Description</td>
                                           <td>Sent to</td>
                                           </thead>
                                           <tbody>
                                           <tr>
                                               <td>notes</td>
                                               <td>HCI</td>
                                               <td>Scholary work</td>
                                               <td>2015 Bsc Information technology</td>
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

        </div>

    </div>
@endsection