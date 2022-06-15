@extends('frontend.includes.sidebar')
@include('frontend.includes.header')
<div class="">

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
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Create Contents
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div id="accordion" class="col-lg-9 col-md-offset-1">
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#exam" aria-expanded="false" aria-controls="collapseOne">
                                    Exam and Report
                                </button>
                            </h5>
                        </div>

                        <div id="exam" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body" class = "col-sm-9">
                                Create Exam and Report manager pages.<br>
                                <a href="{{ route('exam') }}"><button class="btn btn-success">Creater</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#media" aria-expanded="false" aria-controls="collapseOne">
                                    Media
                                </button>
                            </h5>
                        </div>

                        <div id="media" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Create pages with media capabilities.<br>
                                <a href="{{ route('media') }}"><button class="btn btn-success"> Create</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="collapseTwo">
                                    Menu
                                </button>
                            </h5>
                        </div>
                        <div id="menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Add Menus.<br>
                                <a href="{{ route('menu') }}"><button class="btn btn-success"> Create</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="collapseThree">
                                    Pages
                                </button>
                            </h5>
                        </div>
                        <div id="pages" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Create Pages.<br>
                                <a href="{{ route('pages') }}"><button class="btn btn-success"> Create</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#resource" aria-expanded="false" aria-controls="collapseOne">
                                    Resources
                                </button>
                            </h5>
                        </div>

                        <div id="resource" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body" class = "col-sm-9">
                                Create a resource pages.<br>
                                <a href="{{ route('resource') }}"><button class="btn btn-success">Create</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    View created Contents
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                @if(isset($content))
                    @foreach($content as $name)
                     <li>{{$name->name}}</li>
                    @endforeach
                    @endif
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Remove Created Contents
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <table>
                    @if(isset($content))
                        @foreach($content as $name)
                            <tr>
                                <td>
                                    <a href="#remove" id="remove" class="nav-link" data-toggle="modal" data-target="#remove-{{ $name->name }}"> {{ $name->name }} </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="remove-{{ $name->name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-danger">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You Sure? {{ $name->name }} will be removed.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a  href="{{ route('remove_Content').'?id='.$name->name }}"><button type="button" class="btn btn-primary">Yes</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>

            </div>
        </div>
    </div>
</div>
</div>
  

