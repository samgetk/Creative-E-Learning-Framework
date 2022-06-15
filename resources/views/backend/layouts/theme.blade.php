@include('frontend.includes.header')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Your page description here" />
    <meta name="author" content="" />
    <link href="img/logo/logo.png" rel="icon">
    <!-- css -->
    <link href="css/theme/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/prettyPhoto.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="css/theme_style.css" rel="stylesheet">
    <!-- Theme skin -->
    <link id="t-colors" href="color/default.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
    <section id="content">
        <div class="container">
            <div class="row" align="center">
                <div class="span12">
                    <div class="clearfix"></div>
                    <div class="row" align="center" style="margin-left: 40px;">
                        <section id="projects">
                            <ul id="thumbs" class="grid cs-style-3 portfolio">

                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span5 design" data-id="id-0" data-type="web">
                                    <div class="item">
                                        <figure>
                                            <div><img src="img/dummies/works/educ.png" alt=""></div>
                                            <figcaption style="margin-bottom: 10px">
                                                <h3>Educ</h3>
                                                <p>
                                                    <a data-toggle="modal" data-target="#educ" title="View Details"><i class="icon-book icon-circled icon-bglight icon-2x active"></i></a>
                                                    <a href="{{ route('use_theme').'?theme=educ' }}" title="Use Template"><i class="icon-check icon-circled icon-bglight icon-2x active"></i></a>
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span5 design" data-id="id-1" data-type="icon">
                                    <div class="item">
                                        <figure>
                                            <div><img src="img/dummies/works/2.png" alt=""></div>
                                            <figcaption style="margin-bottom: 10px">
                                                <h3>Fetena</h3>
                                                <p>
                                                    <a data-toggle="modal" data-target="#fetena" title="View Details"><i class="icon-book icon-circled icon-bglight icon-2x active"></i></a>
                                                    <a href="{{ route('use_theme').'?theme=fetena' }}"title="Use Template"><i class="icon-check icon-circled icon-bglight icon-2x active"></i></a>
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span5 photography" data-id="id-2" data-type="graphic">
                                    <div class="item">
                                        <figure>
                                            <div><img src="img/dummies/works/hahu.png" alt=""></div>
                                            <figcaption style="margin-bottom: 10px">
                                                <h3>Hahu Coming Soon...</h3>
                                                <p>
                                                    <a href="#" title="View Details"><i class="icon-book icon-circled icon-bglight icon-2x active"></i></a>
                                                    <a href="#" title="Use Theme"><i class="icon-check icon-circled icon-bglight icon-2x active"></i></a>
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </li>
                                <!-- End Item Project -->

                                <!-- Item Project and Filter Name -->
                                <li class="item-thumbs span5 design" data-id="id-0" data-type="web">
                                    <div class="item">
                                        <figure>
                                            <div><img src="img/dummies/works/yeneta.png" alt=""></div>
                                            <figcaption style="margin-bottom: 10px">
                                                <h3>Yeneta Coming Soon...</h3>
                                                <p>
                                                    <a href="#" title="View Details"><i class="icon-book icon-circled icon-bglight icon-2x active"></i></a>
                                                    <a href="#" title="Use Theme"><i class="icon-check icon-circled icon-bglight icon-2x active"></i></a>
                                                </p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </li>
                                <!-- End Item Project -->
                            </ul>
                        </section>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="educ" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Educ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-primary">
                       Educ is an E-learning Template from Creative E-Learning Framework with Functionalities:
                        <ul class="button-green text-success">
                            <li>Exam Manager</li>
                            <li>Livestreaming</li>
                            <li>Screensharing</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" ><a href="{{ route('use_theme').'?theme=educ' }}" class="btn btn-primary">Use Template</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="fetena" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Fetena</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-primary">
                        Fetena is an E-learning Template from Creative E-Learning Framework with Functionalities:
                        <ul class="button-green text-success">
                            <li>Exam Manager</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" ><a href="{{ route('use_theme').'?theme=educ' }}" class="btn btn-primary">Use Template</a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/toucheffects.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

