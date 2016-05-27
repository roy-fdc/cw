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
			<div class="portfolio_block columns3   pretty" data-animated="fadeIn" ng-show="albumContainer">	
	            <div class="element col-sm-4   gall branding" ng-repeat="album in albums">
	                <a class="plS" ng-click="viewByAlbum(album.album_id)">
	                    <img class="img-responsive picsGall" src="images/galleries/{{ album.images[0].image_name}}" alt="pic1 Gallery" />
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

		</div>
	</div>	
		
</div>  
<!--end  project--> 