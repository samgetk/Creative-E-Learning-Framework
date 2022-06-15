@include('frontend.includes.header')
@include('frontend.includes.sidebar')

<body>
<div id="accordion" class="col-lg-9 col-md-offset-1 mt-5">
   <div class="card">
      <div class="card-header" id="headingOne">
         <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               Exam and Report
            </button>
         </h5>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" aria-expanded="true">
         <div class="card-body">
            Create pages for instructors and students with administrator.<br>
            <a href="{{ route('add_exam')}}"><button class="btn btn-success">Create</button></a>
         </div>
      </div>
   </div>
   </div>
   <body>














   


