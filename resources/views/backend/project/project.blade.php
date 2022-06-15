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
                    HomePage
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <form action="{{route('homepage')}}" class = "form-horizontal"  method="POST" >
                    {{ csrf_field()}}
                <div class = "form-group">
                    <label for = "layoutchoice" class = "col-sm-2 control-label">Choose Color :</label>
                    <div for = "customdesign" class = "col-sm-5 control-label" class = "radio">
                        <label>
                            <input class="jscolor col-sm-9" onchange="update(this.jscolor)" name ="color_choice" placeholder="Click here"><br><br>
                            <p>Your Header and Footer background color look like:</p>
                            <div class="col-sm-9">
                                <p id="rect" class="block" style=" background:gray; width: 100%;  height:50px;">
                            </div>
                        </label>
                    </div>
                </div>

                    <div class = "form-group">
                        <label for = "layoutchoice" class = "col-sm-2 control-label">Design Choice:</label>

                        <div for = "customdesign" class = "col-sm-2 control-label" class = "radio">
                            <label>
                                <input type = "radio" name = "home_layout_choice" id = "login" value = "login" checked> Login Page
                            </label>
                        </div>
                        <div for = "layoutchoice" class = "col-sm-2 control-label" class = "radio">
                            <label>
                                <input type = "radio" name = "home_layout_choice" id = "image" value = "image"> Image Slider
                            </label>
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

<script>
    function update(jscolor) {
        document.getElementById('rect').style.backgroundColor = '#' + jscolor
    }
</script>

<body>









