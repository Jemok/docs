
<!-- Small modal -->

<div class="modal fade upload_file_to_group" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
            </div>

                <form class="form-horizontal" method="post" action="#">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-3 control-label">Title:</label>

                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>

                        @if ($errors->has('title'))
                            <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-3 control-label">Description:</label>

                        <div class="col-md-8">
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        @if ($errors->has('description'))
                            <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-3 control-label">File:</label>

                        <div class="col-md-8">
                            <input type="file" name="file" class="form-control" id="file">
                        </div>

                        @if ($errors->has('file'))
                            <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Upload file</button>
                    </div>



                </form>


        </div>
    </div>
</div>