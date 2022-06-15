@include('frontend.includes.header')
@include('frontend.includes.sidebar')

<body>
<div id="accordion" class="col-lg-9 col-md-offset-1 mt-5">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Streaming
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                Create A live stream or live teaching,Screen-Sharing,Video and Audio service in your E-Learning system.
                <a href="http://www.telestream.net/download-files/ustream/6-0/UstreamProducer_6.0.5.zip">Download Broadcaster</a><br>
                <a href="{{ route('streaming') }}"><button class="btn btn-success"> Add to Project</button></a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Video Uploader
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                Create some pages which allows users to upload and download video to and from the E-Learning Ssytem.<br>
                <a href="{{ route('video') }}"><button class="btn btn-success"> Add to Project</button></a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                    Audio Uploader
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                Create some pages which allows users to upload and download audio to and from the E-Learning Ssytem.<br>
                <a href="{{ route('audio') }}"><button class="btn btn-success"> Add to Project</button></a>
            </div>
        </div>
    </div>


</div>
</body>