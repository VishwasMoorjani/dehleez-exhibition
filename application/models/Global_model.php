<?php 
#[\AllowDynamicProperties]
class Global_model extends CI_Model {

        public function getdata(){
                $this->load->database();
                $query = $this->db->query("Select * from global");
                $info = $query->result_array();
                foreach ($info as $row) {
			$data[$row['name']] = $row['value'];
		}
                return $data;
        }
        
        public function editsettings($name, $value){
                $this->db->set('value',$value);
                $this->db->where('name', $name);
                $this->db->update('global');
        }

        public function send_mail($data)
        {
                $this->load->library('email');
                $config['protocol']    = 'smtp';
                $config['smtp_host']    = admin_host;
                $config['smtp_crypto'] = 'ssl';
                $config['smtp_port']    = '465';
                $config['smtp_timeout'] = '7';
                $config['smtp_user']    = admin_username;
                $config['smtp_pass']    = admin_password;
                $config['charset']    = 'utf-8';
                $config['newline']    = "\r\n";
                $config['mailtype'] = 'html'; // or html
                $config['validation'] = TRUE; // bool whether to validate email or not    

                $this->email->initialize($config);
                $this->email->from(admin_username, admin_name);
                $this->email->to($data['toemail']);
                $this->email->subject($data['subject']);
                $this->email->message($data['message']);
                
                if (isset($data['attachment']) && !empty($data['attachment'])) {
                   $this->email->attach($data['attachment']);
                }

                if (!$this->email->send()) {
                        return $this->email->print_debugger();
                } else {
                        return 1;
                // redirect('home/thanks');
                }
        }

        public function getblog($active = NULL){
                $this->load->database();
                if(isset($active)){
                    $query = $this->db->query("Select * from blog where status = 1 ");
                }
                else{
                $query = $this->db->query("Select * from blog");
                }
                return $query->result_array();
        }
        public function getpage($link)
        {
                $this->load->database();
                $query = $this->db->query("Select * from pages where name=\"$link\"");
                return $query->result_array();
        }

        public function newsletter($data = array())
        {
            $insert = $this->db->insert('newsletter', $data);
        }
        public function contact($data = array())
        {
            $insert = $this->db->insert('form', $data);
        }
        
        public function enquiry($data = array())
        {
            unset($data['submit']);
            $insert = $this->db->insert('enquiry', $data);
        }
        public function editpage($data)
        {
                $this->db->where('name', $data['name']);
                $this->db->update('pages', $data);
        }

        public function editvideogallery($data)
        {
                $this->db->where('link', $data['link']);
                $this->db->update('slider', $data);
                return $data;
        }

        public function addvideogallery($data)
        {
                $this->db->insert('slider', $data);
                redirect('admin/'.$data['location']);
        }

        public function getactivevideogallery()
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where status = 1 and location = 'vgallery'");
                return $query->result_array();
        }

        public function getvideogallery()
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where location = 'vgallery'");
                return $query->result_array();
        }

        public function getgalleryvideo($link)
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where link = $link and location = 'vgallery' ");
                return $query->result_array();
        }
        public function getgallery()
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where location = 'gallery'");
                return $query->result_array();
        }
        public function savegalleryimages($image)
        {
            $data['image'] = $image;
            $data['location'] = 'gallery';
            $this->db->insert('slider', $data);
        }
        
        public function removegalleryimages($id)
        {
            $this->db->where('id', $id);
            $this->db->delete("slider");
        }
        public function getgalleryimage($link = NULL)
        {
            $this->load->database();
            $query = $this->db->query("Select * from slider where location = 'gallery'");
            $result = $query->result_array();
            return !empty($result) ? $result : false;
        }
        public function getsliders(){
                $this->load->database();
                $query = $this->db->query("Select * from slider where location = 'slider'");
                return $query->result_array();
        }
        public function addsliders($data){
                $this->db->insert('slider', $data);
                // redirect('admin/sliders');
        }
        public function editsliders($data){
                $this->db->where('link', $data['link']);
                $this->db->update('slider', $data);
        }
        public function getslider($link){
                $this->load->database();
                $query = $this->db->query("Select * from slider where link = '$link' and location = 'slider' ");
                return $query->result_array();
        }
        
        public function removeimg($table = NULL,$link = NULL){
                $this->db->set('image',"");
                $this->db->where('link', $link);
                $this->db->update($table);
        }
        public function getactivesliders(){
                $this->load->database();
                $query = $this->db->query("Select * from slider where status = 1 and location = 'slider'");
                return $query->result_array();
        }

                
        public function getactivereviews()
        {
                $this->load->database();
                $query = $this->db->query("Select * from reviews where status = 1");
                return $query->result_array();
        }

        public function getactivecoupons()
        {
                $this->load->database();
                if(!isset($_SESSION['currency'])){
                $query = $this->db->query("Select * from coupons where status = 1 and type = 'percentage' or type = 'fixed'");
                }elseif($_SESSION['currency'] == 'USD'){
                $query = $this->db->query("Select * from coupons where status = 1 and type = 'percentage' or type = 'usd'");
                }
                else{
                $query = $this->db->query("Select * from coupons where status = 1 and type = 'percentage' or type = 'fixed'");
                }
                return $query->result_array();
        }

        public function getbrands($active = NULL){
                $this->load->database();
                if(isset($active)){
                    $query = $this->db->query("Select * from brands where status = 1 ");
                }
                else{
                $query = $this->db->query("Select * from brands");
                }
                return $query->result_array();
        }
        public function getbrand($id){
                $this->load->database();
                $query = $this->db->query("Select * from brands where id = $id");
                return $query->result_array();
        }
       

       




}
