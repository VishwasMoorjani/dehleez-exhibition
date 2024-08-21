<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */
#[\AllowDynamicProperties]
class Blog_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function getblogs($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where('status', 1);
            $this->db->order_by('date_added','desc');
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('blog');
        return $query->result_array();
    }

    function get_posts($number = 10, $start = 0)
    {
        $this->db->select();
        $this->db->from('blog');
        $this->db->where('status',1);
        $this->db->order_by('date_added','desc');
        $this->db->limit($number, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

	function search_blog($query)
	{
		$this->db->select();
		$this->db->from('blog');
		$this->db->like("post_title", $query, 'both');
		$this->db->or_like("post", $query, 'both');
		$this->db->order_by('date_added', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

    function get_post_count()
    {
        $this->db->select()->from('blog')->where('status',1);
        $query = $this->db->get();
        return $query->num_rows;
    }

    function get_post($link)
    {
        $this->db->select();
        $this->db->from('blog');
        $this->db->where(array('status'=>1,'link'=>$link));
        $this->db->order_by('date_added','desc');
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function addblog($data)
    {
        $this->db->insert('blog',$data);
        redirect('admin/blogs');
    }
    
    function editpost($link, $data)
    {
        $this->db->where('id',$link);
        $this->db->update('blog',$data);
        redirect(base_url('admin/blogs'));
    }

    public function removeimg($table = NULL, $tablecol = NULL, $col = NULL, $link = NULL)
    {
        $this->db->set($tablecol,"");
        $this->db->where($col, $link);
        $this->db->update($table);
    }
}