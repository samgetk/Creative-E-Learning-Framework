<head>
<link rel="stylesheet" href="css/navbar-fixed-left.min.css">
<link rel="stylesheet" href="css/bootstrap.min">
<link rel="stylesheet" href="css/custom.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-left nav-pills nav-stacked">

        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="img/dashboard.png" class="user-image img-responsive" width="80%;" height="40%;"/>
                </li>
                <li>
                    <a href="{{ route ('content') }}" class="menu-item-active"><i class="fa fa-asterisk fa-2x"></i> Content Manager</a>
                </li>&nbsp;
                <li>
                    <a href="{{ route ('exam') }}" class="navbar-brand"><i class="fa fa-book fa-2x"></i> Exam Manager</a>
                </li>
                <li>
                    <a href="{{ route ('media') }}" class="navbar-brand"><i class="fa fa-film fa-2x"></i> Media Manager</a>
                </li>
                <li  >
                    <a href="{{ route ('pages') }}" class="navbar-brand"><i class="fa fa-pencil-square-o fa-2x"></i> Page Manager</a>
                </li>
                <li  >
                    <a href="{{ route ('menu') }}" class="navbar-brand"><i class="fa fa-medium fa-2x"></i> Menu Manager</a>
                </li>
                <li  >
                    <a href="{{ route ('resource') }}" class="navbar-brand"><i class="fa fa-folder-open fa-2x"></i> Resource Manager</a>
                </li>
            </ul>
        </div>

</nav>
</body>
