<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Blog_model');
		$this->load->model('Product_model');
		$this->load->model('User_model');
		$this->load->model('Order_model');
		$this->Global = $this->Global_model->getdata();
		$this->Global['blogs'] = $this->Blog_model->getblogs();
		$this->Global['categories'] = $this->Product_model->getmaincategories();
		$this->Global['sliders'] = $this->Global_model->getactivesliders();
		$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
		$this->Global['featuredexhibitions'] = $this->Product_model->getfeaturedexhibitions();
		$this->Global['upcomingexhibitions'] = $this->Product_model->getupcomingexhibitions();
		$this->Global['reviews'] = $this->Global_model->getactivereviews();
		$this->Global['coupons'] = $this->Global_model->getactivecoupons();
		$this->Global['brands'] = $this->Global_model->getbrands("1");

	}

	public function index()
	{
		$this->Global['blogs'] = $this->Blog_model->get_posts(3, 0);
		$this->load->view('front/index', $this->Global);
	}

	public function about()
	{
	    $this->Global['about'] = $this->Global_model->getpage("about")[0];
		$this->load->view('front/about', $this->Global);
	}
	public function gallery()
	{
		$this->Global['gallerys'] = $this->Global_model->getgallery();
		$this->load->view('front/gallery', $this->Global);
	}
	public function video()
	{
		$this->Global['videos'] = $this->Global_model->getactivevideogallery();
		$this->load->view('front/video', $this->Global);
	}

	public function contact()
	{
		$this->load->view('front/contact', $this->Global);
	}

	public function thanks()
	{
		$this->Global['title'] = "Thanks";
		$this->load->view('front/thanks', $this->Global);
	}

	public function error()
	{
		$this->load->view('front/404', $this->Global);
	}
	public function redirecterror()
	{
		redirect('error');
	}


	public function enquiry()
	{
		$data = $_POST;
		unset($data["submit"]);
		$this->Global_model->contact($data);
		$data['toemail'] = array('lead@gdigitalindia.com', 'gdigitalindialeads@gmail.com', admin_email);
		$data['subject'] = sitename . " Enquiry";
		$mail_message = sitename . " Enquiry";
		$mail_message .= "<br/>Name - " . $_REQUEST['name'];
		$mail_message .= "<br/>Email - " . $_REQUEST['email'];
		$mail_message .= "<br/>Mobile - " . $_REQUEST['mobile'];
		$mail_message .= "<br/>City - " . $_REQUEST['service'];
		$mail_message .= "<br/>Message - " . $_REQUEST['message'];
		$data['message'] = $mail_message;
		$this->Global_model->send_mail($data);
		// redirect('thanks');
		$this->Global['name'] = $_REQUEST['name'];
		$this->Global['email'] = $_REQUEST['email'];
		$this->Global['mobile'] = $_REQUEST['mobile'];
		$this->Global['service'] = $_REQUEST['service'];
		$this->Global['message'] = $_REQUEST['message'];
		$this->load->view('front/thanks', $this->Global);
	}
	
	public function newsletter()
	{
		$data = $_POST;
		unset($data["submit"]);
		$this->Global_model->newsletter($data);
		$this->load->view('front/thanks', $this->Global);
	}


	public function blogs()
	{
		$this->Global['title'] = "Blog";
		$this->load->view('front/blog', $this->Global);
	}

	public function category($link)
	{
		if ($this->Product_model->checkcategory($link)) {
			$data = $this->Product_model->get_category($link);
			$this->Global['blogs'] = $this->Blog_model->getblogs('category', $link);
			$this->Global['title'] = $data->name;
			$this->load->view('front/blog', $this->Global);
		} else {
			redirect('error');
		}
	}

	function blog($slug)
	{
		if ($this->Product_model->checkblog($slug)) {
			$this->Global['blogs'] = $this->Blog_model->get_posts(5, 0);
			$this->Global['recentblogs'] = $this->Blog_model->get_posts();
			$this->Global['blog'] = $this->Blog_model->get_post($slug);
			$this->load->view('front/blog-detail', $this->Global);
		} else {
			redirect('error');
		}
	}

	public function exhibitions()
	{
		$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
		$this->load->view('front/allevents', $this->Global);
	}
	public function completed()
	{
		$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
		$this->load->view('front/expired', $this->Global);
	}
	public function upcoming()
	{
		$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
		$this->load->view('front/upcoming', $this->Global);
	}
	public function ongoing()
	{
		$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
		$this->load->view('front/ongoing', $this->Global);
	}
	public function stalls($link)
	{
		$this->Global['exhibition'] = $this->Product_model->get_exhibition($link);
		// print_r($this->Global['exhibition']);
		// die();
		$this->Global['stalls'] = $this->Product_model->getstalls($this->Global['exhibition']->id);
		// print_r($this->Global['stalls']);
		// die();
		$this->load->view('front/single-event', $this->Global);
	}
	public function check_availability()
	{
		print_r($_POST);
		$selectedStalls = $_POST["selectedStalls"];
		$selectedExhibition = $_POST["selectedExhibition"];
		// $selectedStalls = json_decode($this->input->post('stalls'), true);
		$isAvailable = $this->Product_model->check_stalls_availability($selectedStalls, $selectedExhibition);
		echo $isAvailable;
		// die();
	}


	public function cart()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_POST['coupon_discount'])) {
				$coupon = $this->Product_model->getcoupon($_POST['coupon_discount'], 1);
				if (isset($coupon['name'])) {
					if ($coupon['quantity'] >= 1) {
						if ($coupon['min_amt'] < $this->cart->total()) {
							$this->Global['coupon'] = $coupon;
							$this->session->set_userdata('coupon', $coupon);
							// $this->session->set_flashdata('error_msg', "Congratulation! ".$coupon['name']." is applied");
							$this->Product_model->getcoupon($_POST['coupon_discount'], 1, 1);
						} else {
							$this->session->unset_userdata('coupon', $coupon);
							$this->session->set_flashdata('error_msg', "Minimum order value must be " . $coupon['min_amt']);
						}
					} else {
						$this->session->set_flashdata('error_msg', "No coupon code found !");
						$this->session->set_userdata('discount', 0);
					}
				} else {
					$this->session->set_flashdata('error_msg', "No coupon code found !");
					$this->session->set_userdata('discount', 0);
				}
			} else if (isset($_SESSION['coupon'])) {
				$coupon = $this->Product_model->getcoupon($_SESSION['coupon']['name'], 1);
				if ($coupon['min_amt'] < $this->cart->total()) {
					$this->Global['coupon'] = $coupon;
				} else {
					$this->session->unset_userdata('coupon', $coupon);
					$this->session->set_flashdata('error_msg', "Minimum order value must be " . $coupon['min_amt']);
				}
			} else {
				$this->session->set_userdata('discount', 0);
			}
			$in_cart = array();
			foreach ($this->cart->contents() as $item) {
				$in_cart[$item['id']] = $item['exhibitionId'];
			}
			$this->Global['cartItems'] = $this->cart->contents();
			if (isset($item)) {
				$this->Global['exhibitionss'] = $this->Product_model->get_exhibition_by_id($in_cart[$item['id']]);
			}
			$this->load->view('front/cart', $this->Global);
		}
	}


	public function emptycart()
	{
		$this->cart->destroy();
		$_SESSION['discount'] = 0;
		redirect('cart');
	}

	public function removeItem($rowid)
	{
		// Remove item from cart
		$remove = $this->cart->remove($rowid);

		// Redirect to the cart page
		redirect('user/cart');
	}


	public function checkout()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			// if (isset($_SESSION['shipping_charge']) && $_SESSION['shipping_charge'] != 0) {
			// } else {
			// 	$_SESSION['shipping_charge'] = 0;
			// }
			$con = array(
				'returnType' => 'single',
				'conditions' => array(
					'email' => $_SESSION['userEmail'],
				)
			);
			$user_data = $this->User_model->getRows($con);
			$_SESSION['currentaddress'] = $user_data['currentaddress'];
			$_SESSION['shippingaddress'] = $user_data['shippingaddress'];
			$this->Global['name'] = $_SESSION['userName'];
			$this->Global['userId'] = $_SESSION['userId'];
			$this->Global['userEmail'] = $_SESSION['userEmail'];
			$this->Global['phone'] = $_SESSION['userPhone'];
			if (!isset($_SESSION['discount'])) {
				$_SESSION['discount'] = 0;
			}
			$amount = 	$this->cart->format_number(($this->cart->total() - $_SESSION['discount'])*(1+($this->Global['gst']/100)));
			$amount = str_replace(",", "", $amount);
			$amount = floatval($amount);
			if ($amount < 1.00) {
				redirect('cart');
			}
			$_SESSION['totalAmount'] = $amount;

			$this->Global['order'] = array(
				'id' => 'order_' . rand('999999', '999999999999'),
				'entity' => 'order',
				'amount' => ($amount),
				'amount_paid' => '0',
				'amount_due' => ($amount),
				'currency' => 'USD',
				'receipt' => '123',
				'status' => 'created',
				'attempts' => '0'
			);

			$_SESSION['orderid'] = $this->Global['order']['id'];
			if (!isset($_SESSION['isUserLoggedIn'])) {
				redirect('user/login');
			} else {
				$this->Global['wallet'] = $this->Order_model->wallet();
				$this->Global['cartItems'] = $this->cart->contents();
				$this->load->view('user/checkout', $this->Global);
			}
		}
	}


    public function privacy()
	{
	    $this->Global['page'] = $this->Global_model->getpage("privacy")[0];
		$this->load->view('front/page', $this->Global);
	}
	
	public function terms()
	{
	    $this->Global['page'] = $this->Global_model->getpage("terms")[0];
		$this->load->view('front/page', $this->Global);
	}
	
	public function refund()
	{
	    $this->Global['page'] = $this->Global_model->getpage("refund")[0];
		$this->load->view('front/page', $this->Global);
	}
    

}
