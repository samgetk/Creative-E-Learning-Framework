@include('frontend.includes.header')
@include('frontend.includes.sidebar')
<body>
<body>
<div id="accordion" class="col-lg-9 col-md-offset-1 mt-5">

    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Document Uploader
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                Create some pages which allows users to upload and download documents to and from the E-Learning Ssytem.<br>
                <a href="{{ route('resource_creator') }}"><button class="btn btn-success"> Add to Project</button></a>
            </div>
        </div>
    </div>
<body>






   


