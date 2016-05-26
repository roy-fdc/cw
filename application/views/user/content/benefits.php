<div id="benefits">
    	<div class="line4">		
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>COMPANY BENEFITS</h3>
					<p>Forty Degrees Celsius Inc.(FDCI) provides benefits to employees in addition to their salaries to meet their diverse needs. Our comprehensive benefits include: free meal allowances, monthly company dinner, medical insurance coverage and the company team building.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container" >
				<div class="row news">
					<div class="col-md-6  text-left" ng-repeat="benefit in benefits">
					<img class="img-responsive picsGall imgCenter" src="<?php echo base_url();?>image/benefits/{{benefit.benefit_image}}"/>
					<h3><a href="#">{{benefit.benefit_title}}</a></h3>
					
					<p class="benefit_description">{{benefit.benefit_description}}</a></p>
					<hr class="hrNews">
					</div>
					
				</div>
			</div>	
		</div>
    </div>