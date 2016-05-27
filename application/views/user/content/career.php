<div id="career">
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
					<img class="img-responsive picsGall imgCenter" src="<?php echo base_url();?>image/careers/{{career.career_image}}"/>
					<h3><a href="#">{{career.career_title}}</a></h3>
					
					<p class="benefit_description">{{career.career_description}}</a></p>
					<hr class="hrNews">
					</div>
					
				</div>
			</div>	
		</div>
    </div>