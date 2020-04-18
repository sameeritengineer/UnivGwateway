<div class="custom-model Desired-Career-Profile" id="Desired-Career-Profile">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="Desired-Career-Profile">
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Educational Aspirations</h3>
		</div>
		<div class="notice-period-section margin-bottom-30">
			<label class="color-gray font-size-15"> (A.) What Degree Program do you want to apply for ?</label>
			<select id="degree_program_data" name="degree_program_data" class="select_field_work form-control notice_period">
				<option value="">Select Degree Program</option>
			@foreach($master_degree as $degree)
			<?php
            if(!empty($aspiration)){
                 $degree_value = App\MasterDegree::where('id',$aspiration->degree_id)->first();
            ?>
				<option {{$aspiration->degree_id==$degree->id?'selected':''}} value="{{$degree->id}}">{{$degree->name}}</option>
			<?php }else{  ?>
              <option value="{{$degree->id}}">{{$degree->name}}</option>
			 <?php  } ?>	
			@endforeach
			</select>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-15"> (B.) What is your preferred list of countries for study ?</label>
			<div class="display-grid space-between">
				<?php 
				if(!empty($aspiration)){ 
                    $countries = $aspiration->countries;
                    $explode_country = explode(',',$countries);
                    foreach($array_countries as $country){
                      if(in_array($country, $explode_country)){ ?>
                    <div class="width-50-per">
					 <input type="checkbox" checked="" class="margin-right-15 study_country_uk" value="{{$country}}" name="study_country_us[]"><span>{{$country}}</span>
				    </div><?php }else{ ?>
                    <div class="width-50-per">
					<input type="checkbox" class="margin-right-15 study_country_uk" value="{{$country}}" name="study_country_us[]"><span>{{$country}}</span>
				    </div><?php } } }else{
                	foreach($array_countries as $country){
				    ?>
					<div class="width-50-per">
						<input type="checkbox" class="margin-right-15 study_country_uk" value="{{$country}}" name="study_country_us[]"><span>{{$country}}</span>
					</div>
			       <?php } } ?>
			</div>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-13"> (C.) What programs are courses are you considering presently</label>
			<?php
            if(!empty($aspiration)){ ?>
			<input type="text" id="considering_program" value="{{$aspiration->program_courses}}" placeholder="" class="input-key-skills form-control" name="considering_program">
		    <?php }else{ ?>
            <input type="text" id="considering_program" placeholder="" class="input-key-skills form-control" name="considering_program">
		    <?php  } ?>
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-15"> (D.) Where do you want UnivGateway mentors to help?</label>
	        <?php
             if(!empty($aspiration)){ 
		         $i =0;
	             $mentors_to_help         = $aspiration->mentors_to_help;
	             $explode_mentors_to_help = explode(',',$mentors_to_help);
	             foreach($array_mentor_help as $help){
	             	if(in_array($i, $explode_mentors_to_help)){
	             		 ?>
                <div class="display-flex">
				<input type="checkbox" checked="" class="margin-right-15 mentor_help" value= "{{$i}}" name="mentor_help[]">
				<p class="font-size-16 color-gray">{{$help}}</p>
			    </div>
	            <?php 		 
	             	}else{ ?>
                <div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value= "{{$i}}" name="mentor_help[]">
				<p class="font-size-16 color-gray">{{$help}}</p>
			    </div>
	            <?php } $i++; } }else{
	             $i =0; 
                 foreach($array_mentor_help as $help){
	            ?>
                <div class="display-flex">
				<input type="checkbox" class="margin-right-15 mentor_help" value= "{{$i}}" name="mentor_help[]">
				<p class="font-size-16 color-gray">{{$help}}</p>
			    </div>
	            <?php $i++;	} } ?>
			
		</div>
		<div class="width-100-per margin-bottom-30">
			<label class="color-gray font-size-15"> (E.) What are key questions/concerns/worries about your education plans?</label>
            <?php
            if(!empty($aspiration)){ 
              $i =0;
              foreach($education_plans as $plan){ ?>
              <div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="{{$i}}" name="education_plans" {{$aspiration->education_plans==$i?'checked':''}}>
				<p class="font-size-16 color-gray">{{$plan}}</p>
			  </div>
              <?php $i++; } }else{ 
              $i =0;	
              foreach($education_plans as $plan){
               ?>
              <div class="display-flex">
				<input type="radio" class="margin-right-15 education_plans" value="{{$i}}" name="education_plans">
				<p class="font-size-16 color-gray">{{$plan}}</p>
			  </div>
              <?php $i++; } } ?> 	
		
			<div class="width-100-per margin-bottom-30">
				<input type="text" class="form-control education_plans_val" name="education_plans_val">
			</div>
		</div>

	  <div class="notice-period-section margin-bottom-30">
		<label class="color-gray font-size-15"> (G.) Which semester & year do you intend to go for higher education</label>
		<select id="higher_education" name="degree_program" class="select_field_work form-control notice_period">
		<option value="">Select higher education</option> 
        <?php  
         if(!empty($aspiration)){ 
            $i =0;
            foreach($higher_education as $edu){ ?>
            <option {{$aspiration->higher_education==$i?'selected':''}} value="{{$i}}">{{$edu}}</option>
            <?php $i++; } 
             }else{ $i =0;  foreach($higher_education as $edu){ ?>
             <option value="{{$i}}">{{$edu}}</option>
          	<?php $i++; } } ?>
        </select>  	
		</div>









		
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="aspiration_submit">
		</div>
	</form>
</div>