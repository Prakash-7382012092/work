<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
      
    }
    public function index(){
        $this->load->view('view');
    }
     public function insert() {        
        $this->form_validation->set_rules('name', 'Body', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
         if ($this->form_validation->run() == FALSE){     
        $this->load->view('view');
            
        }
         if ($this->form_validation->run() == TRUE){                   
              echo "Form data is inserted";
              echo "<br>";
              $data=array();
              $data['userId']="1";
              $data['body']=$this->input->post('name');
              $data['title']=$this->input->post('title');
              $this->load->model('User_model');
              $this->User_model->insert($data);
              echo json_encode($data);
        }
    }
    public function fetch(){
         $api_url='https://jsonplaceholder.typicode.com/users';
                $client=curl_init($api_url);
                curl_setopt($client, CURLOPT_RETURNTRANSFER,true);
                $resp=curl_exec($client);
                curl_close($client);
                $result=json_decode($resp); ?> 
                 <table>
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                    </thead>
                    <tbody>                                
               <?php if(count($result)>0){
                    foreach($result as $row){                    
                        ?>
                  <tr>
                        <td><?php echo $row->id;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->email;?></td>
                        
                    <td><a href="#" class="edit" id="edit" value="<?php echo $row->id; ?>">Edit</a></td>
                   <td><a href="#" class="delete" id="delete" value="<?php echo $row->id;?>">Delete</td>          
                    </tr>
                    
                    <?php
                    }
                }?>
                </tbody>
                    </table><?php
    }

    public function view(){
        $this->load->model('User_model');
        $data=$this->User_model->all();
        echo json_encode($data);
    }
}
?>