<div class="custom-model key-skills-model" id="key-skills-model">
	<div class="crossLayer"><i class="fa fa-close"></i></div>
	<form class="custom-popup-form" name="key-skill-form">
		
		<div class="editHeader">
			<h3 class="font-size-20 font-weight-600 margin-top-none">Key Skills</h3>
			<p class="font-size-14">Tell recruiters what you know or what you are known for e.g. Direct Marketing, Oracle, Java etc. We will send you job recommendations based on these skills. Each skill is separated by a comma. Max limit is 250 character(s) including commas.</p>
		</div>
		<label>Skills</label>
		<div class="key_skill_container">
			 <select class="multipleChosen keyskillsInput" multiple="true">
			 	@foreach($master_skills as $skill)
			        <option value="{{$skill->id}}">{{$skill->name}}</option>
			    @endforeach    
		      </select>
		</div>
		<div class="display-grid margin-top-30 flex-content-right">
			<div class="letter-uppercase margin-right-15 font-weight-600 font-size-16 text-color-second">Cancel</div>
			<input type="button" value="SAVE" class="custom-btn-2 border-none" id="keyskills_submit">
		</div>
	</form>	
</div>