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
}