

  <!-- /.row -->
  <div class="row">
      <div class="col-sm-12">
        <span class="text-success"><?php echo $this->session->flashdata('success_profile_update');?></span>  
        <span class="text-success"><?php echo $this->session->flashdata('success');?></span>
        <span class="text-error"><?php echo $this->session->flashdata('error');?></span>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-plus"></span> Add <?php echo $form_name; ?>
            </div>
            <?php //echo form_open(base_url().'admin/admin-add-career-exec');?>
            <form name="my_form" method="post" enctype="multipart/form-data" onSubmit="document.my_form.details.value = $('#editor').html()" action="<?php echo base_url().'admin/'.$form['action'];?>">
            <div class="panel-body">
                
                <!-- title field -->
                <?php if (isset($form['title'])) { ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <?php 
                    echo form_error('title', '<div class="text-error">', '</div>');
                    $for_title = array(
                        'type' => 'text',
                        'name' => 'title',
                        'id' => 'title',
                        'class' => 'form-control',
                        'value' => set_value('title')
                    );
                    echo form_input($for_title);
                    ?>
                </div>
                <?php } ?>
                
                <!-- name field -->
                <?php if (isset($form['name'])) { ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <?php 
                    echo form_error('name', '<div class="text-error">', '</div>');
                    $for_name = array(
                        'type' => 'text',
                        'name' => 'name',
                        'id' => 'name',
                        'class' => 'form-control',
                        'value' => set_value('name')
                    );
                    echo form_input($for_name);
                    ?>
                </div>
                <?php } ?>
                
                <!-- position field -->
                <?php if (isset($form['position'])) { ?>
                <div class="form-group">
                    <label for="position">Position</label>
                    <?php 
                    echo form_error('position', '<div class="text-error">', '</div>');
                    $for_position = array(
                        'type' => 'text',
                        'name' => 'position',
                        'id' => 'position',
                        'class' => 'form-control',
                        'value' => set_value('position')
                    );
                    echo form_input($for_position);
                    ?>
                </div>
                <?php } ?>
                
                <!-- description field -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <?php 
                    echo form_error('description', '<div class="text-error">', '</div>');
                    $for_description = array(
                        'name' => 'description',
                        'id' => 'description',
                        'class' => 'form-control',
                        'value' => set_value('description'),
                        'rows' => 5
                    );
                    echo form_textarea($for_description);
                    ?>
                </div>
                
                <!-- image field -->
                <div class="form-group">
                    <label for="image">Image</label>
                    <?php 
                    echo form_error('image', '<div class="text-error">', '</div>');
                    $for_image = array(
                        'type' => 'file',
                        'name' => 'image',
                        'id' => 'image',
                        'class' => 'form-control'
                    );
                    echo form_input($for_image);
                    ?>
                </div>
                
                <!-- detail field -->
                <?php if (isset($form['detail'])) { ?>
                <div class="form-group">
                    <label for="career_detail">Details</label>
                    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">

                        <div class="btn-group">
                          <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                            <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                            <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
                          <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
                          <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
                          <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
                          <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
                          <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
                          <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
                          <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
                          <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
                          <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
                            <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                <button class="btn" type="button">Add</button>
                            </div>
                            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>
                        </div>

                        <div class="btn-group">
                          <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                          <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                        </div>
                        <div class="btn-group">
                          <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                          <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
                        </div>
                        <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
                    </div>
                    <span class="text-error"><?php echo form_error('details');?></span>
                    <div name="detail" id="editor"></div>
                    <textarea name="details" style="display:none;"></textarea> 
                </div>
                <?php } ?>
                
            </div>
            <div class="panel-footer">
                <?php
                $submit_btn = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => '<span class="glyphicon glyphicon-plus"></span> Add'
                );
                echo form_button($submit_btn);
                $reset_btn = array(
                    'type' => 'reset',
                    'class' => 'btn btn-default',
                    'content' => '<span class="glyphicon glyphicon-refresh"></span> Clear'
                );
                echo form_button($reset_btn);
                ?>
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