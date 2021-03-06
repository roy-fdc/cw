<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * class ApiControler
 */
class ApisController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $models = array('About', 'AboutValue', 'Benefit', 'Career', 'Gallery', 'GalleryAlbum','Team');
        foreach ($models as $model) {
            $this->load->model($model);
        }
    }
    
    /*
     * all career
     * @params :
     * @return : json
     */
    public function all_career() {
        $careers = $this->Career->api_get_career();
        echo json_encode($careers);
    }
    
    /*
     * single career
     * @params :
     * @return : json
     */
    public function single_career($id) {
        $career = $this->Career->api_get_career($id);
        echo json_encode($career);
    }
    
    /*
     * all team
     * @params :
     * @return : json
     */
    public function all_team() {
        $teams = $this->Team->api_get_team(0);
        echo json_encode($teams);
    }
    
    /*
     * single team
     * @params :
     * @return : json
     */
    public function single_team($id) {
        $team = $this->Team->api_get_team($id);
        echo json_encode($team);
    }
    
    /*
     * all benefit
     * @params :
     * @return : json
     */
    public function all_benefit() {
        $benefits = $this->Benefit->api_get_benefit(0);
        echo json_encode($benefits);
    }
    
    /*
     * single benefit
     * @params :
     * @return : json
     */
    public function single_benefit($id) {
        $benefit = $this->Benefit->api_get_benefit($id);
        echo json_encode($benefit);
    }
    
    /*
     * company detail
     * @params :
     * @return : json
     */
    public function company_detail() {
        $detail = $this->About->api_get_about(1);
        echo json_encode($detail);
    }
    
    /*
     * company mission
     * @params :
     * @return : json
     */
    public function company_mission() {
        $mission = $this->About->api_get_about(2);
        echo json_encode($mission);
    }
    
    /*
     * company vision
     * @params :
     * @return : json
     */
    public function company_vision() {
        $vision = $this->About->api_get_about(3);
        echo json_encode($vision);
    }
    
    /*
     * all value
     * @params :
     * @return : json
     */
    public function all_value() {
        $values = $this->AboutValue->api_get_value(0);
        echo json_encode($values); 
    }
    
    /*
     * single value
     * @params :
     * @return : json
     */
    public function single_value($id) {
        $value = $this->AboutValue->api_get_value($id);
        echo json_encode($value);
    }
    
    /*
     * all album
     * @params :
     * @return : json
     */
    public function all_album() {
        $albums = $this->GalleryAlbum->api_get_album();
        $ctr = 0;
        foreach($albums as $album_row) {
            $data[$ctr]['album_id'] = $album_row->id;
            $data[$ctr]['album_name'] = $album_row->album_name;
            $galleries = $this->Gallery->api_get_gallery($album_row->id);
                foreach($galleries as $gallery_row) {
                    $data[$ctr]['images'][] = array(
                        'image_id' => $gallery_row->id,
                        'image_name' => $gallery_row->image_name
                    );
                }
            $ctr++;
        }
        echo json_encode($data);
    }
    
    /*
     * single album
     * @params :
     * @return : json
     */
    public function single_album($id) {
        $gallery = $this->Gallery->api_get_gallery($id);
        echo json_encode($gallery);
    }
    
    /*
     * page introduction 
     * @params :
     * @return : json
     */
    public function page_introduction() {
        $introductions = $this->Introduction->api_get_introduction();
        echo json_encode($introductions);
    }
     
}
