
            <div class="row mentors_output">
            @if(count($mentors)>0)
            @foreach($mentors as $mentor)
             @php 
             $degree = App\Mentor::find($mentor->id)->degree;
            @endphp
            <div class="row margin-bottom-30 three_row_section">
                <div class="col-md-12 col-sm-12 col-xs-12 display-grid flex-item-end">
                    <div class="col-xs-12 col-sm-3 col-md-3 box-shadow-gray text-center mob-margin-bottom-15">
                        <img src="{{asset('uploads/mentor/'.$mentor->image)}}" alt="" class="img-responsive center-block">
                        <h3 class="title-color text-color-theme letter-uppercase">{{$mentor->first_name}} {{$mentor->last_name}}</h3>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 padding-left-30 blog-content-section">
                        <div class="display-grid space-between flex-item-end margin-bottom-30">
                            <div class="">
                                <h3 class="text-color-theme font-size-22 margin-top-none">{{$mentor->job_title}}</h3>
                                <h3 class="text-color-second font-size-22 margin-top-none">{{$mentor->major_specialization}},{{$degree->name}}</h3> 
                            </div>
                            <div class="request-call-btn">
                                <a class="custom-btn mob-padding-5-10" href="{{ route('student-mentor-single', $mentor->id) }}">
                                    <img style="width: 25px;" class="margin-right-5" src="images/diagnosticcall_mentordashicon.png" alt="">
                                    <span class="letter-uppercase font-weight-600">Request a diagnostic call</span>
                                </a>
                            </div>
                        </div>
                        <p> {!!$mentor->detailed_bio!!} </p>
                    </div>
                </div>
            </div>


            @endforeach
                @else
                <div class="col-md-12 col-sm-12 col-xs-12 text-center norecords">
                    <p>No records found</p>
                </div>
                @endif
            </div>