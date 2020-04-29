@extends('admin.layouts.index')
@section('title','Update Category')
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
                    <h3 class="content-header-title mb-0">Edit Category</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Category</a>
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

<form class="form form-horizontal" method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
<div class="form-body">
<h4 class="form-section"><i class="fa fa-tag"></i> Category Details </h4>

<div class="row"> 
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-md-2 label-control" for="userinput5">Category Name:</label>
            <div class="col-md-10">
                <input value="{{ $category->name }}" class="form-control border-primary" type="text" placeholder="Category Name:" id="userinput5" name="name" required="">
            </div>
        </div>
    </div>
</div>

                                            
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-md-2 label-control" for="userinput5">Sort:</label>
            <div class="col-md-10">
                 <input value="{{ $category->sort }}"  class="form-control border-primary" type="text" placeholder="Sort:" id="userinput5" name="sort" required="">
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 label-control" for="userinput2">Status</label>
    <div class="col-md-10">
    <div class="d-inline-block custom-control custom-radio mr-1">
       <input type="radio" class="custom-control-input" name="status" id="radio2" value="1"  {{$category->status=='1'?'checked':''}}>
       <label class="custom-control-label" for="radio2">Enable</label>
    </div>    
    <div class="d-inline-block custom-control custom-radio mr-1">
       <input type="radio" class="custom-control-input" name="status" id="radio1" value="0"  {{$category->status=='0'?'checked':''}}>
       <label class="custom-control-label" for="radio1">Disable</label>
    </div>
    </div>
</div>


<h4 class="form-section"><i class="fa fa-tag"></i> Description </h4>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-md-12">
                <textarea required="" maxlength="260" id="userinput8" rows="6" class=" form-control border-primary" name="description" placeholder="Enter Description">{{ $category->desciption }}</textarea>
            </div>
        </div>
    </div>
</div>


     <h4 class="form-section"><i class="fa fa-image"></i></i> Image </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput8"> Image</label>
                <div class="col-md-9">
                    <label id="projectinput8" class="file center-block">
                        <input type="file" name="image" accept="image/*"  id="file" onchange="loadFileImage(event)">
                        <span class="file-custom"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <img src="{{asset('uploads/category/'.$category->image)}}" id="Imageoutput"/>
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

    <script>
$(document).ready(function(){
 $('.test-repeater').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function(remove) {
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).slideUp(remove);
            }
        }
    });
 $('.applied-university-repeater').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function(remove) {
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).slideUp(remove);
            }
        }
    });    
 $(document).on("change", ".select_test_data" , function() { 
     var max_score = $('option:selected', this).attr('data-max');
     $(this).parent().parent().parent().next().find('.price_amount').val(max_score);
   });
   $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

    $(document).on('focus', '.test_datepicker',function(){
            $(this).datepicker({
                uiLibrary: 'bootstrap4'
            })
        });
    $(document).on('focus', '.university_datepicker',function(){
            $(this).datepicker({
                uiLibrary: 'bootstrap4'
            })
        });

  
    $(".multipleChosen").chosen({
      placeholder_text_multiple: "Enter your area of Expertise/Specialization" //placeholder
    }); //JSON.parse('" . json_encode($data) . "')
  });
var loadFileImage = function(event) {
    var output = document.getElementById('Imageoutput');
    output.src = URL.createObjectURL(event.target.files[0]);
};


</script>


@endsection