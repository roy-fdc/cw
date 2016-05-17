<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin Teams</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
    <div class="row">
        <div class="col-sm-8">
            <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
            <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit
                </div>
                <?php //echo form_open(base_url().'admin/admin-add-career-exec');?>
                <form name="my_form" method="post" enctype="multipart/form-data" onSubmit="document.my_form.details.value = $('#editor').html()" action="<?php echo base_url();?>admin/admin-edit-team-exec">
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $team->id;?>"/>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <span class="text-error"><?php echo form_error('name');?></span>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $team->team_name;?>"/>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <span class="text-error"><?php echo form_error('position');?></span>
                        <textarea name="position" id="position" class="form-control"><?php echo $team->team_position;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <span class="text-error"><?php echo form_error('description');?></span>
                        <textarea name="description" id="description" class="form-control"><?php echo $team->team_description;?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <span class="text-error"><?php echo form_error('image');?></span>
                        <input type="file" name="image" id="image" class="form-control"/>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>

<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
        $('.dropdown-menu input').click(function() {return false;})
            .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
    };
    function showErrorAlert (reason, detail) {
        var msg='';
        if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
        else {
            console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
         '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    };
    initToolbarBootstrapBindings();  
    $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
</script>