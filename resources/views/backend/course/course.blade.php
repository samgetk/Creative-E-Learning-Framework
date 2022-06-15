@include('frontend.includes.header')
@include('frontend.includes.sidebar')
<body>

<form class = "form-horizontal" role = "form">

<div class = "form-group">
      <label for = "course" class = "col-sm-2 control-label"></label>
		
      <div class = "form-group">
      <label><input type = "checkbox"> Course Management</label>
      </div>  
   </div>


   <div class = "form-group">
      <label for = "screenshare" class = "col-sm-2 control-label"></label>
		
      <div class = "form-group">
      <label><input type = "checkbox"> Course Assigner</label>
      </div>  
   </div> 

     <div class = "form-group">
      <div class = "col-sm-offset-2 col-sm-10">
         <button type = "submit" class = "btn btn-success">Add to project</button>
      </div>
   </div>  
</div>
</form>



</body>






   


