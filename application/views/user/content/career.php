<!-- start career!-->
<div  id="career">
	<div class="line4">		
		<div class="container">
			<div class="row Ama">
				<div class="col-md-12">
				<h3>Why Work Here ?!</h3>
				<p>We are dependable, innovative, adaptable, and easy to do business with.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container" >
		<div class="row news circleImg">
			<div class="col-md-4  text-left" ng-repeat="career in careers">
				<img class="img-responsive picsGall imgCenter" src="<?php echo base_url();?>images/careers/{{career.career_image}}"/>
				<h3>{{career.career_title}}</h3>
				
				<p class="benefit_description">{{career.career_description}}</a></p>
			</div>
		</div>

		<div id="careerdetails">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
		</div>
	</div>
</div>
<!-- end career!-->