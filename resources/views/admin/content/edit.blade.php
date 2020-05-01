@extends('admin.layouts.index')
@section('title','Update About Us')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit About Us</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">About Us</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
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

<form class="form form-horizontal" method="POST" action="{{ route('about-us.update',$about->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
<div class="form-body">
<h4 class="form-section"><i class="fa fa-tag"></i> About Us Details </h4>

<div class="row"> 
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-md-2 label-control" for="userinput5">Category Name:</label>
            <div class="col-md-10">
                <input value="{{ $about->name }}" class="form-control border-primary" type="text" placeholder="Name:" id="userinput5" name="name" required="">
            </div>
        </div>
    </div>
</div>

                                        

<h4 class="form-section"><i class="fa fa-tag"></i> Description </h4>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-12">
                <textarea required="" maxlength="260" id="userinput8" rows="6" class=" form-control border-primary editor" name="description" placeholder="Enter Description">{{ $about->description }}</textarea>
            </div>
        </div>
    </div>
</div>

        </div>    

    <div class="form-actions right">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-check-square-o"></i> Update
        </button>
    </div>
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