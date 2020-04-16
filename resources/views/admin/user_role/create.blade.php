@extends('admin.layouts.index')
@section('title','Category')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Add User Role</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">role</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-primary dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings icon-left"></i> Settings</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Bootstrap Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons Extended</a></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-colored-controls">Add User Role</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif   
@if (\Session::has('success'))
			    <div class="alert alert-success">
                 <strong>Success!</strong> {!! \Session::get('success') !!}
                </div>
@endif
@if (\Session::has('error'))
               	<div class="alert alert-danger">
                  <strong>Error!</strong> {!! \Session::get('error') !!}
                </div>
@endif
                                        <form class="form form-horizontal" action="{{ route('user_role.store') }}" method="POST">
                                        	@csrf
                                            <div class="form-body">

                                                <h4 class="form-section"><i class="fa fa-info-circle" aria-hidden="true"></i> User Role Info</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput1">Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="userinput1" class="form-control border-primary" placeholder="Enter role" required="" name="name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput2">Status</label>
                                                            <div class="col-md-9">
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                               <input type="radio" class="custom-control-input" name="status" id="radio2" checked="" value="1">
                                                               <label class="custom-control-label" for="radio2">Enable</label>
                                                            </div>    
                                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                               <input type="radio" class="custom-control-input" name="status" id="radio1" value="0">
                                                               <label class="custom-control-label" for="radio1">Disable</label>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions right">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
   
@endsection