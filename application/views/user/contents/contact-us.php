
      <section ng-app="validationApp" ng-controller="mainController">
         <div id="head">
            <div class="line">
               <h1><?php echo $page_header_title;?></h1>
            </div>
         </div>
         <div id="content" class="left-align contact-page">
            <div class="line">
               <div class="margin">
                  <div class="s-12 l-6">
                     <h2>Vision Design - graphic zoo</h2>
                     <address>
                        <p><i class="icon-home icon"></i> Unit1503-1503,15th Floor, Park Centrale, Asia Town I.T Park, Salinas Drive Lahug Cebu City, 6000 Philippines</p>
                        <p><i class="icon-globe_black icon"></i> Slovakia - Europe</p>
                        <p><i class="icon-mail icon"></i> fdcincph@gmail.com</p>
                     </address>
                     <br />
                     <h2>Social</h2>
                     <p><i class="icon-facebook icon"></i> <a href="https://www.facebook.com/pages/Vision-Design-graphic-ZOO/154664684553091">Vision Design - graphic zoo</a></p>
                     <p><i class="icon-facebook icon"></i> <a href="https://www.facebook.com/myresponsee">Responsee</a></p>
                     <p class="margin-bottom"><i class="icon-twitter icon"></i> <a href="https://twitter.com/MyResponsee">Responsee</a></p>
                  </div>
                    <div class="s-12 l-6">
                        <h2>Contact Form</h2>
                        <form name="userForm" ng-submit="submitForm()" novalidate class="customform">

                            <!-- NAME -->
                            <div class="s-12 l-7" ng-class="{ 'has-error' : userForm.name.$invalid && !userForm.name.$pristine}">
                                <input type="text" name="name" ng-model="user.name" required placeholder="* Your name (required)" title="Your name" >
                                <p ng-show="userForm.name.$invalid && !userForm.name.$pristine && !userForm.name.$touch" class="help-block error-text">You name is required.</p>
                            </div>
                                <!-- EMAIL -->
                            <div class="s-12 l-7" ng-class="{ 'has-error' : userForm.email.$invalid && !userForm.email.$pristine }">
                                <input type="email" name="email" ng-model="user.email" placeholder="* Your Email (required)" title="Your email" required>
                                <p ng-show="userForm.email.$invalid && !userForm.email.$pristine" class="help-block error-text">Enter a valid email.</p>
                            </div>                      

                            
                             <!-- NAME -->
                            <div class="s-12 l-7" ng-class="{ 'has-error' : userForm.number.$invalid && !userForm.number.$pristine }">
                                <input type="text" name="number" ng-model="user.number" required placeholder="* Your Phone Number (required)" title="Your phone number">
                                <p ng-show="userForm.number.$invalid && !userForm.number.$pristine" class="help-block error-text">Phone number is required.</p>
                            </div>
                             
                            <div class="s-12 l-7">
                                <select>
                                    <option value="1">Inquiry</option>
                                    <option value="2">Web Translator</option>
                                    <option value="3">Web Programmer</option>
                                    <option value="4">Web Application Tester</option>
                                </select>
                            </div>
                             
                            <div class="s-12" ng-class="{ 'has-error' : userForm.message.$invalid && !userForm.message.$pristine }">
                                <textarea placeholder="* Your massage (required)" name="message" rows="5" ng-model="user.message" required></textarea>
                                <p ng-show="userForm.message.$invalid && !userForm.message.$pristine" class="help-block error-text">Message is required.</p>
                            </div>
                             
                            <div class="s-12 l-12">
                                <input name="" type="file"/>
                            </div>
                             
                            <div class="s-12 m-6 l-4">
                                <button type="submit" ng-disabled="userForm.$invalid">Submit Button</button>
                            </div>
                        </form>

                    </div>
               </div>
            </div>
         </div>
         <!-- MAP -->	
         <div id="map-block">  	  
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d682251.1123056135!2d17.063451638281247!3d48.09010461740988!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c8cbf758ecb9f%3A0xddeb1d26bce5eccf!2sGallayova+2150%2F19%2C+841+02+D%C3%BAbravka%2C+Slovensk%C3%A1+republika!5e0!3m2!1ssk!2s!4v1412519122400" width="100%" height="450" frameborder="0" style="border:0"></iframe>
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
                     <p class="s-12 m-12 l-8 center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
<script>
    // create angular app
    var validationApp = angular.module('validationApp', []);

    // create angular controller
    validationApp.controller('mainController', function($scope, $http) {

        // function to submit the form after all validation has occurred            
        $scope.submitForm = function() {
            if ($scope.userForm.$valid) {
                alert(JSON.stringify($scope.user));
            }
        };

    });
</script>
     