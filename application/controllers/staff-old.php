<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Load form validation ibrary & user model 
		$this->load->library('form_validation');
		$this->load->model('Staff_model');
		$this->load->model('Blog_model');
		$this->load->model('Admin_model');

		// Staff login status 
		$this->isStaffLoggedIn = $this->session->userdata('isStaffLoggedIn');
		$this->Global = $this->Global_model->getdata();
		if (isset($_SESSION['user_role'])) {
			$permis = $this->db->get_where('roles', array('role_name' => $this->session->userdata('user_role')))->row_array();
			$this->Global['permissions'] = explode(',', $permis['permissions']);
		}
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if (isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/dashboard');
		} else {
			redirect('staff/login');
		}
	}

	public function dashboard()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('dashboard', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				// $products = $this->db->query("Select * from product");
				// $this->Global['totalproducts'] = $products->num_rows();
				// $this->Global['products'] = $this->Staff_model->getproducts();
				// $totalcategory = $this->db->query("Select * from category where parent = ''");
				// $this->Global['totalcategory'] = $totalcategory->num_rows();
				// $totalcars = $this->db->query("Select * from car");
				// $this->Global['totalcars'] = $totalcars->num_rows();
				// $totalcar_category = $this->db->query("Select * from car_category");
				// $this->Global['totalcar_category'] = $totalcar_category->num_rows();
				// $totalfarms = $this->db->query("Select * from farm");
				// $this->Global['totalfarms'] = $totalfarms->num_rows();
				// $totalfarm_category = $this->db->query("Select * from farm_category");
				// $this->Global['totalfarm_category'] = $totalfarm_category->num_rows();
				$this->load->view('staff/dashboard', $this->Global);
			}
		}
	}

	public function customers()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('customers', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['customers'] = $this->User_model->getalluser();
				// echo "<pre>";
				// print_r($this->Global['customers']);
				// die();
				$this->load->view('staff/customer', $this->Global);
			}
		}
	}

	public function order_history($req)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('order_history', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
				$this->Global['orders'] = $this->Admin_model->getorders($req);
				// echo "<pre>";
				// print_r($this->Global['orders']);
				// die();
				// $this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
				$this->load->view('staff/userorder', $this->Global);
			}
		}
	}

	public function login()
	{
		if (isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/dashboard');
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
					$checkLogin = $this->Staff_model->getRows($con);
					if ($checkLogin) {
						$this->session->set_userdata('isStaffLoggedIn', TRUE);
						$this->session->set_userdata('userId', $checkLogin['id']);
						$this->session->set_userdata('staffEmail', $checkLogin['email']);
						$this->session->set_userdata('user_role', $checkLogin['role']);
						redirect('staff/dashboard/');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong email or password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}

			// Load view 
			$this->load->view('staff/sign-in', $this->Global);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('isStaffLoggedIn');
		$this->session->unset_userdata('userId');
		$this->session->sess_destroy();
		redirect('staff/login');
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
				redirect(base_url() . 'staff/login', 'refresh');
			}
		}
		$this->load->view('staff/forgot');
	}

	public function upload($file, $dir = 'images')
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
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
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
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
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->activate($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function deactivate($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->deactivate($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->delete($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}


	public function globalsettings()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('globalsettings', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->view('staff/globalsettings', $this->Global);
			}
		}
	}

	public function editsettings()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$value = $_POST['value'];
				$this->Global_model->editsettings($name, $value);
			}
			redirect('staff/globalsettings');
		}
	}

	public function change_password()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->load->view('staff/change-password');
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
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('gallerys', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['sliders'] = $this->Global_model->getgallery();
				$this->load->view('staff/add-gallery-drag', $this->Global);
			}
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
		$this->load->view('staff/images', $this->Global);
	}

	public function removeimage($link = NULL, $row = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
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
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('blogs', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['blogs'] = $this->Blog_model->getblogs();
				$this->load->view('staff/blogs', $this->Global);
			}
		}
	}

	public function addblog()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addblog', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
				$this->load->view('staff/add-blog', $this->Global);
			}
		}
	}

	public function editblog($slug)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editblog', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
				$this->load->view('staff/edit-blog', $this->Global);
			}
		}
	}

	public function removeblog($link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {

			$this->Blog_model->removeimg('blog', 'image', 'link', $link);
			echo ("done");
		}
	}

	public function removeimg($link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {

			$this->Blog_model->removeimg('exhibition', 'image', 'link', $link);
			echo ("done");
		}
	}
	public function removefeatured_image($link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {

			$this->Blog_model->removeimg('exhibition', 'featured_image', 'link', $link);
			echo ("done");
		}
	}

	public function categories()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->load->model('Product_model');
			$this->Global['categories'] = $this->Product_model->getmaincategories();
			$this->Global['title'] = "Categories";
			$this->load->view('staff/category', $this->Global);
		}
	}

	public function addcategory()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
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
			$this->load->view('staff/add-category', $this->Global);
		}
	}

	public function editcategory($slug)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->editcategory($data);
				redirect('staff/categories');
			}
			$this->load->model('Product_model');
			$this->Global['categories'] = $this->Product_model->getmaincategories();
			$category = $this->Product_model->get_category($slug);
			$this->Global['cat'] = json_decode(json_encode($category), true);
			$this->load->view('staff/edit-category', $this->Global);
		}
	}

	public function form()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$query = $this->db->query("Select * from form order by id desc");
			$this->Global['contacts'] = $query->result_array();
			$this->load->view('staff/contact', $this->Global);
		}
	}

	public function contactdetails($req)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$query = $this->db->query("Select * from form where id='$req'");
			$this->Global['message'] = $query->row_array();
			$this->load->view('staff/contact-details', $this->Global);
		}
	}

	public function enquiry()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$query = $this->db->query("Select * from enquiry order by id desc");
			$this->Global['contacts'] = $query->result_array();
			$this->load->view('staff/enquiry', $this->Global);
		}
	}

	public function enquirydetails($req)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$query = $this->db->query("Select * from enquiry where id='$req'");
			$this->Global['message'] = $query->row_array();
			$this->load->view('staff/enquiry-details', $this->Global);
		}
	}


	public function stalls($link)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('stalls', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Product_model');
				$this->Global['stalls'] = $this->Product_model->getstalls($link);
				$this->Global['title'] = "Stalls";
				$this->Global['link'] = $link;
				$this->load->view('staff/stalls', $this->Global);
			}
		}
	}
	public function addstall($link)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addstall', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
					$this->Admin_model->addstall($data);
				}
				$this->load->model('Product_model');
				$stalls = $this->Product_model->getstalls($link);
				$seats = array();
				foreach ($stalls as $stall) {
					$seats = array_merge(json_decode($stall['stalls']), $seats);
				}
				$this->Global['stalls'] = array_diff(range(1, 100), $seats);
				$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
				$this->load->view('staff/add-stall', $this->Global);
			}
		}
	}

	public function editstall($slug)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editstall', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				if (isset($_POST['submit'])) {
					$data = $_POST;
					$data['stalls'] = json_encode($_POST['stalls']);
					unset($data["submit"]);
					$this->load->model('Admin_model');
					$this->Admin_model->editstall($data);
					redirect('staff/exhibitions');
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
				$this->Global['stalls'] = array_diff(range(1, 100), $seats);

				$this->Global['stalls'] = array_merge(json_decode($this->Global['stall']->stalls), $this->Global['stalls']);
				// $this->Global['cat'] = json_decode(json_encode($exhibition), true);
				$this->load->view('staff/edit-stall', $this->Global);
			}
		}
	}
	// done
	public function exhibitions()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('exhibitions', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Product_model');
				$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
				$this->Global['title'] = "Exhibitions";
				$this->load->view('staff/exhibitions', $this->Global);
			}
		}
	}

	public function addexhibition()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addexhibition', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
					$this->Admin_model->addexhibition($data);
				}
				$this->load->model('Product_model');
				$this->load->view('staff/add-exhibition', $this->Global);
			}
		}
	}

	public function editexhibition($slug)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editexhibition', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
					$this->Admin_model->editexhibition($data);
					redirect('staff/exhibitions');
				}
				$this->load->model('Product_model');
				$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
				$exhibition = $this->Product_model->get_exhibition($slug);
				$this->Global['cat'] = json_decode(json_encode($exhibition), true);
				$this->load->view('staff/edit-exhibition', $this->Global);
			}
		}
	}

	public function vgallery()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('vgallery', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['sliders'] = $this->Global_model->getvideogallery();
				$this->load->view('staff/vgallery', $this->Global);
			}
		}
	}

	public function addvideogallery()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addvideogallery', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
				$this->load->view('staff/add-gallery-video', $this->Global);
			}
		}
	}

	public function editvideogallery($link)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editvideogallery', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				if (isset($_POST['submit'])) {
					$this->Global = $_POST;
					if (!empty($_FILES['image']['name'])) {
						$image = $this->upload('image', '');
						$this->Global['image'] = $image['file_name'];
					}
					unset($this->Global["submit"]);
					$a = $this->Global_model->editvideogallery($this->Global);
					redirect('staff/vgallery');
				}
				$slider = $this->Global_model->getgalleryvideo($link);
				$this->Global['slider'] = $slider[0];
				$this->load->view('staff/edit-video', $this->Global);
			}
		}
	}

	public function sliders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('sliders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['sliders'] = $this->Global_model->getsliders();
				$this->load->view('staff/sliders', $this->Global);
			}
		}
	}

	public function addsliders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addsliders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
					redirect('staff/sliders');
				}
				$this->Global['sliders'] = $this->Global_model->getsliders();
				$this->load->view('staff/add-sliders', $this->Global);
			}
		}
	}

	public function editslider($link)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editslider', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
					redirect('staff/sliders');
				}
				$slider = $this->Global_model->getslider($link);
				$this->Global['slider'] = $slider[0];
				$this->load->view('staff/edit-slider', $this->Global);
			}
		}
	}
	public function removeslider($link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->Global_model->removeimg('slider', $link);
			echo ("done");
		}
	}

	public function addreview()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addreview', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				if (isset($_POST['submit'])) {
					$data = $_POST;
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
					unset($data["submit"]);
					$this->Admin_model->addreview($data);
				}
				$this->load->view('staff/add-review');
			}
		}
	}

	public function editreviews($slug)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editreviews', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
				$this->load->view('staff/edit-review', $data);
			}
		}
	}

	public function removereviews($link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removeimg('reviews', $link);
			echo ("done");
		}
	}

	public function reviews()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('reviews', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['reviews'] = $this->Admin_model->getreviews();
				$this->load->view('staff/reviews', $this->Global);
			}
		}
	}

	public function coupons()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('coupons', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Product_model');
				$this->Global['coupons'] = $this->Product_model->getcoupons();
				$this->load->view('staff/coupons', $this->Global);
			}
		}
	}

	public function addcoupon()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addcoupon', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				if (isset($_POST['submit'])) {
					$this->form_validation->set_rules('name', 'Coupon Name', 'trim|required|is_unique[coupons.name]');
					if ($this->form_validation->run() == true) {
						$data = $_POST;
						unset($data["submit"]);
						$this->Admin_model->addcoupon($data);
					}
				}
				$this->load->view('staff/add-coupon');
			}
		}
	}

	public function editcoupon($slug)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editcoupon', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				if (isset($_POST['submit'])) {
					$data = $_POST;
					unset($data["submit"]);
					$this->Admin_model->editcoupon($data);
					redirect('staff/coupons');
				}
				$this->load->model('Product_model');
				$data['coupon'] = $this->Product_model->getcoupon($slug);
				$this->load->view('staff/edit-coupon', $data);
			}
		}
	}

	public function brands()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('brands', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['sliders'] = $this->Global_model->getbrands();
				$this->load->view('staff/brands', $this->Global);
			}
		}
	}

	public function addbrands()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('addbrands', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
				$this->load->view('staff/add-brand');
			}
		}
	}

	public function editbrand($slug)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editbrand', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
				$this->Global['slider'] = $brand[0];
				$this->load->view('staff/edit-brand', $this->Global);
			}
		}
	}

	public function removebrand($link = NULL)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			$this->Global_model->removeimg('brands', $link);
			echo ("done");
		}
	}

	public function orders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('orders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Admin_model');
				$this->Global['orders'] = $this->Admin_model->getallbookedsatalls();
				$this->Global['allexhibitions'] = $this->Product_model->getexhibitions();

				// $data['orders'] = $this->Orders_model->getorders();
				// $data['title'] = "All Order";
				$this->load->view('staff/orders', $this->Global);
			}
		}
	}

	public function todaysorders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('todaysorders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Orders_model');
				$data['orders'] = $this->Orders_model->todaysorders();
				$data['title'] = "Today's Order";
				$this->load->view('staff/orders', $data);
			}
		}
	}

	public function pendingorders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('pendingorders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Orders_model');
				$field = "status";
				$status = "Pending";
				$data['orders'] = $this->Orders_model->getorders($field, $status);
				$data['title'] = "Pending Order";
				$this->load->view('staff/orders', $data);
			}
		}
	}
	public function confirmedorders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('confirmedorders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Orders_model');
				$field = "status";
				$status = "Confirm";
				$data['orders'] = $this->Orders_model->getorders($field, $status);
				$data['title'] = "Confirm Order";
				$this->load->view('staff/orders', $data);
			}
		}
	}
	public function dispatchorders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('dispatchorders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Orders_model');
				$field = "status";
				$status = "Dispatch";
				$data['orders'] = $this->Orders_model->getorders($field, $status);
				$data['title'] = "Dispatch Order";
				$this->load->view('staff/orders', $data);
			}
		}
	}
	public function transitorders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('transitorders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Orders_model');
				$field = "status";
				$status = "Transit";
				$data['orders'] = $this->Orders_model->getorders($field, $status);
				$data['title'] = "Transit Order";
				$this->load->view('staff/orders', $data);
			}
		}
	}
	public function deliveredorders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('deliveredorders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Orders_model');
				$field = "status";
				$status = "Delivered";
				$data['orders'] = $this->Orders_model->getorders($field, $status);
				$data['title'] = "Delivered Order";
				$this->load->view('staff/orders', $data);
			}
		}
	}
	public function cancelledorders()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('cancelledorders', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Orders_model');
				$field = "status";
				$status = "Cancelled";
				$data['orders'] = $this->Orders_model->getorders($field, $status);
				$data['title'] = "Cancelled Order";
				$this->load->view('staff/orders', $data);
			}
		}
	}

	public function orderdetails($orderid)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('orderdetails', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
				$this->load->view('staff/orderdetails', $data);
			}
		}
	}

	public function offline()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('offline', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['stalls'] = $this->Product_model->getofflinebookedstalls();

				$this->Global['exhibitions'] = $this->Admin_model->offline_exhibition();
				// echo "<pre>";
				// print_r($this->Global['exhibitions']);
				// die();
				$this->load->view('staff/offline', $this->Global);
			}
		}
	}

	public function booked($req)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('booked', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->Global['allexhibitions'] = $this->Product_model->getexhibitions();
				$this->Global['exhibitions'] = $this->Admin_model->booked($req);
				$this->load->view('staff/booked', $this->Global);
			}
		}
	}

	public function bookstalls()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('bookstalls', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
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
						$final_data['stall_number'] =  $value;
						$final_data['remark'] = $data['remark'];

						// print_r($final_data['stall_number']);
						// print_r($final_data);
						$this->Admin_model->addbookstalls($final_data);
					}
					redirect('staff/offline');
					// echo "success";
					// die();
					// unset($data["submit"]);
				}

				$this->Global['exhibitions'] = $this->Admin_model->offline_exhibition();

				// $this->load->model('Product_model');
				// $this->Global['stalls'] = $this->Product_model->getstalls();
				// $this->Global['title'] = "Stalls";
				$this->load->view('staff/bookstall', $this->Global);
			}
		}
	}

	public function getstalls()
	{
		if (!in_array('getstalls', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
			$exhibition = $_POST["exhibition"];
			$this->Global['stalls'] = $this->Product_model->getstalls($exhibition);
			echo ('<option value="">Select Stalls</option>');
			foreach ($this->Global['stalls'] as $stall) {
				echo ('<option value="' . $stall['id'] . '">' . $stall['name'] . '</option>');
			}
		}
	}

	public function getonestalls()
	{
		if (!in_array('getonestalls', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
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
	}

	public function cancelorder($link, $id, $wallet, $exhibition_id, $stall_number)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('cancelorder', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				$this->load->model('Product_model');
				$this->Product_model->cancelorder($link);
				$query = $this->db->query("Select wallet from users where id = $id");
				$price = $query->row_array();
				// print_r($price);
				$finalprice = $price['wallet'] + $wallet;
				// print_r($wallet);
				// die();
				$this->Product_model->updatewallet($id, $finalprice);
				$this->Product_model->canceltranscation($id, $wallet, $exhibition_id, $stall_number);
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}





	// staff controller functions

	public function staff()
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			// if(empty($this->session->userdata('isStaffLoggedIn'))){
			redirect(base_url());
		}
		if (!in_array('staff', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
			$this->Global['staff'] = $this->Admin_model->getstaff();
			$this->Global['title'] = "Staff";
			$this->load->view('staff/staff', $this->Global);
		}
	}

	public function editstaff($staff)
	{
		if (!isset($_SESSION['isStaffLoggedIn'])) {
			redirect('staff/login');
		} else {
			if (!in_array('editstaff', $this->Global['permissions'])) {
				$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
				redirect('staff/dashboard');
			} else {
				if (isset($_POST['submit'])) {
					$data = $_POST;
					unset($data["submit"]);
					$this->Staff_model->updateStaff($data);
					$this->session->set_flashdata('success_msg', 'Staff Updated successfully');
					redirect('staff/staff');
				}
				$staffdetails = $this->Admin_model->getstaffuser($staff);
				$data['roles'] = $this->Admin_model->getroles();
				$data['staff'] = json_decode(json_encode($staffdetails), true);
				$this->load->view('staff/edit-staff', $data);
			}
		}
	}

	public function addstaff($param = '')
	{
		if (empty($this->session->userdata('isStaffLoggedIn'))) {
			redirect(base_url());
		}
		if (!in_array('addstaff', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
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
				redirect(base_url() . 'staff/staff', 'refresh');
			}
			$this->Global['roles'] = $this->Admin_model->getroles();
			$this->load->view('staff/add-staff', $this->Global);
		}
	}

	public function changepassword($param = '')
	{
		if (empty($this->session->userdata('isStaffLoggedIn'))) {
			redirect(base_url());
		}
		if (!in_array('addstaff', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
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
						redirect(base_url() . 'staff/staff', 'refresh');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}
			$staff = $this->db->get_where('staff', array('id' => $param))->row_array();
			$this->Global['staff'] = $staff;

			$this->load->view('staff/changepassword', $this->Global);
		}
	}

	public function roles($param = '', $param1 = '', $param2 = '')
	{
		if (empty($this->session->userdata('isStaffLoggedIn'))) {
			redirect(base_url());
		}
		if (!in_array('roles', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
			$this->Global['roles'] = $this->Admin_model->getroles();
			$this->Global['title'] = "Roles";
			$this->load->view('staff/roles', $this->Global);
		}
	}

	public function addrole($param = '')
	{
		if (empty($this->session->userdata('isStaffLoggedIn'))) {
			redirect(base_url());
		}
		if (!in_array('addrole', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
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
					redirect(base_url() . 'staff/roles', 'refresh');
				} else {
					$this->session->set_flashdata('error_msg', 'Something went wrong, Try again');
					redirect(base_url() . 'staff/roles', 'refresh');
				}
			}
			$this->Global['allpermissions'] = $this->Admin_model->getallpermissions();
			$this->load->view('staff/role-add', $this->Global);
		}
	}

	public function editrole($param = '')
	{
		if (empty($this->session->userdata('isStaffLoggedIn'))) {
			redirect(base_url());
		}
		if (!in_array('editrole', $this->Global['permissions'])) {
			$this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
			redirect('staff/dashboard');
		} else {
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
				redirect(base_url() . 'staff/roles', 'refresh');
			}

			$user_permission = $this->db->get_where('roles', array('link' => $param))->row_array();
			$this->Global['userpermissions'] = explode(',', $user_permission['permissions']);
			$this->Global['cat'] = $user_permission;
			$this->Global['allpermissions'] = $this->Admin_model->getallpermissions();
			$this->load->view('staff/role-edit', $this->Global);
		}
	}
}
