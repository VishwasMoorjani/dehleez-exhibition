<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Load form validation ibrary & user model 
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->model('Blog_model');
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Order_model');
		$this->load->model('Orders_model');
		$this->load->model('Staff_model');

		// Admin login status 
		$this->isAdminLoggedIn = $this->session->userdata('isAdminLoggedIn');
		$this->Global = $this->Global_model->getdata();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if (isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/dashboard');
		} else {
			redirect('admin/login');
		}
	}

	public function dashboard()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			// echo "<pre>";
			// print_r($this->Product_model->getexhibitions());
			// die();
			$this->load->view('admin/dashboard', $this->Global);
		}
	}

	public function about()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$this->Global = $_POST;
				$this->Global['name'] = 'about';
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', '');
					$this->Global['image'] = $image['file_name'];
				} else {
					unset($this->Global['image']);
				}
				if (!empty($_FILES['image2']['name'])) {
					$image2 = $this->upload('image2', '');
					$this->Global['image2'] = $image2['file_name'];
				} else {
					unset($this->Global['image2']);
				}
				unset($this->Global["submit"]);
				$this->Global_model->editpage($this->Global);
				redirect('admin/about');
			}
			$a = $this->Global_model->getpage("about");
			$this->Global["pagecontent"] = $a[0];
			$this->load->view('admin/about', $this->Global);
		}
	}

	public function pages($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$this->Global = $_POST;
				$this->Global['name'] = $link;
				// if (!empty($_FILES['image']['name'])) {
				// 	$image = $this->upload('image', '');
				// 	$this->Global['image'] = $image['file_name'];
				// } else {
				// 	unset($this->Global['image']);
				// }
				unset($this->Global["submit"]);
				$this->Global_model->editpage($this->Global);
				redirect('admin/pages/' . $link);
			}
			$a = $this->Global_model->getpage($link);
			$this->Global["pagecontent"] = $a[0];
			$this->load->view('admin/page', $this->Global);
		}
	}


	public function removeabout($field = 'image')
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->db->query("Update pages set $field = NULL where name = 'about'");
			echo ("done");
		}
	}


	public function customers()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['customers'] = $this->User_model->getalluser();
			// echo "<pre>";
			// print_r($this->Global['customers']);
			// die();
			$this->load->view('admin/customer', $this->Global);
		}
	}

	public function order_history($req)
	{
		$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
		$this->Global['orders'] = $this->Admin_model->getorders($req);
		// echo "<pre>";
		// print_r($this->Global['orders']);
		// die();
		// $this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
		$this->load->view('admin/userorder', $this->Global);
	}

	public function login()
	{
		if (isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/dashboard');
		} else {
			$this->Global = array();
			// If login request submitted 
			if (isset($_POST['loginSubmit'])) {
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('password', 'password', 'required');

				if ($this->form_validation->run() == true) {
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $this->input->post('email'),
							'password' => sha1($this->input->post('password')),
						)
					);
					$checkLogin = $this->Admin_model->getRows($con);
					if ($checkLogin) {
						$this->session->set_userdata('isAdminLoggedIn', TRUE);
						$this->session->set_userdata('userId', $checkLogin['id']);
						redirect('admin/dashboard/');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong email or password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}

			// Load view 
			$this->load->view('admin/sign-in', $this->Global);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('isAdminLoggedIn');
		$this->session->unset_userdata('userId');
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	public function forgot_password()
	{
		if (isset($_POST['email'])) {
			$email = $this->input->post('email');
			$findemail = $this->Admin_model->ForgotPassword($email);
			if ($findemail) {
				$this->Admin_model->sendpassword($findemail);
			} else {
				$this->session->set_flashdata('error_msg', ' Email not found!');
				redirect(base_url() . 'admin/login', 'refresh');
			}
		}
		$this->load->view('admin/forgot');
	}

	public function upload($file, $dir = 'images')
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$config['upload_path']          = FCPATH . 'assets/front/' . $dir;
			$config['allowed_types']        = '*';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			if (!$this->upload->do_upload($file)) {
				$data['error_message'] =  $this->upload->display_errors();
				$this->session->set_flashdata('error_msg', $data['error_message']);
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				return $this->upload->data();
			}
		}
	}

	public function create_slug($name, $table, $field)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			// Use this code to create a slug
			// $title = "My name is Vishwas Moorjani";
			// $table = "product";
			// $field = "link";
			// $a =  $this->create_slug($title, $table, $field);

			$slug = $name;
			$slug = url_title($name);
			$key = NULL;
			$value = NULL;
			$i = 0;
			$params = array();
			$params[$field] = $slug;

			if ($key) $params["$key !="] = $value;

			while ($this->db->from($table)->where($params)->get()->num_rows()) {
				if (!preg_match('/-{1}[0-9]+$/', $slug))
					$slug .= '-' . ++$i;
				else
					$slug = preg_replace('/[0-9]+$/', ++$i, $slug);
				$params[$field] = $slug;
			}

			return strtolower($slug);
		}
	}

	public function activate($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->activate($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function deactivate($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->deactivate($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->delete($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function cancelofflinebookings($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['stalls'] = $this->Product_model->getstall($link);
			$this->Global['exhibitions'] = $this->Product_model->get_exhibition_by_id($this->Global['stalls']['exhibition_id']);
			$remark = "Stall Number " . $this->Global['stalls']['stall_number'] . " of Exhibition " . $this->Global['exhibitions']->name . " has been cancelled from offline bookings by Admin";
			$this->Product_model->cancelofflinebookings('Admin', $remark);
			$this->Product_model->delete($table, $link);

			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function exhibitionlog($table = NULL, $id = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['exhibitions'] = $this->Product_model->get_exhibition($id);
			// print_r($this->Global['exhibitions']->name);
			$remark = $this->Global['exhibitions']->name . " Exhibition has been deleted by Admin";
			$this->Product_model->cancelofflinebookings('Admin', $remark);
			$this->Product_model->delete($table, $id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function stallog($table = NULL, $id = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['stalls'] = $this->Product_model->get_stall_by_link($id);
			$remark = $this->Global['stalls']->name . " Stall has been deleted by Admin";
			// print_r($this->Global['stalls']);
			// echo $remark;
			// die();
			$this->Product_model->cancelofflinebookings('Admin', $remark);
			$this->Product_model->delete($table, $id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}


	public function globalsettings()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->view('admin/globalsettings', $this->Global);
		}
	}

	public function editsettings()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$value = $_POST['value'];
				$this->Global_model->editsettings($name, $value);
			}
			redirect('admin/globalsettings');
		}
	}

	public function change_password()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->view('admin/change-password');
		}
	}


	function dragDropUploadGallery()
	{
		if (!empty($_FILES)) {
			// File upload configuration 
			$config['upload_path']          = FCPATH . 'assets/front/images/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|webp|svg';

			// Load and initialize upload library 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to the server 
			if ($this->upload->do_upload('file')) {
				$configer =  array(
					'image_library' => 'gd2',
					'source_image'  =>  $this->upload->data()['full_path'],
					'maintain_ratio' =>  TRUE,
					'height'       =>  '1100',
					'new_image' => $this->upload->data()['full_path'],
				);
				$this->load->library('image_lib', $configer);
				$a = $this->image_lib->resize();
				if ($a == 1) {
					$fileData = $this->upload->data();
				}
				$fileData = $this->upload->data();
				$this->load->model('Global_model');
				$data['images'] = $this->Global_model->getgalleryimage();
				$images = $this->Global_model->savegalleryimages($fileData['file_name']);
			}
		}
	}

	function dragDropUpload($link)
	{
		if (!empty($_FILES)) {
			// File upload configuration 
			$config['upload_path']          = FCPATH . 'assets/front/images/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|webp|svg';

			// Load and initialize upload library 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to the server 
			if ($this->upload->do_upload('file')) {
				$configer =  array(
					'image_library' => 'gd2',
					'source_image'  =>  $this->upload->data()['full_path'],
					'maintain_ratio' =>  TRUE,
					'height'       =>  '1100',
					'new_image' => $this->upload->data()['full_path'],
				);
				$this->load->library('image_lib', $configer);
				$a = $this->image_lib->resize();
				if ($a == 1) {
					$fileData = $this->upload->data();
				}
				$fileData = $this->upload->data();
				$this->load->model('Product_model');
				$images = $this->Product_model->getimages($link);
				$target_value = $fileData['file_name'];
				if ($images->images == "[]") {
					$a = trim($images->images, "]") . json_encode($target_value) . "]";
				} else {
					$a = (trim($images->images, "]") . "," . json_encode($target_value)) . "]";
				}
				$insert = $this->Product_model->saveimage($link, $a);
			}
		}
	}

	public function gallerys()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['sliders'] = $this->Global_model->getgallery();
			$this->load->view('admin/add-gallery-drag', $this->Global);
		}
	}

	public function addimages($link)
	{
		if (!empty($_FILES)) {
			$config['upload_path']          = FCPATH . 'assets/front/images/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|webp|svg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) {
				$fileData = $this->upload->data();
				$this->load->model('Product_model');
				$images = $this->Product_model->getimages($link);
				$target_value = $fileData['file_name'];
				if ($images->images == "[]") {
					$a = trim($images->images, "]") . json_encode($target_value) . "]";
				} else {
					$a = (trim($images->images, "]") . "," . json_encode($target_value)) . "]";
				}
				$insert = $this->Product_model->saveimage($link, $a);
			}
		}
		$this->load->model('Product_model');
		$result = $this->Product_model->getimages($link);
		$this->Global['link'] = $link;
		$this->Global['images'] = json_decode($result->images, true);
		
		$this->Global['exhinition'] = $this->Product_model->get_exhibition($link);
		$this->Global['title'] = $this->Global['exhinition']->name." (".$this->Global['exhinition']->start_date." - ".$this->Global['exhinition']->end_date.")";
		$this->load->view('admin/images', $this->Global);
	}

	public function removegalleryimages($link, $id)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$a = unlink(FCPATH . 'assets/front/images/' . $link);
			$this->load->model('Project_model');
			$this->Project_model->removegalleryimages($id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function removeimage($link = NULL, $row = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$images = $this->Product_model->getimages($link);
			$target_value = $row;
			$a = "";
			$array = (json_decode($images->images));
			foreach ($array as $key => $value) {
				if ($value == $target_value) {
					unset($array[$key]);
				} else {
					$a = $a . json_encode($value) . ",";
				}
			}
			$a = "[" . (trim($a, ",")) . "]";
			$this->Product_model->saveimage($link, $a);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function blogs()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['blogs'] = $this->Blog_model->getblogs();
			$this->load->view('admin/blogs', $this->Global);
		}
	}

	public function addblog()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$title = $_POST['post_title'];
				$table = "blog";
				$field = "link";
				$data['link'] =  $this->create_slug($title, $table, $field);

				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Blog_model->addblog($data);
			}
			// $this->Global['categories'] = $this->Product_model->getmaincategories();
			$this->load->view('admin/add-blog', $this->Global);
		}
	}

	public function editblog($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->Blog_model->editpost($slug, $data);
			}
			$blog = $this->Blog_model->getblogs('id', $slug);
			$this->Global['blog'] = $blog[0];
			// $this->Global['categories'] = $this->Product_model->getmaincategories();
			$this->load->view('admin/edit-blog', $this->Global);
		}
	}

	public function removeblog($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {

			$this->Blog_model->removeimg('blog', 'image', 'link', $link);
			echo ("done");
		}
	}

	public function removeimg($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {

			$this->Blog_model->removeimg('exhibition', 'image', 'link', $link);
			echo ("done");
		}
	}
	public function removefeatured_image($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {

			$this->Blog_model->removeimg('exhibition', 'featured_image', 'link', $link);
			echo ("done");
		}
	}

	public function categories()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['categories'] = $this->Product_model->getmaincategories();
			$this->Global['title'] = "Categories";
			$this->load->view('admin/category', $this->Global);
		}
	}

	public function addcategory()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {

				$title = $_POST['name'];
				$table = "category";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->addcategory($data);
			}
			$this->load->model('Product_model');
			$this->Global['categories'] = $this->Product_model->getmaincategories();
			$this->load->view('admin/add-category', $this->Global);
		}
	}

	public function editcategory($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->editcategory($data);
				redirect('admin/categories');
			}
			$this->load->model('Product_model');
			$this->Global['categories'] = $this->Product_model->getmaincategories();
			$category = $this->Product_model->get_category($slug);
			$this->Global['cat'] = json_decode(json_encode($category), true);
			$this->load->view('admin/edit-category', $this->Global);
		}
	}

	public function form()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$query = $this->db->query("Select * from form order by id desc");
			$this->Global['contacts'] = $query->result_array();
			$this->load->view('admin/contact', $this->Global);
		}
	}

	public function contactdetails($req)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$query = $this->db->query("Select * from form where id='$req'");
			$this->Global['message'] = $query->row_array();
			$this->load->view('admin/contact-details', $this->Global);
		}
	}

	public function enquiry()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$query = $this->db->query("Select * from enquiry order by id desc");
			$this->Global['contacts'] = $query->result_array();
			$this->load->view('admin/enquiry', $this->Global);
		}
	}

	public function enquirydetails($req)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$query = $this->db->query("Select * from enquiry where id='$req'");
			$this->Global['message'] = $query->row_array();
			$this->load->view('admin/enquiry-details', $this->Global);
		}
	}


	public function stalls($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['stalls'] = $this->Product_model->getstalls($link);
			$this->Global['exhinition'] = $this->Product_model->get_exhibition_by_id($link);
			$this->Global['title'] = $this->Global['exhinition']->name." (".$this->Global['exhinition']->start_date." - ".$this->Global['exhinition']->end_date.")";
			$this->Global['link'] = $link;
			$this->load->view('admin/stalls', $this->Global);
		}
	}
	public function addstall($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {

				$title = $_POST['name'];
				$table = "exhibition";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);

				$data = $_POST;
				$data['exhibition'] = $link;
				$data['link'] = $slug;
				$data['stalls'] = json_encode($_POST['stalls']);

				unset($data["submit"]);
				$this->load->model('Product_model');
				$remark = $_POST['name'] . " Stall has been created by Admin";
				$this->Product_model->cancelofflinebookings('Admin', $remark);
				$this->Admin_model->addstall($data);
			}
			$this->load->model('Product_model');
			$stalls = $this->Product_model->getstalls($link);
			$seats = array();
			foreach ($stalls as $stall) {
				$seats = array_merge(json_decode($stall['stalls']), $seats);
			}
			$this->Global['exhinition'] = $this->Product_model->get_exhibition_by_id($link);
			$this->Global['title'] = $this->Global['exhinition']->name." (".$this->Global['exhinition']->start_date." - ".$this->Global['exhinition']->end_date.")";
			$this->Global['stalls'] = array_diff(range(1, 150), $seats);  // set max number of stalls
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->load->view('admin/add-stall', $this->Global);
		}
	}

	public function editstall($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['stalls'] = json_encode($_POST['stalls']);
				unset($data["submit"]);
				$this->load->model('Admin_model');

				$remark = $_POST['name'] . " Stall has been edited by Admin";
				$this->Product_model->cancelofflinebookings('Admin', $remark);

				$this->Admin_model->editstall($data);
				redirect('admin/exhibitions');
			}
			$this->load->model('Product_model');
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->Global['stall'] = $this->Product_model->get_stall($slug);
			$this->Global['bookedstalls'] = $this->Admin_model->getallorders($slug);
			// echo "<pre>";
			// print_r($this->Global['bookedstalls']);
			// die();

			$stalls = $this->Product_model->getstalls($this->Global['stall']->exhibition);
			$seats = array();
			foreach ($stalls as $stall) {
				$seats = array_merge(json_decode($stall['stalls']), $seats);
			}
			$this->Global['stalls'] = array_diff(range(1, 150), $seats); // set max number of stalls

			$this->Global['stalls'] = array_merge(json_decode($this->Global['stall']->stalls), $this->Global['stalls']);
			// $this->Global['cat'] = json_decode(json_encode($exhibition), true);
			$this->load->view('admin/edit-stall', $this->Global);
		}
	}

	public function exhibitions()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->Global['title'] = "Exhibitions";
			$this->load->view('admin/exhibitions', $this->Global);
		}
	}

	public function addexhibition()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {

				$title = $_POST['name'];
				$table = "exhibition";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				if ($_POST['featured'] != "on") {
					$_POST['featured'] = NULL;
				}
				$data = $_POST;
				$data['link'] = $slug;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];

				$featured_image = $this->upload('featured_image', 'images');
				$data['featured_image'] = $featured_image['file_name'];

				unset($data["submit"]);
				$this->load->model('Product_model');
				$remark = $title . " Exhibition  has been created by  Admin";
				$this->Product_model->cancelofflinebookings('Admin', $remark);
				$this->Admin_model->addexhibition($data);
			}
			$this->load->model('Product_model');
			$this->load->view('admin/add-exhibition', $this->Global);
		}
	}

	public function editexhibition($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {

				if ($_POST['featured'] != "on") {
					$_POST['featured'] = NULL;
				}
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				if (!empty($_FILES['featured_image']['name'])) {
					$featured_image = $this->upload('featured_image', 'images');
					$data['featured_image'] = $featured_image['file_name'];
				}
				unset($data["submit"]);
				$this->load->model('Product_model');

				$remark = $_POST['name'] . " Exhibition  has been edited by Admin";
				$this->Product_model->cancelofflinebookings('Admin', $remark);
				$this->Admin_model->editexhibition($data);
				redirect('admin/exhibitions');
			}
			$this->load->model('Product_model');
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$exhibition = $this->Product_model->get_exhibition($slug);
			$this->Global['cat'] = json_decode(json_encode($exhibition), true);
			$this->load->view('admin/edit-exhibition', $this->Global);
		}
	}

	public function vgallery()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['sliders'] = $this->Global_model->getvideogallery();
			$this->load->view('admin/vgallery', $this->Global);
		}
	}

	public function addvideogallery()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = rand(100, 10000);
				$table = "slider";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$this->Global = $_POST;
				$this->Global['location'] = 'vgallery';
				$this->Global['link'] = $slug;
				//$image = $this->upload('image', '');
				//$this->Global['image'] = $_POST['value'];
				unset($this->Global["submit"]);
				$this->Global_model->addvideogallery($this->Global);
			}
			// $this->Global['sliders'] = $this->Global_model->getgallery();
			$this->load->view('admin/add-gallery-video', $this->Global);
		}
	}

	public function editvideogallery($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$this->Global = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', '');
					$this->Global['image'] = $image['file_name'];
				}
				unset($this->Global["submit"]);
				$a = $this->Global_model->editvideogallery($this->Global);
				redirect('admin/vgallery');
			}
			$slider = $this->Global_model->getgalleryvideo($link);
			$this->Global['slider'] = $slider[0];
			$this->load->view('admin/edit-video', $this->Global);
		}
	}

	public function sliders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['sliders'] = $this->Global_model->getsliders();
			$this->load->view('admin/sliders', $this->Global);
		}
	}

	public function addsliders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = rand(100, 10000);
				$table = "slider";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['location'] = 'slider';
				$data['link'] = $slug;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Global_model->addsliders($data);
				redirect('admin/sliders');
			}
			$this->Global['sliders'] = $this->Global_model->getsliders();
			$this->load->view('admin/add-sliders', $this->Global);
		}
	}

	public function editslider($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['location'] = 'slider';
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->Global_model->editsliders($data);
				redirect('admin/sliders');
			}
			$slider = $this->Global_model->getslider($link);
			$this->Global['slider'] = $slider[0];
			$this->load->view('admin/edit-slider', $this->Global);
		}
	}
	public function removeslider($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global_model->removeimg('slider', $link);
			echo ("done");
		}
	}

	public function addreview()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Admin_model->addreview($data);
			}
			$this->load->view('admin/add-review');
		}
	}

	public function editreviews($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->Admin_model->editreview($slug, $data);
			}
			$review = $this->Admin_model->getreviews('id', $slug);
			$data['review'] = $review[0];
			$this->load->view('admin/edit-review', $data);
		}
	}

	public function removereviews($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removeimg('reviews', $link);
			echo ("done");
		}
	}

	public function reviews()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$data['reviews'] = $this->Admin_model->getreviews();
			$this->load->view('admin/reviews', $data);
		}
	}

	public function coupons()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$data['coupons'] = $this->Product_model->getcoupons();
			$this->load->view('admin/coupons', $data);
		}
	}

	public function addcoupon()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$this->form_validation->set_rules('name', 'Coupon Name', 'trim|required|is_unique[coupons.name]');
				if ($this->form_validation->run() == true) {
					$data = $_POST;
					unset($data["submit"]);
					$this->Admin_model->addcoupon($data);
				}
			}
			$this->load->view('admin/add-coupon');
		}
	}

	public function editcoupon($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data["submit"]);
				$this->Admin_model->editcoupon($data);
				redirect('admin/coupons');
			}
			$this->load->model('Product_model');
			$data['coupon'] = $this->Product_model->getcoupon($slug);
			$this->load->view('admin/edit-coupon', $data);
		}
	}

	public function brands()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$data['sliders'] = $this->Global_model->getbrands();
			$this->load->view('admin/brands', $data);
		}
	}

	public function addbrands()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = rand(100, 10000);
				$table = "brands";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Admin_model->addbrands($data);
			}
			$this->load->view('admin/add-brand');
		}
	}

	public function editbrand($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				//$data['location'] = 'slider';
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->Admin_model->editbrand($data);
			}
			$brand = $this->Global_model->getbrand($slug);
			$data['slider'] = $brand[0];
			$this->load->view('admin/edit-brand', $data);
		}
	}

	public function removebrand($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global_model->removeimg('brands', $link);
			echo ("done");
		}
	}

	public function orders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Admin_model');
			$this->Global['orders'] = array_reverse($this->Admin_model->getallbookedsatalls());
			$this->Global['allexhibitions'] = $this->Product_model->getexhibitions();

			// $data['orders'] = $this->Orders_model->getorders();
			// $data['title'] = "All Order";
			$this->load->view('admin/orders', $this->Global);
		}
	}

	public function todaysorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$data['orders'] = $this->Orders_model->todaysorders();
			$data['title'] = "Today's Order";
			$this->load->view('admin/orders', $data);
		}
	}

	public function pendingorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Pending";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Pending Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function confirmedorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Confirm";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Confirm Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function dispatchorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Dispatch";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Dispatch Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function transitorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Transit";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Transit Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function deliveredorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Delivered";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Delivered Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function cancelledorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Cancelled";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Cancelled Order";
			$this->load->view('admin/orders', $data);
		}
	}

	public function orderdetails($orderid)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			if (isset($_POST['order_id'])) {
				$data = $_POST;
				$this->Orders_model->change_status($data);
				$order = $this->Orders_model->getorder($orderid)[0];
				$data['toemail'] = $order['userEmail'];
				$data['subject'] = $order['order_id'] . ' has been ' . $order['status'];
				$mail_message = 'Dear ' . $order['userName'] . ',' . "<br/>";
				$mail_message .= 'We would like to inform you that your order (' . $order['order_id'] . ') has been ' . $order['status'];
				if ($order['status'] == 'Dispatch') {
					$mail_message .= '<br/>The tracking id is <strong>' . $order['tracking_id'] . '</strong> <br/> The tracking url is ' . $order['tracking_url'];
				}
				$mail_message .= '<br/>Thanks & Regards';
				$mail_message .= '<br/> ' . sitename;
				$data['message'] = $mail_message;
				$this->Admin_model->send_mail($data);
			}
			$data = $this->Global;
			$data['items'] = $this->Orders_model->getitems($orderid);
			$data['order'] = $this->Orders_model->getorder($orderid)[0];
			$this->load->model('User_model');
			//  $data['order']['shippingAddress'] = $this->User_model->getaddress($data['order']['shippingAddress']);
			//  $data['order']['billingAddress'] = $this->User_model->getaddress($data['order']['billingAddress']);
			$data['gst'] = $this->Global['gst'];
			$result = $this->Global_model->seen("orders", $orderid);
			$this->load->view('admin/orderdetails', $data);
		}
	}

	public function offline()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['stalls'] = $this->Product_model->getofflinebookedstalls();

			$this->Global['exhibitions'] = $this->Admin_model->offline_exhibition();
			// echo "<pre>";
			// print_r($this->Global['exhibitions']);
			// die();
			$this->load->view('admin/offline', $this->Global);
		}
	}

	public function booked($req)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['customers'] = $this->User_model->getalluser();
			$this->Global['allexhibitions'] = $this->Product_model->getexhibitions();
			$this->Global['exhibitions'] = $this->Admin_model->booked($req);

			$this->Global['exhibition'] = $this->Product_model->get_exhibition_by_id($req);
			$this->Global['stalls'] = $this->Product_model->getstalls($this->Global['exhibition']->id);
			$this->Global['bookedstalls'] = $this->Product_model->getbookedstalls($this->Global['exhibition']->id);
			$this->Global['title'] = $this->Global['exhibition']->name." (".$this->Global['exhibition']->start_date." - ".$this->Global['exhibition']->end_date.")";

			$this->load->view('admin/booked', $this->Global);
		}
	}
	public function profile($req)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {

			$this->Global['transcations'] = $this->Order_model->get_transactions_by_id($req);
			$this->Global['account'] = $this->User_model->getdata($req);

			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->Global['orders'] = $this->Admin_model->getorders($req);
			$this->Global['users'] = $this->User_model->getdata($req);
			$this->load->view('admin/profile', $this->Global);
		}
	}

	public function bookstalls()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				// echo "<pre>";
				// print_r($data['stall_number']);
				// $final_data = array();
				foreach ($data['stall_number'] as $value) {
					// echo $value."<br>";
					$final_data['booking_date'] = $data['booking_date'];
					$final_data['booked_by'] = $data['booked_by'];
					$final_data['exhibition_id'] =  $data['exhibition_id'];
					$final_data['stall_id'] = $data['stall_id'];
					$final_data['modeofpayment'] = $data['modeofpayment'];
					$final_data['stall_number'] =  $value;
					$final_data['remark'] = $data['remark'];

					$this->Global['exhibitions'] = $this->Product_model->get_exhibition_by_id($data['exhibition_id']);
					$remark = "Stall Number " . $final_data['stall_number'] . " of " . $this->Global['exhibitions']->name . " has been booked offlined by Admin";
					$this->Product_model->walletlog('Admin', $remark);
					// echo $remark;
					// die();
					// print_r($final_data['stall_number']);
					// print_r($final_data);

					$this->Admin_model->addbookstalls($final_data);
				}
				redirect('admin/offline');
				// echo "success";
				// die();
				// unset($data["submit"]);
			}

			$this->Global['exhibitions'] = $this->Admin_model->offline_exhibition();

			// $this->load->model('Product_model');
			// $this->Global['stalls'] = $this->Product_model->getstalls();
			// $this->Global['title'] = "Stalls";
			$this->load->view('admin/bookstall', $this->Global);
		}
	}

	public function getstalls()
	{
		$exhibition = $_POST["exhibition"];
		$this->Global['stalls'] = $this->Product_model->getstalls($exhibition);
		echo ('<option value="">Select Stalls</option>');
		foreach ($this->Global['stalls'] as $stall) {
			echo ('<option value="' . $stall['id'] . '">' . $stall['name'] . '</option>');
		}
	}

	public function getonestalls()
	{
		$stall = $_POST["stall"];
		$this->Global['stallss'] = $this->Product_model->getonestalls($stall);
		$this->Global['bookedstalls'] = $this->Product_model->getbookedstall($stall);
		$final = array();
		foreach ($this->Global['stallss'] as $stall) {
			$data = array();
			foreach ($this->Global['bookedstalls'] as $bookedstall) {
				$data[] = $bookedstall['stall_number'];
			}
			$final = array_diff(json_decode($stall['stalls']), $data);
		}
		foreach ($final as $finals) {
			echo ('<option value="' . $finals . '">' . $finals . '</option>');
		}
	}

	public function getonestallsprice()
	{
		$stall = $_POST["stall"];
		$this->Global['stallss'] = $this->Product_model->getonestallsprice($stall);
		echo $this->Global['stallss']['price'];
	}

	// public function cancelorder($link,$id,$wallet,$exhibition_id,$stall_number)
	public function cancelorder($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$order = $this->Product_model->getstall($link);
			$query = $this->db->query("Select wallet from users where id = " . $order['user_id']);
			$price = $query->row_array();
			$finalprice = ((float)$price['wallet'] + (float)$order['wallet']);
			$this->Product_model->updatewallet($order['user_id'], $finalprice);
			$this->Product_model->canceltranscation($order['user_id'], ((float)$order['price'] - (float)$order['wallet']), $order['exhibition_id'], $order['stall_number'], ' is processed and will reach to your payment source soon.');
			if ($order['wallet'] != 0) {
				$this->Product_model->canceltranscation($order['user_id'], $order['wallet'], $order['exhibition_id'], $order['stall_number'], ' is credited to your wallet', 'Wallet');
			}

			$this->Global['stalls'] = $this->Product_model->getstall($link);
			$this->Global['exhibitions'] = $this->Product_model->get_exhibition_by_id($this->Global['stalls']['exhibition_id']);
			$remark = "Stall Number " . $this->Global['stalls']['stall_number'] . " of Exhibition " . $this->Global['exhibitions']->name . " has been cancelled by Admin";
			$this->Product_model->cancelofflinebookings('Admin', $remark);

			$this->Product_model->cancelorder($link, 'admin');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function bookstallsforuser($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {

			if (isset($_POST['submit'])) {
				$data = $_POST;
				// echo "<pre>";
				// print_r($_POST);
				// die();
				// $final_data = array();
				$a = count($data['stall_number']);
				$wallet = '';
				if (isset($_POST['isChecked'])) {
					$wallet = $_POST['wallet_deduction'] / $a;
				}
				$discount = $_POST['discount'] / $a;
				foreach ($data['stall_number'] as $value) {
					// echo $value."<br>";
					$final_data['booking_date'] = $data['booking_date'];
					$final_data['booked_by'] = $data['booked_by'];
					$final_data['exhibition_id'] =  $data['exhibition_id'];
					$final_data['stall_id'] = $data['stall_id'];
					$final_data['stall_number'] =  $value;
					$final_data['remark'] = $data['remark'];
					$final_data['user_id'] = $data['user_id'];
					$final_data['modeofpayment'] = $data['modeofpayment'];
					$final_data['price'] = $data['price'] - $discount;
					$final_data['wallet'] = $wallet;

					$this->Global['account'] = $this->User_model->getdata($data['id']);
					$this->Global['exhibitions'] = $this->Product_model->get_exhibition_by_id($data['exhibition_id']);
					$remark = "Stall Number " . $final_data['stall_number'] . " of " . $this->Global['exhibitions']->name . " has been booked by Admin for user " . $this->Global['account']->email;
					$this->Product_model->walletlog('Admin', $remark);

					$this->Admin_model->addbookstalls($final_data);
					if ($wallet > 0) {
						$this->Product_model->purchasetranscation($final_data['user_id'], $wallet, $final_data['exhibition_id'], $final_data['stall_number'], "Wallet");
						$this->Product_model->purchasetranscation($final_data['user_id'], $final_data['price'] - $wallet, $final_data['exhibition_id'], $final_data['stall_number'], $data['modeofpayment']);
					} else {
						$this->Product_model->purchasetranscation($final_data['user_id'], $final_data['price'], $final_data['exhibition_id'], $final_data['stall_number'], $data['modeofpayment']);
					}
				}
				// echo $data['user_id'];
				// echo $data['final_wallet'];
				$this->Product_model->updatewallet($data['user_id'], $data['final_wallet']);
				// 	die();

				// 	$tdata = array();
				// $tdata['user_id'] = $data['user_id'];
				// $tdata['amount'] = $data['wallet_deduction'];
				// $tdata['remark'] = "Purchased Stalls";
				// $tdata['transcation_id'] = $data['user_id'].'PURCHASED'.$data['wallet_deduction'];
				// $this->Product_model->updattranscation($tdata);

				redirect('admin/profile/' . $data['user_id']);
				// echo "success";
				// die();
				// unset($data["submit"]);
			}

			$this->Global['exhibitions'] = $this->Admin_model->offline_exhibition();
			$query = $this->db->query("Select wallet from users where id = $link");
			$this->Global['price'] = $query->row_array();
			// $this->load->model('Product_model');
			// $this->Global['stalls'] = $this->Product_model->getstalls();
			$this->Global['user_id'] = $link;
			$this->load->view('admin/bookstallsforuser', $this->Global);
		}
	}







	// staff controller functions

	public function staff()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			// if(empty($this->session->userdata('isAdminLoggedIn'))){
			redirect(base_url());
		}
		$data['staff'] = $this->Admin_model->getstaff();
		$data['title'] = "Staff";
		$this->load->view('admin/staff', $data);
	}

	public function editstaff($staff)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data["submit"]);
				$this->Staff_model->updateStaff($data);
				$this->session->set_flashdata('success_msg', 'Staff Updated successfully');
				redirect('admin/staff');
			}
			$staffdetails = $this->Admin_model->getstaffuser($staff);
			$data['roles'] = $this->Admin_model->getroles();
			$data['staff'] = json_decode(json_encode($staffdetails), true);
			$this->load->view('admin/edit-staff', $data);
		}
	}

	public function addstaff($param = '')
	{
		if (empty($this->session->userdata('isAdminLoggedIn'))) {
			redirect(base_url());
		}
		if (isset($_POST['submit'])) {
			$data = array(
				'name' => $this->input->post('name'),
				'role' => $this->input->post('role'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'password' => sha1($this->input->post('password')),
				'status' => 1
			);
			$this->Admin_model->addstaff($data);
			$this->session->set_flashdata('success_msg', 'New Staff added successfully');
			redirect(base_url() . 'admin/staff', 'refresh');
		}
		$this->Global['roles'] = $this->Admin_model->getroles();
		$this->load->view('admin/add-staff', $this->Global);
	}

	public function changepassword($param = '')
	{
		if (isset($_POST['password'])) {
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() == true) {
				$con = array(
					'returnType' => 'single',
					'conditions' => array(
						'id' => $this->input->post('id'),
						// 'password' => sha1($this->input->post('oldpassword')),
					)
				);
				$checkLogin = $this->Staff_model->getStaff($con);
				if ($checkLogin) {
					$data['id'] = $this->input->post('id');
					$data['password'] = sha1($this->input->post('password'));
					$this->Staff_model->updateStaff($data);
					$this->session->set_flashdata('success_msg', ' Password Changed Successfully.');
					redirect(base_url() . 'admin/staff', 'refresh');
				} else {
					$this->session->set_flashdata('error_msg', ' Wrong password, please try again.');
				}
			} else {
				$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
			}
		}
		$staff = $this->db->get_where('staff', array('id' => $param))->row_array();
		$this->Global['staff'] = $staff;

		$this->load->view('admin/changepassword', $this->Global);
	}

	public function roles($param = '', $param1 = '', $param2 = '')
	{
		if (empty($this->session->userdata('isAdminLoggedIn'))) {
			redirect(base_url());
		}
		$this->Global['roles'] = $this->Admin_model->getroles();
		$this->Global['title'] = "Roles";
		$this->load->view('admin/roles', $this->Global);
	}

	public function addrole($param = '')
	{
		if (empty($this->session->userdata('isAdminLoggedIn'))) {
			redirect(base_url());
		}
		if (isset($_POST['submit'])) {
			$title = $_POST['role_name'];
			$table = "roles";
			$field = "link";
			$slug =  $this->create_slug($title, $table, $field);
			$data = array(
				'role_name' => $this->input->post('role_name'),
				'link' => $slug,
				'status' => 1,
				'permissions' => implode(',', $this->input->post('permissions')),
				'date' => date('d-m-Y h:i:s')
			);
			$result = $this->Admin_model->addrole($data);
			if ($result > 0) {
				$this->session->set_flashdata('success_msg', 'New Role added successfully');
				redirect(base_url() . 'admin/roles', 'refresh');
			} else {
				$this->session->set_flashdata('error_msg', 'Something went wrong, Try again');
				redirect(base_url() . 'admin/roles', 'refresh');
			}
		}
		$this->Global['allpermissions'] = $this->Admin_model->getallpermissions();
		$this->load->view('admin/role-add', $this->Global);
	}

	public function editrole($param = '')
	{
		if (empty($this->session->userdata('isAdminLoggedIn'))) {
			redirect(base_url());
		}

		if (isset($_POST['submit'])) {
			$data['link'] = $this->input->post('link');
			$data['role_name'] = $this->input->post('role_name');
			if ($this->input->post('permissions') == NULL) {
				$data['permissions'] = NULL;
			} else {
				$data['permissions'] = implode(',', $this->input->post('permissions'));
			}
			$this->Admin_model->editrole($data);
			$this->session->set_flashdata('success_msg', 'Role edited successfully');
			redirect(base_url() . 'admin/roles', 'refresh');
		}

		$user_permission = $this->db->get_where('roles', array('link' => $param))->row_array();
		$this->Global['userpermissions'] = explode(',', $user_permission['permissions']);
		$this->Global['cat'] = $user_permission;
		$this->Global['allpermissions'] = $this->Admin_model->getallpermissions();
		$this->load->view('admin/role-edit', $this->Global);
	}


	public function editwallet()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$tdata = array();
			if (isset($_POST['debit'])) {
				$data = $_POST;
				$data['wallet'] = $_POST['wallet'];
				$this->Product_model->subeditwallet($data['id'], $data['wallet']);
				$tdata['user_id'] = $data['id'];
				$tdata['remark'] = $data['remark'];
				// $tdata['remark'] = 'Money debited in wallet';
				$tdata['amount'] = $_POST['wallet'];
				$tdata['modeofpayment'] = 'Wallet';
				$tdata['transcation_id'] =  $data['id'] . 'DEBIT' . $_POST['wallet'];
				unset($data['addmoney']);

				$this->Global['account'] = $this->User_model->getdata($data['id']);
				$remark = "₹ " . $_POST['wallet'] . " has been debited from user " . $this->Global['account']['email'] . " by Admin";
				$this->Product_model->walletlog('Admin', $remark);

				$this->Product_model->updattranscation($tdata);
				redirect($_SERVER['HTTP_REFERER']);
			}
			if (isset($_POST['credit'])) {
				$data = $_POST;
				$data['wallet'] = $_POST['wallet'];
				$this->Product_model->addeditwallet($data['id'], $data['wallet']);
				$tdata['user_id'] = $data['id'];
				$tdata['remark'] = $data['remark'];
				// $tdata['remark'] = 'Money credited in wallet';
				$tdata['amount'] = $_POST['wallet'];
				$tdata['transcation_id'] =  $data['id'] . 'CREDIT' . $_POST['wallet'];
				unset($data['addmoney']);
				$this->Global['account'] = $this->User_model->getdata($data['id']);
				$remark = "₹ " . $_POST['wallet'] . " has been credited from user " . $this->Global['account']['email'] . " by Admin";
				$this->Product_model->walletlog('Admin', $remark);
				$this->Product_model->updattranscation($tdata);
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function book_stalls_online($exhibitionid = NULL, $stall_number = NULL, $price = NULL)
	{
		$this->Global['exhibitions'] = $this->Product_model->get_exhibition_by_id($exhibitionid);
		$this->Global['users'] = $this->User_model->getalluser();
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['exhibition_id'] = $exhibitionid;
				$data['stall_number'] = $stall_number;
				$data['amount'] = $price;
				echo "<pre>";
				print_r($data);
				die();
			}
		}

		$this->load->view('admin/book-stalls-online', $this->Global);
	}

	public function getwalletamount()
	{
		$user = $_POST["user"];
		$this->Global['userinfo'] = $this->Product_model->getwalletamount($user);
		echo $this->Global['userinfo']['wallet'];
	}

	public function logs()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['logs'] = $this->Product_model->getlogs();
			$this->load->view('admin/logs', $this->Global);
		}
	}
}
