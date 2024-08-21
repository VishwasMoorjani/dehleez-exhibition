<?php
#[\AllowDynamicProperties]
class Product_model extends CI_Model
{

    public function getdata($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where('status', 1);
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function activate($table = NULL, $link = NULL)
    {
        if ($table == "users" || $table == "reviews") {
            $this->db->set('status', 1);
            $this->db->where('id', $link);
            $this->db->update($table);
        } else {
            $this->db->set('status', 1);
            $this->db->where('link', $link);
            $this->db->update($table);
        }
    }
    public function deactivate($table = NULL, $link = NULL)
    {
        if ($table == "users") {
            $this->db->set('status', 2);
            $this->db->where('id', $link);
            $this->db->update($table);
        } else if ($table == "reviews") {
            $this->db->set('status', 0);
            $this->db->where('id', $link);
            $this->db->update($table);
        } else {
            $this->db->set('status', 0);
            $this->db->where('link', $link);
            $this->db->update($table);
        }
    }

    public function delete($table = NULL, $link = NULL)
    {
        if ($table == "reviews" || $table == "brands" || $table == "blog" || $table == "booked-stalls"|| $table == "staff") {
            $this->db->where('id', $link);
            $this->db->delete($table);
            return true;
        } else {
            $this->db->where('link', $link);
            $this->db->delete($table);
            return true;
        }
    }
    public function cancelofflinebookings($table = NULL, $link = NULL)
    {
        $data = array();
        $data['user'] = $table;
        $data['remark'] = $link;
        $this->db->insert('logs', $data);
        return true;
    }
    public function walletlog($table = NULL, $link = NULL)
    {
        $data = array();
        $data['user'] = $table;
        $data['remark'] = $link;
        $this->db->insert('logs', $data);
        return true;
    }

    public function cancelorder($link = NULL,$by = NULL)
    {
        $this->db->set('user_id', 0);
        $this->db->set('booked_by', $by);
        $this->db->set('remark', 'cancelled-stall');
        $this->db->where('id', $link);
        $this->db->update('booked-stalls');
        return true;
    }
    public function updatewallet($id = NULL, $price = NULL)
    {
        $this->db->set('wallet', $price);
        $this->db->where('id', $id);
        $this->db->update('users');
        return true;
    }
    public function addeditwallet($id = NULL, $amount = NULL)
    {
        $this->db->set('wallet', 'wallet + ' . $amount, FALSE);
        $this->db->where('id', $id);
        $this->db->update('users');
        return true;
    }
    public function subeditwallet($id = NULL, $amount = NULL)
    {
        $this->db->set('wallet', 'wallet - ' . $amount, FALSE);
        $this->db->where('id', $id);
        $this->db->update('users');
        return true;
    }
    public function refferalupadte($user_id, $amount) {
        $this->db->set('wallet', 'wallet + ' . $amount, FALSE);
        $this->db->where('id', $user_id);
        $this->db->update('users');
    }
    public function clearrefferid($user_id) {
        $this->db->set('referred_by','');
        $this->db->where('id', $user_id);
        $this->db->update('users');
    }
    public function updatereffertranscation($id = NULL, $price = NULL,$exhibition_id = NULL,$stall_number = NULL)
    {
        $data = array();
        $data['user_id'] = $id;
        $data['amount'] = $price;
        // $data['exhibition_id'] = $exhibition_id;
        // $data['stall_number'] = $stall_number;
        $data['remark'] = "Referral Amount";
        $data['transcation_id'] = $id.''.'REFFERAL'.$price;
        $this->db->insert('transactions', $data);
        return true;
    }

    public function updattranscation($data)
    {

        $this->db->insert('transactions', $data);
        return true;
    }
    public function canceltranscation($id = NULL, $price = NULL,$exhibition_id = NULL,$stall_number = NULL,$remark = NULL,$mode = NULL)
    {
        $data = array();
        $data['user_id'] = $id;
        $data['amount'] = $price;
        $data['exhibition_id'] = $exhibition_id;
        $data['stall_number'] = $stall_number;
        $data['remark'] = $remark;
        if($mode != NULL){
            $data['modeofpayment'] = $mode;
        }
        $data['transcation_id'] = 'REF-'.time();
        $this->db->insert('transactions', $data);
        return true;
    }
    public function purchasetranscation($id = NULL, $price = NULL,$exhibition_id = NULL,$stall_number = NULL,$mode = NULL)
    {
        $data = array();
        $data['user_id'] = $id;
        $data['amount'] = $price;
        $data['exhibition_id'] = $exhibition_id;
        $data['stall_number'] = $stall_number;
        $data['remark'] = "Booked Stall";
        $data['modeofpayment'] = $mode;
        $data['transcation_id'] = $id.''.$exhibition_id.''.$stall_number.'BOOK'.$price;
        $this->db->insert('transactions', $data);
        return true;
    }

    public function search($keyword, $data = NULL)
    {

        $query = "SELECT * FROM product WHERE name like '%$keyword%' or category like '%$keyword%' or category like '%$keyword%' and status = 1";
        if ($data != NULL) {
            if ($data == 'price_desc') {
                $query .= "
                ORDER BY price DESC";
            } else if ($data == 'price_asc') {
                $query .= "
                ORDER BY price ASC";
            }
            if ($data == 'id_desc') {
                $query .= "
                ORDER BY id DESC";
            } else if ($data == 'id_asc') {
                $query .= "
                ORDER BY id ASC";
            }
        }
        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function insert($data = array())
    {
        $insert = $this->db->insert('product', $data);
        return $insert ? true : false;
    }


    public function get_category($link)
    {
        $query = $this->db->get_where('category', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    public function getmaincategories()
    {
        $this->db->where('parent', "");
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function checkcategory($link)
    {

        $query = $this->db->get_where('category', array('link' => $link));
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function get_exhibition($link)
    {
        $query = $this->db->get_where('exhibition', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }
    public function get_exhibition_by_id($link)
    {
        $query = $this->db->get_where('exhibition', array('id' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }
    public function get_stall($link)
    {
        $query = $this->db->get_where('stalltype', array('id' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }
    public function get_stall_by_link($link)
    {
        $query = $this->db->get_where('stalltype', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    public function getstalls($link)
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('stalltype', array('exhibition' => $link));
        return $query->result_array();
    }

    public function getlogs()
    {
        $this->db->from('logs');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getwalletamount($link)
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('users', array('id' => $link));
        return $query->row_array();
    }
    public function getonestalls($link)
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('stalltype', array('id' => $link));
        return $query->result_array();
    }
    public function getonestallsprice($link)
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('stalltype', array('id' => $link));
        return $query->row_array();
    }
    public function getstall($link)
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('booked-stalls', array('id' => $link));
        return $query->row_array();
    }

    public function getbookedstall($link)
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('booked-stalls', array('stall_id' => $link));
        return $query->result_array();
    }
    public function getofflinebookedstalls()
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('booked-stalls', array('user_id' => 0));
        return $query->result_array();
    }
    public function getofflinebookedstallsforstaff()
    {
        // $query = $this->db->get('stalltype');
        $query = $this->db->get_where('booked-stalls', array('booked_by' => $_SESSION['staffEmail'], 'user_id' => 0));
        return $query->result_array();
    }
    public function getstallswithexhibition($link, $req)
    {
        $query = "SELECT * FROM stalltype WHERE stalls like '%$req%' and exhibition = $link";
        // $query = $this->db->get('stalltype');
        // $query = $this->db->get_where('stalltype', array(
        //     'exhibition' => $link,
        //     'stalls' => $req,
        // ));
        $result = $this->db->query($query);
        return $result->row();
    }
    public function getexhibitions()
    {
        $query = $this->db->get('exhibition');
        return $query->result_array();
    }
    
    public function getupcomingexhibitions()
    {
        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('Y-m-d');
        $this->db->where('start_date >', $current_date);
        $query = $this->db->get('exhibition');
        return $query->result_array();
    }
    
    public function getfeaturedexhibitions()
    {
        $query = $this->db->get_where('exhibition', array('featured' => 'on'));
        return $query->result_array();
    }

    public function checkexhibition($link)
    {

        $query = $this->db->get_where('exhibition', array('link' => $link));
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkblog($link)
    {

        $query = $this->db->get_where('blog', array('link' => $link));
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getimages($link)
    {
        $this->db->select('images');
        $this->db->from('exhibition');
        if ($link) {
            $this->db->where('link', $link);
            $query = $this->db->get();
            $result = $query->row();
        } else {
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result) ? $result : false;
    }

    public function saveimage($link, $images)
    {
        $this->db->set('images', $images);
        $this->db->where('link', $link);
        $this->db->update('exhibition');
    }

    public function removeimg($table = NULL, $link = NULL)
    {
        $this->db->set('image', "");
        $this->db->where('id', $link);
        $this->db->update($table);
    }

    public function check_stalls_availability($selectedStalls, $selectedExhibition)
    {
        $query = $this->db->get_where('booked-stalls', array(
            'stall_number' => $selectedStalls,
            'exhibition_id' => $selectedExhibition,
            'is_booked' => 1
        ));
        if ($query->num_rows() > 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getbookedstalls($link)
    {
        $query = $this->db->select('stall_number')
            ->where('exhibition_id', $link)
            ->get('booked-stalls');

        return $ids = array_column($query->result_array(), 'stall_number');

        // $query = "SELECT `stall_number` FROM `booked-stalls` WHERE exhibition_id = '$link'";
        // $result = $this->db->query($query);
        // return $result->result_array();
    }

    public function getcoupons($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('coupons');
        return $query->result_array();
    }


    public function getcoupon($link, $active = NULL, $val = NULL)
    {
        if (isset($val) && $val == 1) {
            $this->db->query('Update coupons set quantity = quantity-1 where name = "' . $link . '"');
            return 1;
        }
        if (isset($active) && $active == 1) {
            $this->db->where('status', 1);
        }
        $this->db->where('name', $link);
        $query = $this->db->get('coupons');
        return $query->row_array();
    }
}
