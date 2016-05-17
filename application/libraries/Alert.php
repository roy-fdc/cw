<?php


class Alert {
    
    public function __construct(){
        
    }
    
    public function show($message, $status) {
        if ($status == 1) {
            $stat = 'success';
            $icon = 'ok';
        } else if ($status == 0) {
            $stat = 'danger';
            $icon = 'remove';
        }
        return $this->setup($stat, $icon).$message.'</div>';
    } 
    
    private function setup($status, $icon) {
        return '<div class="alert alert-'.$status.'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span class="glyphicon glyphicon-'.$icon.'"></span> ';
    }
    
    
    function handle_upload() {
        if (isset($_FILES['career_image']) && !empty($_FILES['career_image']['name'])) {
            if ($this->upload->do_upload('career_image')) {
                // set a $_POST value for 'image' that we can use later
                $upload_data    = $this->upload->data();
                $_POST['image'] = $upload_data['file_name'];
                return true;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        } else {
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $_POST['image'] = '';
                return true;
            } else {
                // throw an error because nothing was uploaded
                $this->form_validation->set_message('handle_upload', "You must upload an image!");
                return false;
            }
        }
    }
}