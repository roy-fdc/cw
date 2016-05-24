<script type="text/javascript" src="<?php echo base_url();?>js/api/displayApp.js"></script>
      
      <section>
         <!-- CAROUSEL -->  	
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme">
               <div class="item">
                  <img src="<?php echo base_url();?>image/user/first.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Theme based on Responsee framework</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>With amazing responsive carousel
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="<?php echo base_url();?>image/user/second.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Build new layout in 10 minutes!</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>Lightweight, more intuitive and useful responsive CSS framework
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="<?php echo base_url();?>image/user/third.jpg" alt="">      
                  <div class="carousel-text">
                     <div class="line">
                        <div class="s-12 l-9">
                           <h2>Design theme is under the MIT license</h2>
                        </div>
                        <div class="s-12 l-9">
                           <p>Best theme based on Responsee framework
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- FIRST BLOCK --> 	
         <div id="first-block">
            <div class="line">
               <h2>Some awesome blocks</h2>
               <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
               </p>
               <div class="margin">
                  <div class="s-12 m-6 l-4 margin-bottom" ng-repeat="data in intro">
                     <i class="icon-paperplane_ico icon2x"></i>
                     <h3>{{data.name}}</h3>
                     <p>{{data.description}}
                     </p>
                  </div>
                  
               </div>
            </div>
         </div>
         <!-- SECOND BLOCK --> 	
         <div id="second-block">
            <div class="line">
               <div class="margin-bottom">
                  <div class="margin">
                     <article class="s-12 l-8 center">
                        <h1>Amazing title</h1>
                        <p class="margin-bottom">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                        </p>
                        <a class="button s-12 l-4 center" href="product.html">Read more</a>  			
                     </article>
                  </div>
               </div>
            </div>
         </div>
         <!-- GALLERY --> 	
         <div id="third-block">
            <div class="line">
               <h2>Responsive gallery</h2>
               <p class="subtitile">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
               </p>
               <div class="margin">
                  <div class="s-12 m-6 l-3" ng-repeat="gallery in galleries">
                  {{gallery.image_name}}
                     <img src="<?php echo base_url();?>image/galleries/{{gallery.image_name}}" alt="alternative text">      
                     <p class="subtitile">{{gallery.album_name}}</p>
                  </div>
                  
               </div>
            </div>
         </div>
         <div id="fourth-block">
            <div class="line">
               <div id="owl-demo2" class="owl-carousel owl-theme">
                  <div class="item">
                     <h2>Amazing responsive template</h2>
                     <p class="s-12 m-12 l-8 center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
                  <div class="item">
                     <h2>Responsive components</h2>
                     <p class="s-12 m-12 l-8 center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
                  <div class="item">
                     <h2>Retina ready</h2>
                     <p class="s-12 m-12 l-8 center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit  lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>