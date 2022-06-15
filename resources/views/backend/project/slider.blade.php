@include('frontend.includes.header')

<body>
<div id="accordion" class="col-lg-9 col-md-offset-1 mt-5">
    @if(isset($error))
        <div class="alert alert-dismissible alert-danger">
            {{ $error }}
        </div>
    @endif
    @if(isset($success))
        <div class="alert alert-dismissible alert-success">
            {{ $success }}
        </div>
    @endif
    <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
               Set Images for Slider
            </button>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            <form action="{{route('slider')}}" class = "form-horizontal"  method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class = "form-group">
                    <label for = "image1" class = "col-sm-2 control-label">Image 1: </label>

                    <div class = "col-sm-9">
                        <input type = "file" class = "form-control" name = "slide1">
                    </div>
                </div>

                <div class = "form-group">
                    <label for = "image2" class = "col-sm-2 control-label">Iamge 2: </label>

                    <div class = "col-sm-9">
                        <input type = "file" class = "form-control" name = "slide2">
                    </div>
                </div>

                <div class = "form-group">
                    <label for = "image3" class = "col-sm-2 control-label">Image 3: </label>

                    <div class = "col-sm-9">
                        <input type = "file" class = "form-control" name = "slide3">
                    </div>
                </div>

                <div class = "col-md-offset-2 col-sm-9">
                    <input type = "submit" class = "btn btn-success btn-block" id="success" value="Create" />
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jscolor.js"></script>
<script src="js/jquery.js"></script>
<body>









