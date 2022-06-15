@include('frontend.includes.header')

<body>
<div id="accordion" class="col-lg-9 col-md-offset-1 mt-5">
    @if(isset($error))
        <div class="alert alert-dismissable alert-danger">
            {{ $error }}
        </div>
    @endif
    @if(isset($success))
        <div class="alert alert-dismissable alert-success">
            {{ $success }}
        </div>
    @endif
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    With Administrator
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                Create pages for instructors and students with administrator.<br>
                <a href="{{ route('admin')}}"><button class="btn btn-success">Create</button></a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    With out Administratror
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                Create pages for instructors and students with out administrator..<br>
                <a href="{{ route('noAdmin') }}"><button class="btn btn-success">Create</button></a>
            </div>
        </div>
    </div>
<body>









