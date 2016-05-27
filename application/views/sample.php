
    <!--about start-->    
    
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
    </div>

    <div class="container">
			<div class="row">
				<div class="col-md-12 cBusiness">
					<h3>VALUES</h3>
				</div>
			</div>

		</div>

    <div style="position: relative;">
			<div class="container">
				<div class="row about">
					<div class="col-md-6" ng-repeat="value in values">
						<div class="about2">
						<img class="pic1Ab" src="<?php echo base_url();?>image/values/{{value.value_image}}">
							<h3>{{value.value_title}}</h3>
							<p>{{value.value_description}}</p>
						</div>
					</div>
				</div>
			</div>
		
		</div>
    
    	<div class="line2">
			<div class="container">
				<div class="row Fresh">
					<div class="col-md-12">
						<span name="about" ></span>
						<h3>Who We Are? Meet Our Team!</h3>
						<h4>We listen, we discuss, we advise and develop. We love to learn and use the latest technologies.</h4>
					</div>
				</div>

			</div>
		</div>

		<div class="container">
			<div class="row team">
				<div class="col-md-4" ng-repeat="team in teams">
						<img class="img-responsive" src="<?php echo base_url();?>image/teams/{{team.team_image}}">
						<h4>{{team.team_name}}</h4>
						<h5>{{team.team_position}}</h5>
						<p>{{team.team_description}}</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 hr1">
					<hr/>
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
		
		<div style="position: relative;">
		
			<div class="container">
				<div class="row about">
					<div class="col-md-6">
						<div class="about1">
						<img class="pic1Ab" src="images/picAbout/aboutP1.png">
							<h3>Anna Smith, Company Inc.</h3>
							<p>Nulla consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor feugiat fermentum quisque eget pharetra, felis et venenatis. aliquam, nulla nisi lobortis elit ac.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about2">
						<img class="pic2Ab" src="images/picAbout/aboutP2.png">
							<h3>John Doe, Company Inc.</h3>
							<p>Consectetur ornare nibh, a auctor mauris scelerisque eu proin nec urna quis justo, adipiscing auctor, ut auctor feugiat fermentum nec quisque eget pharetra, felis et venenatis aliquam, nulla nisi lobortis elit, ac luctus.</p>
						</div>
					</div>
				</div>
			</div>
		
			<div class="horL"></div>
		
			<div class="container">
				<div class="row about">
					<div class="col-md-6">
						<div class="about1">
						<img class="pic1Ab" src="images/picAbout/aboutP3.png">
							<h3>Tom Sawyer, Company Inc.</h3>
							<p>A auctor mauris scelerisque eu proin nec urna quis justo adipiscing auctor ut auctor feugiat fermentum quisque eget pharetra, felis et venenatis aliquam, nulla nisi lobortis elit, acnterdum ante feugiat vitae.</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about2">
						<img class="pic2Ab" src="images/picAbout/aboutP4.png">
							<h3>Sarah White, Company Inc.</h3>
							<p>Ornare nibh a auctor, mauris scelerisque eu proin nec urna nec a quis justo adipiscing auctor ut auctor feugiat fermentum quisque eget pharetra felis et venenatis aliquam, nulla nisi lobortis elit, ac eleifend nisl ante nec lorem. </p>
						</div>
					</div>
				</div>
			</div>
		
		</div>
    </div>
    <!--project start-->    
    <div id="gallery">    	
		<div class="line3">
			<div class="container">
				<div id="project1" ></div>
				<div class="row Ama">
					<div class="col-md-12">
					<span name="projects" id="projectss"></span>
					<h3>GALLERIES</h3>
					<p>Right here we've got something you gonna love</p>
					</div>
				</div>
			</div>
		</div>          
    
    
       <div class="container">
		
		<div class="row">
			<!-- filter_block -->
				<div id="options" class="col-md-12" style="text-align: center;">	
					<ul id="filter" class="option-set" data-option-key="filter">
						<li><a class="selected" href="#filter" data-option-value="*" class="current">All Works</a></li>
						<li><a href="#filter" data-option-value=".polygraphy">Polygraphy</a></li>
						<li><a href="#filter" data-option-value=".branding">Branding</a></li>
						<li><a href="#filter" data-option-value=".web">Web UI</a></li>
						<li><a href="#filter" data-option-value=".text_styles">Text Styles</a></li>
					</ul>
				</div><!-- //filter_block -->
		
		
		
                             
			<div class="portfolio_block columns3   pretty" data-animated="fadeIn" ng-show="albumContainer">	
                            <div class="element col-sm-4   gall branding" ng-repeat="album in albums">
                                <a class="plS" ng-click="viewByAlbum(album.album_id)">
                                    <img class="img-responsive picsGall" src="image/galleries/{{ album.images[0].image_name}}" alt="pic1 Gallery" />
                                </a>
                                <div class="view project_descr ">
                                    <h3><a href="#">{{ album.album_name }}</a></h3><br><br>
                                </div>
                            </div>
			</div>
                              
                        <!-- this is album images -->
                        <div ng-show="IsVisible">
                            <button class="btn btn-primary" ng-click="closeImages()">Close album</button>
                            <h3>{{ albumName }}</h3>
                            <div class="center-block">
                                <ng-gallery images="ctrl.images" thumbs-num="10" ></ng-gallery>
                            </div>
                        </div>
			
			
				
					<div class="col-md-12 cBtn  lb" style="text-align: center;">
						<ul class="load_more_cont ">
							<li class="dowbload btn_load_more">
								<a href="javascript:void(0);" >
									<i class="fa fa-arrow-down"></i>Load More Projects
								</a>
							</li>
							<li class="buy">
								<a href="#">
									<i class="fa fa-shopping-cart"></i>Buy on Themeforest
								</a>
							</li>
						</ul>
					</div>
			
		</div>
			
			<script type="text/javascript">
//				jQuery(window).load(function(){
//					items_set = [
//					
//						{category : 'branding', lika_count : '77', view_count : '234', src : 'images/prettyPhotoImages/pic9.jpg', title : 'Foil Mini Badges', content : '' },
//						
//						{category : 'polygraphy', lika_count : '45', view_count : '100', src : 'images/prettyPhotoImages/pic7.jpg', title : 'Darko – Business Card Mock Up', content : '' },
//						
//						{category : 'text_styles', lika_count : '22', view_count : '140', src : 'images/prettyPhotoImages/pic8.jpg', title : 'Woody Poster Text Effect', content : '' }
//						
//
//					];
//					jQuery('.portfolio_block').portfolio_addon({
//						type : 1, // 2-4 columns simple portfolio
//						load_count : 3,
//						
//						items : items_set
//					});
//					$('#container').isotope({
//					  animationOptions: {
//						 duration: 900,
//						 queue: false
//					   }
//					});
//				});
			</script>
		</div>
    </div>    
        
    
    

		
		