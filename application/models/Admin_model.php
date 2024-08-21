<?php defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Admin_model extends CI_Model
{
    function __construct()
    {
        // Set table name 
        $this->table = 'admin';
    }

    /* 
     * Fetch user data from the database 
     * @param array filter data based on the passed parameters 
     */
    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->table);

        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params) || $params['returnType'] == 'single') {
                if (!empty($params['id'])) {
                    $this->db->where('id', $params['id']);
                }
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('id', 'desc');
                if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit']);
                }

                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }

        // Return fetched data 
        return $result;
    }

    public function ForgotPassword($email)
    {
        $this->db->select('email');
        $this->db->from('admin');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function addcategory($data){
        $this->db->insert('category', $data);
        redirect('admin/categories');
    }

    public function editcategory($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('category', $data);
        return 1;
    }


    public function addexhibition($data){
        $this->db->insert('exhibition', $data);
        redirect('admin/exhibitions');
    }

    public function addstall($data){
        $this->db->insert('stalltype', $data);
        redirect('admin/exhibitions');
    }

    public function editstall($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('stalltype', $data);
        return 1;
    }
    public function editexhibition($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('exhibition', $data);
        return 1;
    }

    function getreviews($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where('status', 1);
            $this->db->order_by('date_added','desc');
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('reviews');
        return $query->result_array();
    }

    function addreview($data)
    {
        $this->db->insert('reviews',$data);
        redirect('admin/reviews');
    }
    
    function editreview($post_id, $data)
    {
        $this->db->where('id',$post_id);
        $this->db->update('reviews',$data);
        redirect(base_url('admin/reviews'));
    }
    public function addcoupon($data)
    {
        $this->db->insert('coupons', $data);
        redirect('admin/coupons');
    }

    public function editcoupon($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('coupons', $data);
        return 1;
    }

    public function addbrands($data){
        $this->db->insert('brands', $data);
        redirect('admin/brands');
    }
    public function editbrand($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('brands', $data);
        redirect('admin/brands');
    }
    function getorders($id){
        $this->db->select('*'); 
        $this->db->from('booked-stalls'); 
        $this->db->where('user_id',$id); 
        $query = $this->db->get(); 
        $result = $query->result_array(); 
        return !empty($result)?$result:array();
    }
    function getallorders($id){
        $this->db->select('*'); 
        $this->db->from('booked-stalls'); 
        $this->db->where('stall_id',$id); 
        $query = $this->db->get(); 
        $result = $query->result_array(); 
        return !empty($result)?$result:array();
    }

    function offline_exhibition()
    {
        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('Y-m-d');
        $this->db->where('start_date >', $current_date);
        $this->db->where('status', 1);
        $query = $this->db->get('exhibition');
        return $query->result_array();
    }
    function booked($req)
    {
        $this->db->select('*');
        $this->db->from('booked-stalls');
        $this->db->where('exhibition_id',$req);
        $query = $this->db->get();
        $result = $query->result_array();
        return !empty($result)?$result:array();
    }
    public function addbookstalls($data){
        $this->db->insert('booked-stalls', $data);
        // redirect('admin/offline');
    }

    function getallbookedsatalls(){
        $this->db->select('*'); 
        $this->db->from('booked-stalls'); 
        $query = $this->db->get(); 
        $result = $query->result_array(); 
        return !empty($result)?$result:array();
    }




    // staff and roles permission

    public function getstaff()
    {
        $this->load->database();
        $query = $this->db->query("Select * from staff");
        return $query->result_array();
    }

    function getstaffuser($link){
        $query = $this->db->get_where('staff', array('id' => $link));
        return $query->row();
    }

    public function addstaff($data){
        $result=$this->db->insert('staff', $data);
        return true;
    }

    // Roles started

    public function get_role($link)
    {

        $query = $this->db->get_where('roles', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    public function getroles()
    {
        $query = $this->db->get('roles');
        return $query->result_array();
    }
    
    public function getbackups()
    {
        $query = $this->db->get('backup');
        return $query->result_array();
    }

    public function addrole($data){
        $result=$this->db->insert('roles', $data);
		return $result=$this->db->insert_id();
    }

    public function editrole($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('roles', $data);
        return 1;
    }

    public function getallpermissions()
    {
        $query = $this->db->get('permissions');
        return $query->result_array();
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
                $config['wordwrap'] = TRUE;
                $config['wrapchars'] = 76;
                $config['crlf'] = "\r\n";


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





}
