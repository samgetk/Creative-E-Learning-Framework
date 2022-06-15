@include('frontend.includes.header')
@include('frontend.includes.sidebar')
<body>
<div id="accordion" class="col-lg-10 col-md-offset-1 centered mt-5">
    @if ($errors->has('page_name'))
        <span class="help-block alert alert-danger">
            <strong>{{ $errors->first('name') }}</strong><br>
            Please enter page name(characters without spaces only)!
        </span>
    @endif
        @if ($errors->has('page_content'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('page_content') }}</strong><br>
                Please enter page Content!
            </span>
        @endif
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                    Add Pages
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">

                <form action="{{ route('add_page') }}" class = "form-horizontal" role = "form" method="POST" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    <div class = "form-group">
                        <label for = "page_name" class = "col-sm-2 control-label">Page Name</label>

                        <div class = "col-sm-9">
                            <input type = "text" class = "form-control" name = "page_name" placeholder = "Enter Page Name">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "page_content" class = "col-sm-2 control-label">Page Content</label>

                        <div class = "col-sm-9">
                            <textarea  class = "tinymce" name="page_content"></textarea>
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
<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/tinymce/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce/init-tinymce.js"></script>
</body>