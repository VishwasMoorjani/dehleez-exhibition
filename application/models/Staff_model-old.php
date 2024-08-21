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

    // public function sendpassword($data)
    // {
    //     $email = $data['email'];
    //     $query1 = $this->db->query("SELECT *  from staff where email = '" . $email . "' ");
    //     $row = $query1->result_array();
    //     if ($query1->num_rows() > 0) {
    //         $passwordplain = "";
    //         $passwordplain  = rand(999999999, 9999999999);
    //         $newpass['password'] = sha1($passwordplain);
    //         $this->db->where('email', $email);
    //         $this->db->update('staff', $newpass);
    //         $mail_message = 'Dear ' . $row[0]['name'] . ',' . "\r\n";
    //         $mail_message .= 'Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>' . $passwordplain . '</b>' . "\r\n";
    //         $mail_message .= '<br>Please Update your password.';
    //         $mail_message .= '<br>Thanks & Regards';
    //         $mail_message .= '<br>Your company name';
    //         require_once('class.phpmailer.php');	
    //         $mail = new PHPMailer();
    //         $mail->IsSMTP(); // enable SMTP
    //         $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    //         $mail->SMTPAuth = true; // authentication enabled
    //         $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    //         $mail->Host = "host.gdigitalindia.in";
    //         $mail->Port = 465; // or 587
    //         $mail->IsHTML(true);
    //         $mail->Username = "enquiry@sanjeevanifoundation.co.in";
    //         $mail->Password = "Dz&j.M*XXA)x";
    //         $mail->setFrom('vishwasmoorjani02@gmail.com', 'Vishwas');
    //         $mail->IsHTML(true);
    //         $mail->addAddress('vishwasmoorjani02@gmail.com');
    //         $mail->Subject = 'OTP from Route';
    //         $mail->Body    = $mail_message;
    //         if (!$mail->Send()) {
    //             $this->session->set_flashdata('error_msg', 'Failed to send password, please try again!');
    //         } else {
    //             $this->session->set_flashdata('success_msg', 'Password sent to your email!');
    //         }
    //         redirect(base_url() . 'staff/login', 'refresh');
    //     } else {
    //         $this->session->set_flashdata('error_msg', 'Email not found try again!');
    //         redirect(base_url() . 'staff/login', 'refresh');
    //     }
    // }

    public function totalsales(){
        $this->load->database();
        $query = $this->db->query("Select SUM(totalAmount) AS amount from orders");
        return $query->result()[0];
        
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

    public function getproducts(){
        $this->load->database();
        $query = $this->db->get('product');
        return $query->result_array();
        
    }

    public function addproduct($data){
        $this->db->insert('product', $data);
        $this->load->database();
        $this->db->where('link', $data['link']);
        $query = $this->db->get('product');
        
        return $query->row_array()['id'];
        // redirect('staff/products');
    }
    
        public function addcar($data){
        $this->db->insert('car', $data);
        $this->load->database();
        $this->db->where('link', $data['link']);
        $query = $this->db->get('car');
        
        return $query->row_array()['id'];
        // redirect('staff/car');
    }
    public function editcar($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('car', $data);
        // redirect('staff/products');
    }
    public function editfarm($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('farm', $data);
        // redirect('staff/products');
    }
    
        public function addfarm($data){
        $this->db->insert('farm', $data);
        $this->load->database();
        $this->db->where('link', $data['link']);
        $query = $this->db->get('farm');
        
        return $query->row_array()['id'];
        // redirect('staff/farm');
    }
    
    public function addproductattri($data)
    {
        $this->db->insert('iternary', $data);
    }
    public function editproductattri($data)
    {
        $this->db->where('id', $data['id']);
        unset($data["id"]);
        $this->db->update('iternary', $data);
    }
    public function editproduct($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('product', $data);
        // redirect('staff/products');
    }
    public function addclients($data){
        $this->db->insert('clients', $data);
        redirect('staff/clients');
    }
    public function editclient($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('clients', $data);
        redirect('staff/clients');
    }   
    public function addbrands($data){
        $this->db->insert('brands', $data);
        redirect('staff/brands');
    }
    public function addcartags($data){
        $this->db->insert('cartags', $data);
        redirect('staff/cartags');
    }
    public function editcartag($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('cartags', $data);
        redirect('staff/cartags');
    }
    public function addservice($data){
        $this->db->insert('services', $data);
        redirect('staff/services');
    }
    public function editservice($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('services', $data);
        redirect('staff/services');
    }
    public function editbrand($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('brands', $data);
        redirect('staff/brands');
    }
    
    public function addcategory($data){
        $this->db->insert('category', $data);
        if($data['parent']!= ""){
            redirect('staff/subcategories');
        }
        else{
             redirect('staff/categories');
        }
    }
    
    public function addcarcategory($data){
        $this->db->insert('car_category', $data);
        redirect('staff/carcategory');
    }
    
    public function addfarmcategory($data){
        $this->db->insert('farm_category', $data);
        redirect('staff/farmcategory');
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

    public function editcategory($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('category', $data);
        return 1;
    }
    
    public function editcarcategory($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('car_category', $data);
        return 1;
    }
    
    public function editfarmcategory($data){  
        $this->db->where('link', $data['link']);
        $this->db->update('farm_category', $data);
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

    // public function bulkmail($data)
    // {        
    //     $this->load->library('email');
    //     $config['protocol']    = 'smtp';
    //     $config['smtp_host']    = 'host.gdigitalindia.in';
    //     $config['smtp_crypto'] = 'ssl';
    //     $config['smtp_port']    = '465';
    //     $config['smtp_timeout'] = '7';
    //     $config['smtp_user']    = 'info@routewallets.com';
    //     $config['smtp_pass']    = 'Info@123??';
    //     $config['charset']    = 'utf-8';
    //     $config['newline']    = "\r\n";
    //     $config['mailtype'] = 'html'; // or html
    //     $config['validation'] = TRUE; // bool whether to validate email or not    
        
    //     $this->email->initialize($config);
    //     $mail_message = $data['message'];
    //     $this->email->from('info@routewallets.com', 'Route Wallets');
    //     $query = $this->db->query("Select * from users");
    //     $users = $query->result_array();
    //     foreach($users as $user){
    //         $this->email->bcc($user['email'],$user['firstname']);
    //     }
    //     $this->email->subject($data['subject']);
    //     $this->email->message($mail_message);
    //     if ( ! $this->email->send())
    //     { return $this->email->print_debugger(); }
    // }
}
