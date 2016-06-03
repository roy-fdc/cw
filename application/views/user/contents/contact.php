

  <!-- Contact Section -->
  <section id="contact" class="contact">
    <div class="contact-inner">
      <div id="google-map" class="google-map">
  
        <iframe class="google-map-container"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1962.5814646875833!2d123.90562445802519!3d10.328842936901827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99922157b8c91%3A0x529b9bacb2aff9!2sPark+Centrale%2C+Jose+Maria+del+Mar+St%2C+Cebu+City%2C+6000+Cebu!5e0!3m2!1sen!2sph!4v1459911359760" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
      </div><!-- /#google-map -->

      <div class="form-area text-center wow animated fadeInRight" data-wow-delay=".75s">
        <h2 class="section-title bold"><span>CONTACT</span> US</h2><!-- /.section-title -->
        <form id="contactform" class="contactform" role="form" name="myForm"  ng-submit="sendMail()">
        <?php echo form_open_multipart(base_url().'contact-us/processMail', array('id'=>'contactform', 'class'=>'contactform'));?>
          <div class="msgContact">{{msgContact}}</div>
          <input id="name" ng-model="name" class="form-control alpha" name="name" type="text" placeholder="Name *" value="" required>
          <input id="email" ng-model="email" class="form-control pull-right" name="email" type="email" placeholder="Email *" value="" required>
          <input type="text" ng-model="phone" class="form-control numeric" id="phone" name="phone" placeholder="Phone number *" required>
          <!-- <select name="subject" ng-model="subject" id="subject" class="form-control" style="margin-bottom: 10px">
              <option value="careerClickName" ng-if="careerClickName !==''" selected>{{careerClickName}}</option>
              <option value="Inquiry">Inquiry</option>
              <option ng-repeat="carOp in careers" value="carOp.career_title" ng-if="carOp.career_title !== careerClickName">{{carOp.career_title}}</option>
          </select> -->

           <select name="subject" ng-model="subject" ng-init="subject=careerClickName" id="subject" class="form-control" style="margin-bottom: 10px">
              <option value="INQUIRY">INQUIRY</option>
              <option value="WEB PROGRAMMERS">WEB PROGRAMMERS</option>
              <option value="WEB TRANSLATOR">WEB TRANSLATOR</option>
              <option value="WEB APPLICATION TESTER">WEB APPLICATION TESTER</option>
              
              <!-- <option ng-repeat="carOp in careers" value="carOp.career_title" > {{carOp.career_title}} {{carOp.id}}</option>  -->
          </select>

          <textarea id="message" ng-model="message" class="form-control" name="message" placeholder="Your Message *" rows="2" required></textarea>
          <input type="file" class="form-control" id="myfile" name="attachment" attachment="attachment">
          <input type="submit" class="btn submit-btn" id="submit" value="Send Message">
          <input type="reset" class="btn submit-btn" id="reset" value="Reset">
          </form>
      </div><!-- /.form-area -->
    </div><!-- /.contact-inner -->
  </section>

  <!-- Contact Section -->

  <script type="text/javascript">
    $(document).ready(function(){
      $('.numeric').keypress(function(e) {
        if(e.charCode < 48 || e.charCode > 57) return false;
      });
      $('.numeric').bind("paste", function(e) {
          e.preventDefault();
      });
      $(".alpha").keypress(function(e){
        if((e.charCode < 97 || e.charCode > 122) && (e.charCode < 65 || e.charCode > 90) && (e.charCode != 45) && (e.charCode != 32)) return false;
      });

      $('#myfile').bind('change', function() {
        //get file extension
        var ext = $('#myfile').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['doc', 'docx', 'pdf', 'odt', 'rt']) == -1) {
            alert('Error: Invalid file extension!');
            $('#myfile').val('');
        }
        //get file size
        var iSize = (this.files[0].size / 1024); 
        iSize = (Math.round(iSize * 100) / 100)
        if(iSize > 1000) {
          alert('Error: File should not beyond 1mb.')
          $('#myfile').val('');
        }

      });
    });
  </script>




  


    




  
