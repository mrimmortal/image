<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Files_upload extends CI_Controller {
    function  __construct() {
        parent::__construct();
        $this->load->model('files');
    }    
    function index(){
        $data = array();
        if($this->input->post('submitForm') && !empty($_FILES['upload_Files']['name'])){
            $filesCount = count($_FILES['upload_Files']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['upload_File']['name'] = $_FILES['upload_Files']['name'][$i];
                $_FILES['upload_File']['type'] = $_FILES['upload_Files']['type'][$i];
                $_FILES['upload_File']['tmp_name'] = $_FILES['upload_Files']['tmp_name'][$i];
                $_FILES['upload_File']['error'] = $_FILES['upload_Files']['error'][$i];
                $_FILES['upload_File']['size'] = $_FILES['upload_Files']['size'][$i];
                $uploadPath = 'uploads/files/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('upload_File')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");
                }
            }            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->files->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
			        }
        //Get files data from database
        $data['gallery'] = $this->files->getRows();
        //Pass the files data to view
        $this->load->view('files_upload/index', $data);
    }
}