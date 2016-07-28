
<!--flash message if statement-->
@if(Session::has("flash_message"))
    <div class="row">
        <div class="col-md-12 ">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{session("flash_message")}}</strong>
            </div>
        </div>
    </div>
@endif
