@extends('admin.layouts.index')
@section('title','Services')
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
                    <h3 class="content-header-title mb-0">Add Services</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Services</a>
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

<form class="form form-horizontal" method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="fa fa-tag"></i> Service Details </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                     <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput5">Category:</label>
                                                            <div class="col-md-8">
                                                                <select id="projectinput5" name="category_id" class="form-control">
                                                                <option value="">Select Category</option>
                                                                @foreach($master_category as $category)
                                                                <option {{ (collect(old('university_id'))->contains($category->id)) ? 'selected':'' }} value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                             </select>
                                                            </div>
                                                        </div>
                                                      </div>  
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Service Name:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ old('name') }}" class="form-control border-primary" type="text" placeholder="Sevice Name:" id="userinput5" name="name" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                     <div class="form-group row">
                                                            <label class="col-md-4 label-control" for="userinput5">Service:</label>
                                                            <div class="col-md-8">
                                                                <select id="projectinput5" name="parent_id" class="form-control">
                                                                <option value="">Select Category</option>
                                                                @foreach($services as $category)
                                                                <option {{ (collect(old('university_id'))->contains($category->id)) ? 'selected':'' }} value="{{$category->id}}">{{$category->service_name}}</option>
                                                                @endforeach
                                                             </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Service Type:</label>
                                                            <div class="col-md-9">
                                                                 <select id="projectinput5" name="service_type" class="form-control">
                                                               <option value="Main" selected="">Main</option>
                                                               <option value="Addon">Add-on</option>
                                                             </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Sort:</label>
                                                            <div class="col-md-9">
                                                                 <input value="{{ old('name') }}" class="form-control border-primary" type="text" placeholder="Sort:" id="userinput5" name="sort" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <h4 class="form-section"><i class="fa fa-tag"></i> Description </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <textarea id="userinput8" rows="6" class="form-control border-primary" name="description" placeholder="Enter Description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <h4 class="form-section"><i class="fa fa-tag"></i> Deliverables </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <textarea id="userinput8" rows="6" class="form-control border-primary" name="deliverables" placeholder="Enter Deliverables"></textarea>
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
                                                                    <input type="file" name="image" id="file" onchange="loadFileImage(event)">
                                                                    <span class="file-custom"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <img id="Imageoutput"/>
                                                        </div>
                                                    </div>
                                                </div>


                                                <h4 class="form-section"><i class="fa fa-image"></i></i>Price</h4>
        <section id="form-control-repeater">

                   <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="userinput8"> GST Rate</label>
                            <div class="col-md-9">
                               <input value="{{ old('price_text') }}" class="form-control border-primary" type="text" placeholder="GST Rate in %" id="userinput5" name="gst_rate">
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">


                                            <div class="form-group col-12 mb-2 test-repeater">
                                                <div data-repeater-list="price_text_list">
                                                    <div data-repeater-item>
                                                        <div class="row mb-1">
                                                            <div class="col-6 col-md-10">
                                                              <div class="row">
                                        
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Text:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ old('price_text') }}" class="form-control border-primary" type="text" placeholder="Text:" id="userinput5" name="price_text">
                                                            </div>
                                                        </div>
                                                     <div class="form-group row">
                                                         <label class="col-md-3 label-control" for="userinput5">Quantity:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ old('quantity') }}" class="price_amount form-control border-primary" type="text" placeholder="Quantity:" id="userinput5" name="quantity">
                                                            </div>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="userinput5">Price:</label>
                                                            <div class="col-md-9">
                                                                <input value="{{ old('price_amount') }}" class="price_amount form-control border-primary" type="text" placeholder="Amount:" id="userinput5" name="price_amount">
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                                            </div>
                                                            <div class="col-2 col-xl-1">
                                                                <button type="button" data-repeater-delete class="btn btn-icon btn-danger mr-1"><i class="feather icon-x"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" data-repeater-create class="btn btn-primary">
                                                    <i class="icon-plus4"></i> Add New 
                                                </button>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>

   
                    </div>
                </section>

                                                
                             

                                                </div>    
                               

                                            
                                            

                                            <div class="form-actions right">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
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

// var imageResizeInput;
// $(function () {
//     $(document).on("click",".resize_image",function(){
//         if($(this).parents('.image_input').find('.file_input')[0].files[0]==undefined){
//             $("#resize-original-image").attr("src",$(this).parent().find('.image_preview').attr('src'));
//         }
//         else{
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 $("#resize-original-image").attr("src",e.target.result);
//             };
//             reader.readAsDataURL($(this).parents('.image_input').find('.file_input')[0].files[0]);
//         }

//         imageResizeInput = $(this).parent().find('.resize_input');
//         var w=$(this).data('w');
//         var h=$(this).data('h');
//         var ratio = w/h;
//         var maxWidth = 200;
//         var maxHeight = maxWidth/ratio;
//         $("#resize-original-image").rcrop('destroy');
//         $(this).delay(500).queue(function() {
//             $("#resize-original-image").rcrop({
//                 full : true,
//                 minSize : [maxWidth, maxHeight],
//                 preserveAspectRatio : true,
//                 inputs : true,
//                 inputsPrefix : '',
//             });
//             $(this).dequeue();
//         });
//         $('#resize-modal').modal('show');
//     });
//     $(document).on("click","#resize-image-apply",function(){
//         var ImageURL = $("#resize-original-image").rcrop('getDataURL');

//         imageResizeInput.val(ImageURL);
//         imageResizeInput.parent().find('.image_preview').attr('src', ImageURL);
//         // $("#resize-original-image").rcrop('destroy');
//     });
// });


</script>


@endsection