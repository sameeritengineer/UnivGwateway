@extends('web.layouts.index')
@section('title','All Mentors')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12 inner-banner" style="background-image: url('{{asset('web/images/MEntorbanners.png')}}');">
   <h3 class="inner-page-title"><strong>All Mentors</strong></h3>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 select-btn padding-top-50">
  <div class="container">
    <div class="row">
        <div class="display-grid width-100-per text-right search-form width-100-per">
          <div class="search-form width-100-per text-right" name="search-form">
            <select class="select-search-form" id="search_val"> 
              <option value="">Select</option>
              <option value="university">University</option>
              <option value="degree">Degree</option>
              <option value="services">Services</option>
            </select>
            <input type="search" class="search-field" id="search_text_val" style="width: 50%;">
            <input type="submit" class="search-btn" name="search_btn"  onclick="filter_data();">
            <img onclick="filter_data();" style="cursor:pointer" class="search-img" src="{{asset('web/images/Searchicon.png')}}" alt="">
          </div>
        </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 contact padding-top-50">
  <div class="container container-width-100-per">

<div class="panel_body">
              {{ csrf_field() }}
    <div class="row mentors_output">
      @if(count($mentors)>0)
      @foreach($mentors as  $mentor)
          @php 
           $degree = App\Mentor::find($mentor->id)->degree;
          @endphp
      <div class="display-grid display-grid-order-define three_row_section">
        <div class="mentor-img-row width-50-per order-define" >
          <img class="width-100-per mentor-img" src="{{asset('uploads/mentor/'.$mentor->image_ui)}}" alt="" />
        </div>
        <div class="mentors-content-row mentors-content-position width-50-per order-define">
          <h3 class="text-color-theme font-weight-600">{{$mentor->first_name}} {{$mentor->last_name}}</h3>
          <div class="desination display-grid margin-bottom-10">
            <div class="text-color-second margin-right-20 font-weight-600">{{$mentor->job_title}}</div>
            <div class="text-color-second font-weight-600">{{$mentor->major_specialization}},
                        @if(!empty($degree))
                        {{$degree->name}}
                        @else

                        @endif
            </div>
          </div>
          <p class="normal-content">{!!$mentor->detailed_bio!!}</p>
          <a class="text-color-theme font-weight-600" href="#">
            <i class="fa fa-angle-right font-weight-900 font-size-18"></i> Consult Now</a>
        </div>
      </div>
      @endforeach
      @else
        <div class="col-md-12 col-sm-12 col-xs-12 text-center norecords">
          <p>No records found</p>
        </div>
      @endif
     @if(count($mentors)>0)
      <div class="view-all-btn letter-uppercase load_more"><a class="view-all" href="javascript:void(0)" onclick="load_data(1);">Load More</a></div>
    </div>
     @endif
</div>



  </div>
</div>  
<script>
var pagination = 4;
var pageNumber = 2;
var dataDiv = pagination;
var click = 0;
if($('.three_row_section').length<pagination){
   $(".load_more").hide();
}
var token = $('meta[name="csrf-token"]').attr('content');
function filter_data(){
  pageNumber = 1;
  click++;
  load_data(0);
}
function load_data(type){
     $.ajax({
        type : 'GET',
        _token: token,
        url: "{{ route('web.mentors') }}",
        data: {
            "pageNumber": pageNumber,
            "search": $("#search_val").val(),
            "search_text_val": $("#search_text_val").val(),
        },
        success : function(response){
            pageNumber +=1;
            if(click == 0 || type== 1)
              $(".mentors_output").html(response);
            else
              $(".mentors_output").html(jQuery(response).find('.mentors_output'));
            var norecords = $('.norecords').length;
            var dataDiv1 = $('.three_row_section').length;
            $(".load_more").show();
            if(norecords>0 || (dataDiv1 == dataDiv && dataDiv1 != pagination) ){
              $(".load_more").hide();
            }
            var reminder = parseInt(dataDiv1) %  parseInt(pagination) ;
            if( reminder <pagination && reminder!=0){
                $(".load_more").hide();
            }
            dataDiv = dataDiv1;
        },error: function(data){

        },
    }) 
}
</script> 
@endsection