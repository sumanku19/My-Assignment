<?php
   
   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;
     
class Users extends CI_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->secury_key = '%C*F)J@NcRfUjXn2';
       /* Load form validation library */ 
         $this->load->library('form_validation');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */

    public function index(){
        $this->load->view('welcome_message');
    }

	public function users($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("users", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("users")->result();
        }
     
       $response =  json_encode(array('data'=>$data));

       echo $response;
       
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {

        $security_key = $this->input->post('security_key');
        if($security_key != $this->secury_key){
            //$this->response(['Security key is not valid..'], REST_Controller::HTTP_OK);
            $response =  json_encode(array('error'=>'Security key is not valid..'));
            echo $response;exit;
        }
        if(empty($security_key) || $security_key != $this->secury_key){
           // $this->response(['Security is must..'], REST_Controller::HTTP_OK);
            $response =  json_encode(array('error'=>'Security is must..'));
            echo $response;exit;
        }

        /* Set validation rule for name field in the form */ 
         $this->form_validation->set_rules('first_name', 'First Name', 'trim|required'); 
         $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
         $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
         $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
         if ($this->form_validation->run() == FALSE) { 
            //$this->response(['error'=>validation_errors()], REST_Controller::HTTP_OK);
            $response =  json_encode(array('error'=>validation_errors()));
            echo $response;exit;
         } 

          $input = array(
                         'first_name' => $this->input->post('first_name'),
                         'last_name' => $this->input->post('last_name'),
                         'email' => $this->input->post('email'),
                         'password' =>  $this->hash_password($this->input->post('password')),
                         'phone_number' =>  $this->input->post('phone_number'),
                         'role_type' =>  $this->input->post('role_type'),
                         'security_key' =>  $security_key,
                    );
        
        //$input = $this->input->post();
        $this->db->insert('users',$input);
     
        //$this->response(['result'=>'user created successfully.'], REST_Controller::HTTP_OK);
        $response =  json_encode(array('success'=>'user created successfully.'));
            echo $response;exit;
    } 

    function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_update($id)
    {

       $security_key = $this->input->post('security_key');
        if($security_key != $this->secury_key){
            //$this->response(['Security key is not valid..'], REST_Controller::HTTP_OK);
            $response =  json_encode(array('error'=>'Security key is not valid..'));
            echo $response;exit;
        }
        if($security_key == ''){
           // $this->response(['Security is must..'], REST_Controller::HTTP_OK);
            $response =  json_encode(array('error'=>'Security is must..'));
            echo $response;exit;
        }
         /* Set validation rule for name field in the form */ 
         $this->form_validation->set_rules('first_name', 'First Name', 'trim|required'); 
         $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
         //$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
         //$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
         if ($this->form_validation->run() == FALSE) { 
            //$this->response(['error'=>validation_errors()], REST_Controller::HTTP_OK);
            $response =  json_encode(array('error'=>validation_errors()));
            echo $response;exit;
         }

          $input = array(
                         'first_name' => $this->input->post('first_name'),
                         'last_name' => $this->input->post('last_name'),
                        // 'email' => $this->input->post('email'),
                        // 'password' =>  $this->hash_password($password),
                         'phone_number' =>  $this->input->post('phone_number'),
                         'role_type' =>  $this->input->post('role_type'),
                         //'security_key' =>  $this->put('security_key'),
                    );

        //$input = $this->put();
                   // print_r($input);die;
        $this->db->update('users', $input, array('id'=>$id));
     
       // $response = $this->response(['result'=>'user updated successfully.'], REST_Controller::HTTP_OK);

        $response =  json_encode(array('success'=>'User Updated.'));
            echo $response;exit;
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        /*$security_key = $this->input->post('security_key');
        if($security_key != $this->secury_key){
            $this->response(['Security key is not valid..'], REST_Controller::HTTP_OK);
        }
        if(empty($security_key) || $security_key != $this->secury_key){
            $this->response(['Security is must..'], REST_Controller::HTTP_OK);
        }*/
        $this->db->delete('users', array('id'=>$id));
       
        //$this->response(['result'=>'user deleted successfully.'], REST_Controller::HTTP_OK);
        $response =  json_encode(array('result'=>'user deleted successfully.'));
        echo $response;
    }
    	
}