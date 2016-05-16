<?php


class Alert {
    
    public function __construct(){
        
    }
    
    public function show($message, $status) {
        if ($status == 1) {
            $stat = 'success';
        } else if ($status == 0) {
            $stat = 'danger';
        }
        return $this->setup($stat).$message.'</div>';
    } 
    
    private function setup($status) {
        return '<div class="alert alert-'.$status.'">';
    }
}