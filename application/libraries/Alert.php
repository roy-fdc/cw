<?php
/*
 * Alert class (library)
 * Bootstrap alert standard
 */

class Alert {
    
    public function __construct(){
        
    }
    
    /*
     * show message (call to use the alert message)
     * @params :  $message (String), $status (int)
     * @return : $constructed_message (String)
     */
    public function show($message, $status) {
        if ($status == 1) {
            $stat = 'success';
            $icon = 'ok';
        } else if ($status == 0) {
            $stat = 'danger';
            $icon = 'remove';
        }
        $constructed_message = $this->setup($stat, $icon).$message.'</div>';
        return $constructed_message;
    } 
    
    /*
     * Setup mesage  (construct alert class and icon)
     * @params : $status (String), $icon (String)
     * @return : String
     */
    private function setup($status, $icon) {
        return '<div class="alert alert-'.$status.'"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><span class="glyphicon glyphicon-'.$icon.'"></span> ';
    }
    
    
}