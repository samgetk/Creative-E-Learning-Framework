@include('frontend.includes.header')
@include('frontend.includes.sidebar')
<div id="accordion" class="col-lg-10 col-md-offset-1 centered mt-5">
    @if ($errors->has('menu_name'))
        <span class="help-block alert alert-danger">
            <strong>{{ $errors->first('name') }}</strong><br>
            Please enter menu name(characters without spaces only)!
        </span>
    @endif
        @if ($errors->has('link_to'))
            <span class="help-block alert alert-danger">
            <strong>{{ $errors->first('name') }}</strong><br>
            No pages Created!Please Create Pages First!
        </span>
        @endif
<div class="card">
    <div class="card-header" id="headingOne">
        <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                Add Menus
            </button>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <form action="create_menu" class = "form-horizontal" role = "form" method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class = "form-group">
                    <label for = "projectname" class = "col-sm-2 control-label">Menu Name</label>

                    <div class = "col-sm-9">
                        <input type = "text" class = "form-control" name = "menu_name" placeholder = "Enter Menu Name" required>
                    </div>
                </div>

                <div class = "form-group">
                    <label for = "institutionname" class = "col-sm-2 control-label">Menu For:</label>

                    <div class = "col-sm-9">
                        <select class = "form-control" name = "menu_choice">
                        <option>Guest Home</option>
                        <option> Administrator Home</option>
                        <option> Student Home</option>
                        <option> Teachers Home</option>
                    </select>
                    </div>
                </div>

                <div class = "form-group">
                    <label for = "layoutchoice" class = "col-sm-2 control-label">Link To:</label>

                    <div class = "col-sm-9">

                        <select class = "form-control" name = "link_to">
                            @if(isset($menu))
                                @foreach($menu as $data)
                            <option>{{ $data->name }}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>
                </div>
                <div class = "col-md-offset-2 col-sm-9">
                    <input type = "submit" class = "btn btn-success btn-block mb-4 mt-3" id="success" value="Create" />
                </div>
            </form>
        </div>
    </div>
</div>
</div>


