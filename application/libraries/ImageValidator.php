<?php

/*
 * ImageValidator class
 */
class ImageValidator {
    
    /*
     * get name extension of file particularly image
     * @params : $image (String)
     * @return : $ext (String)
     */
    public function getExtension($image) {
        $i = strrpos($image,".");
        if (!$i) { 
            return ""; 
        }
        $l = strlen($image) - $i;
        $ext = substr($image,$i+1,$l);
        return $ext;
    }
    
}