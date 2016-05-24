<script type="text/javascript" src="<?php echo base_url();?>js/api/benefit.js"></script>
      <section>
         <div id="head">
            <div class="line">
               <h1><?php echo $page_header_title;?></h1>
            </div>
         </div>
         <div id="content">
            <div class="line">
               <div class="margin">
                  <div class="s-12 m-6 l-6" ng-repeat="benefit in benefits">

                     <div class="margin-bottom">
                        <img style="margin: 0 auto" src="<?php echo base_url();?>image/benefits/{{benefit.benefit_image}}" class="image-circle"/>
                        <h3 style="font-weight: bold">{{benefit.benefit_title}}</h3>
                        <p style="min-height: 100px">{{benefit.benefit_description}}</p>
                     </div>

                  </div>
                  
               </div>
            </div>
         </div>
         
      </section>
    