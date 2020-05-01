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
      <div class="view-all-btn letter-uppercase load_more"><a class="view-all" href="javascript:void(0)" onclick="load_data(1);">Load More</a></div>
    </div>