<?php defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Staff_model extends CI_Model
{
    function __construct()
    {
        // Set table name 
        $this->table = 'staff';
    }

    function getStaff($params = array())
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

    function updateStaff($params = array()){
        $this->db->where('id', $params['id']);
        $this->db->update('staff', $params);
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
        $this->db->from('staff');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function customer(){
        $this->load->database();
        $query = $this->db->query("Select * from users");
        return $query->num_rows();
    }

    public function getusers($type){
        $this->load->database();
        if($type == 'all')
        $query = $this->db->query("Select * from users");
        else if($type == 'customer'){
            $query = $this->db->query("Select * from users where type = \"".$type."\"");
        }
        else if($type == 'subscriber'){
            $query = $this->db->query("Select * from users where type = \"".$type."\"");
        }
        return $query->result_array();
    }


    public function addbrands($data){
        $this->db->insert('brands', $data);
        redirect('staff/brands');
    }

    public function editbrand($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('brands', $data);
        redirect('staff/brands');
    }

    public function addcoupon($data){
        $this->db->insert('coupons', $data);
             redirect('staff/coupons');
    }
    
    public function editcoupon($data){  
        $this->db->where('id', $data['id']);
        $this->db->update('coupons', $data);
        return 1;
    }

    public function aboutus($data){  
        $this->db->where('name', 'about');
        $this->db->update('image', $data['image']);
        $this->db->update('content', $data['content']);
        redirect('staff/about');
    }

    public function privacy($data){  
        $this->db->where('name', 'privacy');
        $this->db->update('content', $data['content']);
        redirect('staff/privacy');
    }

    public function terms($data){  
        $this->db->where('link', 'terms');
        $this->db->update('content', $data['content']);
        redirect('staff/terms');
    }

    public function refund($data){  
        $this->db->where('link', 'refund');
        $this->db->update('content', $data['content']);
        redirect('staff/refund');
    }

    public function shipping($data){  
        $this->db->where('link', 'shipping');
        $this->db->update('content', $data['content']);
        redirect('staff/shipping');
    }


    
    public function addexhibition($data){
        $this->db->insert('exhibition', $data);
        redirect('staff/exhibitions');
    }

    public function editexhibition($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('exhibition', $data);
        return 1;
    }

    public function addstall($data){
        $this->db->insert('stalltype', $data);
        redirect('staff/exhibitions');
    }

    public function editstall($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('stalltype', $data);
        return 1;
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
        $query = "SELECT * FROM exhibition WHERE status = 1";
        $result = $this->db->query($query);
        return $result->result_array();
    }
    public function addbookstalls($data){
        $this->db->insert('booked-stalls', $data);
        // redirect('admin/offline');
    }
    
    public function addvideogallery($data)
    {
            $this->db->insert('slider', $data);
            redirect('staff/'.$data['location']);
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

    function addblog($data)
    {
        $this->db->insert('blog',$data);
        redirect('staff/blogs');
    }

    function editpost($link, $data)
    {
        $this->db->where('id',$link);
        $this->db->update('blog',$data);
        redirect(base_url('staff/blogs'));
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
        redirect('staff/reviews');
    }
    
    function editreview($post_id, $data)
    {
        $this->db->where('id',$post_id);
        $this->db->update('reviews',$data);
        redirect(base_url('staff/reviews'));
    }
    function getorders($id){
        $this->db->select('*'); 
        $this->db->from('booked-stalls'); 
        $this->db->where('user_id',$id); 
        $query = $this->db->get(); 
        $result = $query->result_array(); 
        return !empty($result)?$result:array();
    }

}
