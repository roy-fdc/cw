<!-- start about us !-->
<div id="about"> 

	<div class="container">
		<div class="row">
			<div class="col-md-12 cBusiness">
				<h3>ABOUT US</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div ng-bind-html="detail"></div>
		<h3>MISSION</h3>
		<p class="subtitile">{{ company_mission[0].description }}</p>
		<h3>VISION</h3>
		<p class="subtitile">{{ company_vision[0].description }}</p>
	</div>   

	<div class="container">
		<div class="row">
			<div class="col-md-12 wwa">
				<h3>VALUES</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6" ng-repeat="value in values">
				<img class="pic1Ab" src="<?php echo base_url();?>images/values/{{value.value_image}}">
				<h3>{{value.value_title}}</h3>
				<p>{{value.value_description}}</p>
			</div>
		</div>
	</div>	
	
	<div class="container">
		<div class="row aboutUs">
			<div class="col-md-12 ">
				<h3>What Our Customers Say About Us?</h3>
			</div>
		</div>
	</div>
</div>
<!-- end about us !-->