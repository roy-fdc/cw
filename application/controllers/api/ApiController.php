<?php
class ApiController extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->model('Benefit');
        $this->load->model('Career');
        $this->load->model('Team');
        $this->load->model('SlideImage');
        $this->load->model('GalleryAlbum');
        $this->load->model('Introduction');
        $this->load->model('About');
        //$this->load->model('AboutValues');
    }

    //get all data
    public function api_allBenefit(){
    	echo json_encode($this->Benefit->api_get_all());
    }

    public function api_allCareer(){
    	echo json_encode($this->Career->api_get_all());
    }

    public function api_allTeam(){
    	echo json_encode($this->Team->api_get_all());
    }

    public function api_imageSlider(){
        echo json_encode($this->SlideImage->api_get_all());
    }

    public function api_galleries(){
        echo json_encode($this->GalleryAlbum->api_get_all());
    }

    public function api_introduction(){
        echo json_encode($this->Introduction->api_get_all());
    }

    public function api_about(){
        echo json_encode($this->About->api_get_all());
    }

    /*public function api_aboutValues(){
        echo json_encode($this->AboutValues->api_get_all());
    }*/
    //end get all data


}
?>