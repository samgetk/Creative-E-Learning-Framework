<body xmlns="http://www.w3.org/1999/html">
@include('frontend.includes.header')
<div id="accordion" class="col-lg-10 col-md-offset-1 centered mt-5">
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
               My Projects
            </button>
         </h5>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
         <div class="card-body">
             <table>
                 @if(isset($project))
          @foreach($project as $data)
           <tr>
               <td> <a class="mr-5" href="{{ route('open').'?id='.$data->unique_id }}" class="nav-link"> {{ $data->project_name }} </a> </td>
               <td><a class="ml-5" target="_blank" href="http://localhost/Creative%20E-learning%20Framework/storage/app/{{ $data->project_name }}"> Browse</a></td>
               <td><a class="ml-5"  href="{{ route('initiate').'?file='.$data->project_name }}"> Get SQL File</a></td>
           </tr>
          @endforeach
                     @endif
             </table>

         </div>
      </div>
   </div>

      <div class="card">
         <div class="card-header" id="headingOne">
            <h5 class="mb-0">
               <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   Create New Project
               </button>
            </h5>
         </div>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
<form action="/project" class = "form-horizontal" role = "form" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}
   <div class = "form-group">
      <label for = "projectname" class = "col-sm-2 control-label">Project Name</label>
		
      <div class = "col-sm-9">
         <input type = "text" class = "form-control" name = "project_name" placeholder = "Enter Project Name">
      </div>
   </div>
   
   <div class = "form-group">
      <label for = "institutionname" class = "col-sm-2 control-label">Institution Name</label>
		
      <div class = "col-sm-9">
         <input type = "text" class = "form-control" name = "institution_name" placeholder = "Enter Institution Name">
      </div>
   </div>

   <div class = "form-group">
      <label for = "layoutchoice" class = "col-sm-2 control-label">Layout Choice</label>
		
      <div for = "customdesign" class = "col-sm-2 control-label" class = "radio">
      <label> 
         <input type = "radio" name = "layout_choice" id = "custom" value = "custom" checked> Custom Design
      </label>
      </div>
      <div for = "layoutchoice" class = "col-sm-2 control-label" class = "radio">
      <label>
     <input type = "radio" name = "layout_choice" id = "theme" value = "theme"> Theme
      </label>
      </div>
   </div>

   <div class = "form-group">
      <label for = "logo" class = "col-sm-2 control-label">Logo </label>
		
      <div class = "col-sm-9">
         <input type = "file" class = "form-control" name = "logo" placeholder = "Enter Institution Logo">
      </div>
   </div>

   <div class = "form-group ">
      <div class = "col-md-offset-2 col-sm-9">
         <button type = "submit" class = "btn btn-success btn-block" id="success">Create</button>
          <script src="js/jquery.min.js"></script>
      </div>
   </div>

</form>
            </div>
         </div>
      </div>
   <div class="card">
      <div class="card-header" id="headingOne">
         <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#export" aria-expanded="false" aria-controls="export">
               Export Project
            </button>
         </h5>
      </div>
      <div id="export" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
         <div class="card-body">
            <table>
                @if(isset($project))
               @foreach($project as $data)
                  <tr>
                      <td> <a href="{{ route('export').'?id='.$data->project_name }}" class="nav-link"> {{ $data->project_name }} </a> </td></tr>
               @endforeach
                    @endif
            </table>

         </div>
      </div>
   </div>

    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#delete" aria-expanded="false" aria-controls="delete">
                    Remove Project
                </button>
            </h5>
        </div>
        <div id="delete" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <table>
                    @if(isset($project))
                    @foreach($project as $data)
                        <tr><td> <a href="#remove" id="remove" class="nav-link" data-toggle="modal" data-target="#remove-{{ $data->unique_id }}"> {{ $data->project_name }} </a>
                                <!-- Modal -->
                                <div class="modal fade" id="remove-{{ $data->unique_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                                <h3 class="modal-title text-danger" id="exampleModalCenterTitle">Delete Confirmation</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                Are You Sure ? {{ $data->project_name }} Will be Deleted.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <a  href="{{ route('delete').'?id='.$data->unique_id }}"><button type="button" class="btn btn-primary">Yes</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </td> </tr>
                    @endforeach
                    @endif
                </table>

            </div>
        </div>
    </div>
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <p class="alert alert-dismissable alert-danger">{{ $error }}</p>
        @endforeach
    @endif
</div>
</body>

