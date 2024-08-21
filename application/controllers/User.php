<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'views/user/razorpay-php/Razorpay.php';

use Razorpay\Api\Api;

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// Load form validation ibrary & user model 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $this->load->library('Paypal_lib');
		$this->load->model('User_model');
		$this->load->model('Order_model');
		$this->load->model('Orders_model');
		$this->load->model('Admin_model');
		$this->load->model('Product_model');
		$this->Global = $this->Global_model->getdata();
		$this->Global['coupons'] = $this->Global_model->getactivecoupons();
		$this->Global['upcomingexhibitions'] = $this->Product_model->getupcomingexhibitions();

		// User login status 
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
		// $this->Global['cartItems'] = $this->cart->contents();

	}

	public function index()
	{
		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/myaccount');
		} else {
			redirect('user/login');
		}
	}
	public function myaccount()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_POST['AccountSubmit'])) {
				$data['id'] = $_SESSION['userId'];
				$data['firstname'] = $_POST['firstname'];
				$data['lastname'] = $_POST['lastname'];
				$data['phone'] = $_POST['phone'];
				$this->User_model->updateUser($data);
			}
			// $this->Global['orders'] = $this->Orders_model->getorders('userId', $_SESSION['userId']);
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			$this->load->view('user/myaccount', $this->Global);
		}
	}

	public function editprofile()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_POST['AccountSubmit'])) {
				$data['id'] = $_SESSION['userId'];
				$data['firstname'] = $_POST['firstname'];
				$data['lastname'] = $_POST['lastname'];
				$data['gst'] = $_POST['gst'];
				$data['phone'] = $_POST['phone'];
				$this->User_model->updateUser($data);
			}
			// $this->Global['orders'] = $this->Orders_model->getorders('userId', $_SESSION['userId']);
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			$this->load->view('user/edit-profile', $this->Global);
		}
	}

	public function order_history()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->Global['orders'] = $this->Order_model->getorders();
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->load->view('user/myorder', $this->Global);
		}
	}

	public function wallet()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->Global['wallet'] = $this->Order_model->wallet();
			$this->Global['transcations'] = $this->Order_model->get_wallet_transactions($_SESSION['userId']);
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			$this->Global['referral_id'] = md5($_SESSION['userId']);
			$this->load->view('user/mywallet', $this->Global);
		}
	}

	public function transcation()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->Global['wallet'] = $this->Order_model->wallet();
			$this->Global['transcations'] = $this->Order_model->get_transactions($_SESSION['userId']);
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			$this->Global['referral_id'] = md5($_SESSION['userId']);
			$this->load->view('user/transcation', $this->Global);
		}
	}
	public function addmonettowallet()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$price = $this->Global['wallet'] = $this->Order_model->singlewallet();
			$this->Global['transcations'] = $this->Order_model->get_transactions($_SESSION['userId']);
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			if (isset($_POST['addmoney'])) {
				$data = $_POST;
				$data['wallet'] += $price['wallet'];
				$this->Product_model->updatewallet($_SESSION['userId'], $data['wallet']);
				$tdata = array();
				$tdata['user_id'] = $_SESSION['userId'];
				$tdata['remark'] = 'Money Added in wallet';
				$tdata['amount'] = $_POST['wallet'];
				$tdata['transcation_id'] =  $_SESSION['userId'] . 'ADD' . $_POST['wallet'];
				unset($data['addmoney']);
				$this->Product_model->updattranscation($tdata);
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	
	public function calender()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			$this->Global['exhibitions'] = $this->Product_model->getexhibitions();
			$this->load->view('user/calender', $this->Global);
		}
	}

	public function addtowishlist($req = null)
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$a = $this->User_model->checkwishlist($req, $_SESSION['userId']);

			if ($a == 1) {
				redirect(base_url('user/wishlist'));
			} else {
				$this->load->model('Product_model');
				$product = $this->Product_model->get_product($req);
				$data = array(
					'name'    => $product->name,
					'price'    => $product->saleprice,
					'color'    => $product->color,
					'mrp'    => $product->price,
					'image' => $product->featured_image,
					'userId'  => $_SESSION['userId'],
					'productslug'    => $product->link
				);
				$this->User_model->addtowishlist($data);
				redirect(base_url('user/wishlist'));
			}


			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function removewishlist($req = null)
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->User_model->removewishlist($req);

			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function changepassword()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_POST['oldpassword'])) {
				$this->form_validation->set_rules('oldpassword', 'password', 'required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
				$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
				if ($this->form_validation->run() == true) {
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $_SESSION['userEmail'],
							'password' => sha1($this->input->post('oldpassword')),
						)
					);
					$checkLogin = $this->User_model->getRows($con);
					if ($checkLogin) {
						$data['id'] = $_SESSION['userId'];
						$data['email'] = $_SESSION['userEmail'];
						$data['password'] = sha1($this->input->post('password'));
						$this->User_model->updateUser($data);
						$this->session->set_flashdata('success_msg', ' Password Changed Successfully.');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}
			// $products = $this->db->query("Select * from user");
			// $data['totalproducts'] = $products->num_rows();
			$this->load->view('user/newpassword', $this->Global);
		}
	}

	public function login()
	{
		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/myaccount');
		} else {
			$data = array();
			// If login request submitted 
			if (isset($_POST['loginSubmit'])) {
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('password', 'password', 'trim|required');

				if ($this->form_validation->run() == true) {
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $this->input->post('email'),
							'password' => sha1($this->input->post('password')),
						)
					);
					$checkLogin = $this->User_model->getRows($con);
					if ($checkLogin) {
						if ($checkLogin['status'] == 2) {
							$this->session->set_flashdata('error_msg', 'Your Account is Blocked');
							redirect('user/login');
						} else if ($checkLogin['status'] == 0) {
							$this->session->set_userdata('email', $checkLogin['email']);
							redirect('user/verifyaccount');
						} else {
							$this->session->set_userdata('isUserLoggedIn', TRUE);
							$this->session->set_userdata('userId', $checkLogin['id']);
							$this->session->set_userdata('userName', $checkLogin['firstname'] . " " . $checkLogin['lastname']);
							$this->session->set_userdata('userEmail', $checkLogin['email']);
							$this->session->set_userdata('userPhone', $checkLogin['phone']);
							redirect('user/myaccount');
						}
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong email or password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}

			// Load view 
			$this->load->view('user/sign-in', $this->Global);
		}
	}


	public function register($hashed_referrer_id  = NULL)
	{
		// echo "<pre>";
		$referrer_id = NULL;
		if ($hashed_referrer_id) {
			// Find the user with the matching hash
			$users = $this->User_model->getalluser();
			foreach ($users as $user) {
				if (md5($user['id']) === $hashed_referrer_id) {
					$referrer_id = $user['id'];
					$this->session->set_userdata('referrer_id', $referrer_id);
					break;
				}
			}
			// die();
		}

		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/myaccount');
		} else {

			$data = array();
			// If login request submitted 
			if (isset($_POST['registerSubmit'])) {

				$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('phone', 'Mobile No', 'trim|required|is_unique[users.phone]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
				$this->form_validation->set_message('is_unique', 'This %s is already taken');

				if (isset($_SESSION['referrer_id']) && $_SESSION['referrer_id'] != NULL) {
					$_POST['referred_by'] = $_SESSION['referrer_id'];
					// echo $_POST['referred_by'];
					// die();
				}

				// echo "<pre>";
				// print_r($_POST);
				// die();
				if ($this->form_validation->run() == true) {
					unset($_POST["registerSubmit"]);
					unset($_POST["confirmpassword"]);
					$_POST["password"] = sha1($_POST["password"]);
					// 	$_POST["code"] = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
					$this->User_model->register($_POST);
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $this->input->post('email'),
						)
					);
					$registerUser = $this->User_model->getRows($con);
					if ($registerUser) {
						$this->session->set_userdata('isUserLoggedIn', TRUE);
						$this->session->set_userdata('userId', $registerUser['id']);
						$this->session->set_userdata('userName', $registerUser['firstname'] . " " . $registerUser['lastname']);
						$this->session->set_userdata('userEmail', $registerUser['email']);
						$this->session->set_userdata('userPhone', $registerUser['phone']);
						redirect('user/myaccount');
						// 		$data['code'] = $_POST["code"];
						// 		$data['firstname'] = $registerUser['firstname'];
						// 		$data['email'] = $registerUser['email'];
						// 		$data['from'] = $this->Global['email'];
						// 		$this->User_model->verifyaccount($data);
						// 		$this->session->set_userdata('email', $registerUser['email']);
						// 		redirect('user/verifyaccount');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong email or password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}

			// Load view 
			$this->load->view('user/register', $this->Global);
		}
	}


	// 	public function verifyaccount($link = null)
	// 	{
	// 		if (isset($_SESSION['isUserLoggedIn'])) {
	// 			redirect('user/myaccount');
	// 		} else {
	// 			if (!empty($this->input->post("resendotp"))) {
	// 				$user = $this->User_model->getuser($_SESSION['email']);
	// 				$data['code'] = $user["code"];
	// 				$data['firstname'] = $user['firstname'];
	// 				$data['email'] = $user['email'];
	// 				$data['from'] = $this->Global['email'];
	// 				$this->User_model->verifyaccount($data);
	// 				redirect('user/verifyaccount');
	// 			}
	// 			if (isset($_POST['code'])) {
	// 				$this->form_validation->set_rules('code', 'Verification Code', 'trim|required');
	// 				if ($this->form_validation->run() == true) {
	// 					$code = $_POST['code'];
	// 				} else {
	// 					$this->session->set_flashdata('error_msg', ' Please enter code.');
	// 				}
	// 			} else {
	// 				$code = $link;
	// 			}
	// 			if (isset($code)) {
	// 				$registerUser = $this->User_model->verify($code);
	// 				if ($registerUser) {
	// 					$this->session->set_userdata('isUserLoggedIn', TRUE);
	// 					$this->session->set_userdata('userId', $registerUser['id']);
	// 					$this->session->set_userdata('userName', $registerUser['firstname'] . " " . $registerUser['lastname']);
	// 					$this->session->set_userdata('userEmail', $registerUser['email']);
	// 					$this->session->set_userdata('userPhone', $registerUser['phone']);
	// 					redirect('user/myaccount');
	// 				} else {
	// 					$this->session->set_flashdata('error_msg', 'Incorrect code. Please check your Email Account');
	// 				}
	// 			}
	// 			// Load view 
	// 			$this->load->view('user/verifyaccount', $this->Global);
	// 		}
	// 	}

	public function logout()
	{
		$this->session->unset_userdata('isUserLoggedIn');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('userEmail');
		$this->session->unset_userdata('userPhone');
		$this->session->sess_destroy();
		redirect('user/login', $this->Global);
	}
	public function forgot_password()
	{
		if (isset($_POST['email'])) {
			$email = $this->input->post('email');
			$findemail = $this->User_model->forgotPassword($email);
			if ($findemail) {
				$this->User_model->sendpassword($findemail);
				$this->session->set_userdata('email', $findemail['email']);
				redirect(base_url() . 'user/change_password', 'refresh');
			} else {
				$this->session->set_flashdata('error_msg', ' Wrong email, please try again.');
				redirect(base_url() . 'user/forgot_password', 'refresh');
			}
		}
		$this->load->view('user/forgot', $this->Global);
	}
	public function change_password()
	{
		if (isset($_POST["resendcode"])) {
			$data['email'] = $_POST['email'];
			$this->User_model->sendpassword($data);
			$this->session->set_userdata('email', $_POST['email']);
			redirect(base_url() . 'user/change_password', 'refresh');
		}
		if (!empty($this->input->post("resetcode"))) {
			$this->form_validation->set_rules('resetcode', 'Verification Code', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() == true) {
				$code = $_POST['resetcode'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$registerUser = $this->User_model->changepassword($code, $email, $password);
				if ($registerUser) {
					$this->session->set_userdata('isUserLoggedIn', TRUE);
					$this->session->set_userdata('userId', $registerUser['id']);
					$this->session->set_userdata('userName', $registerUser['firstname'] . " " . $registerUser['lastname']);
					$this->session->set_userdata('userEmail', $registerUser['email']);
					$this->session->set_userdata('userPhone', $registerUser['phone']);
					redirect('user/myaccount');
				} else {
					$this->session->set_flashdata('error_msg', 'Incorrect code. Please check your Email Account');
				}
			} else {
				$this->session->set_flashdata('error_msg', ' Please enter code.');
			}
		}

		$this->load->view('user/changepass', $this->Global);
	}


	public function checkout()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_SESSION['shipping_charge']) && $_SESSION['shipping_charge'] != 0) {
			} else {
				$_SESSION['shipping_charge'] = 0;
			}
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
			$amount = 	$this->cart->format_number(($this->cart->total() + $_SESSION['shipping_charge'] - $_SESSION['discount'])*(1+($this->Global['gst']/100)));
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
				$this->Global['cartItems'] = $this->cart->contents();
				$this->load->view('user/checkout', $this->Global);
			}
		}
	}



	public function paymentStatus() // All data passed just save order and order items and send to thank you page & Working perfectly fine
	{
        $razorpay_payment_id = $_POST['razorpay_payment_id'];
		$razorpay_order_id = $_POST['razorpay_order_id'];
		$razorpay_signature = $_POST['razorpay_signature'];

		$data = $razorpay_order_id . "|" . $razorpay_payment_id;
		$generated_signature = hash_hmac("sha256", $data, RAZOR_KEY_SECRET);
		$_SESSION['transactionId'] = $razorpay_payment_id;
		if ($generated_signature == $razorpay_signature) {
		    
		    
            
    	    $reffer = $this->Global['reffer'] = $this->User_model->getdata($_SESSION['userId']);
    		if($reffer['referred_by'] != NULL){
    			$this->Product_model->refferalupadte($reffer['referred_by'], $this->Global['referral_amount']);
    			$this->Product_model->updatereffertranscation($reffer['referred_by'],$this->Global['referral_amount']);
    			$this->Product_model->clearrefferid($_SESSION['userId']);
    		}
    		
            $price['wallet'] = $this->Order_model->singlewallet()['wallet'];
            
            $cartItem['userId'] = $_SESSION['userId'];
// 			$cartItem['less'] = $_SESSION['discount'] / $this->cart->total_items();
// 			if($_SESSION['usewallet'] == 'true'){
// 			    $cartItem['wallet'] = $price['wallet'] / $this->cart->total_items();
// 			}
            $walletrprice = $price['wallet'];
            
    		foreach ($this->cart->contents() as $cartItem) {
    			
                
                $cartItem['less'] = $_SESSION['discount'] / $this->cart->total_items();
                if($_SESSION['usewallet'] == 'true'){
                    $cartItem['wallet'] = $price['wallet'] / $this->cart->total_items();
                }else{
                    $cartItem['wallet'] = 0;
                }
            
    			$cartItem['userId'] = $_SESSION['userId'];
    			
    			if($_SESSION['usewallet'] == 'true'){
    			    $this->Product_model->purchasetranscation($_SESSION['userId'], $cartItem['wallet'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Wallet");
    			}
    			$this->Product_model->purchasetranscation($_SESSION['userId'], ($cartItem['price'] - $cartItem['less'] )*(1+ ($this->Global['gst']/100))-$cartItem['wallet'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Online");
    			// $this->Product_model->purchasetranscation($_SESSION['userId'], $cartItem['wallet']-$cartItem['price'] - $cartItem['less'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Online");
    			
    			$cartItem['price']=($cartItem['price'] - $cartItem['less'] )*(1+ ($this->Global['gst']/100)) ;
    			$this->Orders_model->orderitems($cartItem);
    			
    			if($_SESSION['usewallet'] == 'true'){
        	    	$walletrprice -= $cartItem['wallet'];
        	   // 	echo('Wallet Price is '.$walletrprice);
        		    $this->Product_model->updatewallet($_SESSION['userId'], $walletrprice);
    		    }
    		}
    		
    		
    		
            $emailContent = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 20px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 20px 0;
                        }
                        table, th, td {
                            border: 1px solid #dddddd;
                        }
                        th, td {
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                        .header {
                            margin-bottom: 20px;
                        }
                        .header p {
                            margin: 0;
                            padding: 5px 0;
                        }
                        .footer {
                            margin-top: 20px;
                            font-size: 0.9em;
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>Order Confirmation</h1>
                        <p><strong>Name:</strong> ' . htmlspecialchars($_SESSION['userName']) . '</p>
                        <p><strong>Phone:</strong> ' . htmlspecialchars($_SESSION['userPhone']) . '</p>
                        <p><strong>Email:</strong> ' . htmlspecialchars($_SESSION['userEmail']) . '</p>
                    </div>
                
                    <h2>Order Details</h2>
                    <table>
                        <thead>
                            <tr style="text-align: center;">
                                <th>S No.</th>
                                <th>Booking Date</th>
                                <th>Price</th>
                                <th>Stall No</th>
                                <th>Exhibition</th>
                                <th>Ex. Start Date</th>
                                <th>Ex. End Date</th>
                            </tr>
                        </thead>
                        <tbody>';

            $index = 1;
    		foreach ($this->cart->contents() as $cartItem) {                
    		    $exhibition = $this->Product_model->get_exhibition_by_id($cartItem['exhibitionId']);
                $cartItem['exhibition_name'] = $exhibition->name;
                $cartItem['start_date'] = $exhibition->start_date;
                $cartItem['end_date'] = $exhibition->end_date;
                $emailContent .= '
                <tr>
                    <td>' . ($index++) . '</td>
                    <td>' . htmlspecialchars(date('d-m-Y')) . '</td>
                    <td>' . htmlspecialchars($cartItem['price']) . '</td>
                    <td>' . htmlspecialchars($cartItem['stall_number']) . '</td>
                    <td>' . htmlspecialchars($cartItem['exhibition_name']) . '</td>
                    <td>' . htmlspecialchars($cartItem['start_date']) . '</td>
                    <td>' . htmlspecialchars($cartItem['end_date']) . '</td>
                </tr>';
    		}
    		
    		$emailContent .= '
                                </tbody>
                            </table>
                        
                            <div class="footer">
                                <p>Thank you for your order. If you have any questions, feel free to contact us.</p>
                                <p>Best regards,</p>
                                <p>'.sitename.'</p>
                                <p>'.$this->Global['email'].'</p>
                                <p>'.$this->Global['mobile'].'</p>
                            </div>
                        </body>
                        </html>';
    		
    		
    		
            $myemail['toemail'] = $_SESSION['userEmail'];
			$myemail['subject'] = "Your Stall has been booked successfully at - ".sitename;
			$myemail['message'] = $emailContent;
			
// 			print_r($myemail);
			$this->Admin_model->send_mail($myemail);
    		
    
    		$this->cart->destroy();
    		$this->session->unset_userdata('discount');
    		$this->session->unset_userdata('totalAmount');
    		$this->session->unset_userdata('coupon');
    		
    		$this->session->set_flashdata('success_msg', 'Thanks for Your Booking, Your Stall is Booked Successfully');
    		redirect('user/order_history');
        } else {
			$this->session->set_flashdata('error_msg', 'Unable to verify your purchase');
			redirect('home/index');
// 			redirect('user/order-history/details/' . $razorpay_order_id, $this->Global);
    	}
	    
	    
	    
	    
            // 		$razorpay_payment_id = $_POST['razorpay_payment_id'];
            // 		$razorpay_order_id = $_POST['razorpay_order_id'];
            // 		$razorpay_signature = $_POST['razorpay_signature'];
            
            // 		$data = $razorpay_order_id . "|" . $razorpay_payment_id;
            // 		$generated_signature = hash_hmac("sha256", $data, RAZOR_KEY_SECRET);
            // 		$_SESSION['transactionId'] = $razorpay_payment_id;
            // 		if ($generated_signature == $razorpay_signature) {
            // 			$this->Orders_model->saveOrder($razorpay_order_id);
            // 			foreach ($this->cart->contents() as $cartItem) {
            // 				$cartItem['userId'] = $_SESSION['userId'];
            // 				$cartItem['order_id'] = $razorpay_order_id;
            // 				$this->Orders_model->orderitems($cartItem);
            // 			}
            
            // 			// $data['toemail'] = admin_username;
            // 			// $data['subject'] = "New order recieved on ".sitename;
            // 			// $mail_message .= 'You have recieved a new order on '.sitename.' with the order id ('.$razorpay_order_id.') Amount ₹'. number_format((float)$_SESSION['totalAmount'], 2, '.', '');
            // 			// $mail_message .= '<br/>Thanks & Regards';
            // 			// $mail_message .= '<br/> '.sitename;
            // 			// $data['message'] = $mail_message;
            // 			// $this->Admin_model->send_mail($data);
            
            // 			// $data['toemail'] = $_SESSION['userEmail'];
            // 			// $data['subject'] = "Your ".sitename." order #".$order_id." has been placed successfully";
            // 			// $mail_message .= 'We have recieved a new order on '.sitename.' with the order id ('.$razorpay_order_id.') Amount ₹'. number_format((float)$_SESSION['totalAmount'], 2, '.', '');
            // 			// $mail_message .= '<br/>Thanks & Regards';
            // 			// $mail_message .= '<br/> '.sitename;
            // 			// $data['message'] = $mail_message;
            // 			// $this->Admin_model->send_mail($data);
            
            // 			$this->cart->destroy();
            // 			$this->session->unset_userdata('special_note');
            // 			$this->session->unset_userdata('shipping_charge');
            // 			$this->session->unset_userdata('discount');
            // 			$this->session->unset_userdata('totalAmount');
            // 			$this->session->unset_userdata('coupon');
            
            // 			redirect('user/order-history/details/' . $razorpay_order_id);
            // 		} else {
            // 			$this->session->set_flashdata('error_msg', 'Unable to verify your purchase');
            // 			redirect('user/order-history/details/' . $razorpay_order_id, $this->Global);
            // 		}
	}

	public function details($razorpay_order_id)
	{
		$this->Global['items'] = $this->Orders_model->getitems($razorpay_order_id);
		$this->Global['order'] = $this->Orders_model->getorder($razorpay_order_id)[0];
		// 	$this->Global['order']['shippingAddress'] = $this->User_model->getaddress($this->Global['order']['shippingAddress']);
		// 	$this->Global['order']['billingAddress'] = $this->User_model->getaddress($this->Global['order']['billingAddress']);
		$this->load->view('user/order', $this->Global);
	}

	function success()
	{
		//get the transaction data
		$paypalInfo = $this->input->post();
		// 	echo('<pre>');
		// 	print_r($paypalInfo);
		// 	die();
		$order_id = $paypalInfo['transactionId'];
		$items = $this->Orders_model->getitems($order_id);
		$userid = $this->Orders_model->gettemporder($order_id)['userId'];
		$con = array(
			'returnType' => 'single',
			'conditions' => array(
				'id' => $userid,
			)
		);
		$checkLogin = $this->User_model->getRows($con);
		$this->session->set_userdata('isUserLoggedIn', TRUE);
		$this->session->set_userdata('userId', $checkLogin['id']);
		$this->session->set_userdata('userName', $checkLogin['firstname'] . " " . $checkLogin['lastname']);
		$this->session->set_userdata('userEmail', $checkLogin['email']);
		$this->session->set_userdata('userPhone', $checkLogin['phone']);
		$this->session->set_userdata('shippingAddress', $checkLogin['shippingaddress']);
		$this->session->set_userdata('billingAddress', $checkLogin['currentaddress']);
		$data['order_id'] = $paypalInfo['transactionId'];
		$data['transactionId'] = $paypalInfo["providerReferenceId"];
		$data['payment_status'] = $paypalInfo['code'];
		$this->Orders_model->updateOrder($data);
		// print_r($a);
		// print_r($data);
		// die();

		redirect('user/order-history/details/' . $paypalInfo['transactionId']);
	}

	public function bookyourstall($link)
	{
		$this->Global['cartItems'] = $this->cart->contents();
		$this->Global['exhibition'] = $this->Product_model->get_exhibition($link);
		$this->Global['stalls'] = $this->Product_model->getstalls($this->Global['exhibition']->id);
		$this->Global['bookedstalls'] = $this->Product_model->getbookedstalls($this->Global['exhibition']->id);
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_POST['submit'])) {
				// print_r($_POST);
				foreach ($_POST['stalls'] as $stal) {
					$this->Global['getstalls'] = $this->Product_model->getstallswithexhibition($_POST['exhibitionid'], $stal);
    				// 	echo "<pre>";
    				// 	print_r($this->Global['getstalls']->price);
    				// 	print_r($this->Global['getstalls']->color);
					$this->addtocart($stal, $this->Global['getstalls']->exhibition, $this->Global['getstalls']->price);
				}
				redirect('user/cart');
			}
		}
		$this->load->view('user/bookyourstall', $this->Global);
	}

	public function check_stall_availability()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$stallId = $this->input->post('stall_number');
			$exhibitionId = $this->input->post('exhibition_id');
			$price = $this->input->post('price');

			if ($stallId && $exhibitionId) {
				if ($this->User_model->is_stall_booked($stallId, $exhibitionId)) {
					echo json_encode(['available' => false, 'error' => 'Invalid input']);
				} else {
					echo json_encode(['available' => TRUE]);
					// $success = $this->addtocart($stallId,$exhibitionId,$price);
					// if(!$success){
					// 	echo $success;
					// }
				}
			} else {
				echo json_encode(['available' => false, 'error' => 'Invalid input']);
			}
		}
	}

	public function addtocart($stallId, $exhibitionId, $price)
	{
		$data = array(
			'id'      => $exhibitionId . '-' . $stallId,
			'qty'     => 1,
			'price'   => $price,
			'name'    => 'Stall Id - ' . $stallId,
			'exhibitionId'    => $exhibitionId,
			'stall_number'    => $stallId,
		);
		$in_cart = array();
		foreach ($this->cart->contents() as $item) {
			$in_cart[$item['id']] = $item['qty'];
		}
		if (array_key_exists($data['id'], $in_cart)) {
			$this->session->set_flashdata('already_in_cart', "Already in Cart");
			redirect('user/cart');
        // 			redirect($_SERVER['HTTP_REFERER']);
		}
		// print_r($data . "next");

		$this->cart->insert($data);
		// return $data;
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
			// echo "<pre>";
			// print_r($in_cart[$item['id']]);
			if (isset($item)) {
				$this->Global['exhibitionss'] = $this->Product_model->get_exhibition_by_id($in_cart[$item['id']]);
			}
			// print_r($this->Global['exhibitionss']);
			// die();
			$this->load->view('front/cart', $this->Global);
		}
	}

	public function paywithwallet()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
		    if(!isset($_POST['usewallet'])){
		        $_SESSION['totalAmount'] = number_format((float)$_SESSION['totalAmount'], 2, '.', '');
		        $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
        		$this->Global['order'] = $api->order->create(array(
        			'receipt' => '123',
        			'amount' => ($_SESSION['totalAmount'] * 100),
        			'currency' => 'INR',
        			'notes' => array('key1' => 'value3', 'key2' => 'value2')
        		));
        		
        		
        		$this->Global['razorpay'] = true;
        		$this->Global['order']['name'] = $_SESSION['userName'];
        		$this->Global['order']['phoneno'] = $_SESSION['userPhone'];
        		$this->Global['order']['email'] = $_SESSION['userEmail'];
        		$this->Global['cartItems'] = $this->cart->contents();
        		$this->Global['wallet'] = $this->Order_model->wallet();
        		$_SESSION['usewallet'] = false;
        		$this->load->view('user/checkout', $this->Global);	
    		
		          //  print_r($_POST);
		          //  die();
        // 			$reffer = $this->Global['reffer'] = $this->User_model->getdata($_SESSION['userId']);
        // 			if($reffer['referred_by'] != NULL){
        // 			$this->Product_model->refferalupadte($reffer['referred_by'], $this->Global['referral_amount']);
        // 			$this->Product_model->updatereffertranscation($reffer['referred_by'],$this->Global['referral_amount']);
        // 			$this->Product_model->clearrefferid($_SESSION['userId']);
        // 			}
        
        // 			foreach ($this->cart->contents() as $cartItem) {
        // 				$cartItem['userId'] = $_SESSION['userId'];
        // 				// $cartItem['order_id'] = $order_id;
        // 				$cartItem['less'] = $_SESSION['discount'] / $this->cart->total_items();
        // 				$cartItem['wallet'] = 0;
        // 				print_r($cartItem['less']);
        // 				// die();
						
        // 				$this->Orders_model->orderitems($cartItem);
        // 				$this->Product_model->purchasetranscation($_SESSION['userId'], ($cartItem['price'] - $cartItem['less']), $cartItem['exhibitionId'], $cartItem['stall_number'],"Online");
        // 			}
                
        // 			$this->cart->destroy();
        // 			$this->session->unset_userdata('discount');
        // 			$this->session->unset_userdata('totalAmount');
        // 			$this->session->unset_userdata('coupon');
        // 			redirect('user/order_history');
        
        
		    }else if(isset($_POST['usewallet']) && $_POST['usewallet'] =='on'){

    			$price['wallet'] = $this->Global['wallet'] = $this->Order_model->singlewallet()['wallet'];
		        if($price['wallet'] > $_SESSION['totalAmount']){
		             
		            $reffer = $this->Global['reffer'] = $this->User_model->getdata($_SESSION['userId']);
        			if($reffer['referred_by'] != NULL){
						$this->Product_model->refferalupadte($reffer['referred_by'], $this->Global['referral_amount']);
						$this->Product_model->updatereffertranscation($reffer['referred_by'],$this->Global['referral_amount']);
						$this->Product_model->clearrefferid($_SESSION['userId']);
        			}
        
        
        			foreach ($this->cart->contents() as $cartItem) {
        				$cartItem['userId'] = $_SESSION['userId'];
        				// $cartItem['less'] = $_SESSION['discount'] / $this->cart->total_items();
        				$cartItem['wallet'] = $_SESSION['totalAmount'] / $this->cart->total_items();
        				$cartItem['price'] = $_SESSION['totalAmount'] / $this->cart->total_items();

        				$this->Orders_model->orderitems($cartItem);
        				$this->Product_model->purchasetranscation($_SESSION['userId'], $cartItem['price'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Wallet");
        				// $this->Product_model->purchasetranscation($_SESSION['userId'], ($cartItem['price']*(1+ ($this->Global['gst']/100)))-$cartItem['wallet'] - $cartItem['less'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Online");
        				// $this->Product_model->purchasetranscation($_SESSION['userId'], $cartItem['wallet']-$cartItem['price'] - $cartItem['less'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Online");
        			}
        			$this->Global['wallet'] -= $_SESSION['totalAmount'];
        
        			$this->Product_model->updatewallet($_SESSION['userId'], $this->Global['wallet']);
        
        			$this->cart->destroy();
        			$this->session->unset_userdata('discount');
        			$this->session->unset_userdata('totalAmount');
        			$this->session->unset_userdata('coupon');
        			redirect('user/order_history');
        			
        			
        			
		        }else{
		            $_SESSION['totalAmount'] = number_format((float)$_SESSION['totalAmount'], 2, '.', '');
    		        $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
            		$this->Global['order'] = $api->order->create(array(
            			'receipt' => '123',
            			'amount' => (($_SESSION['totalAmount']-(int)$price['wallet']) * 100),
            			'currency' => 'INR',
            			'notes' => array('key1' => 'value3', 'key2' => 'value2')
            		));
            		
            		
            		$this->Global['razorpay'] = true;
            		$this->Global['order']['name'] = $_SESSION['userName'];
            		$this->Global['order']['phoneno'] = $_SESSION['userPhone'];
            		$this->Global['order']['email'] = $_SESSION['userEmail'];
            		$this->Global['cartItems'] = $this->cart->contents();
            		$this->Global['wallet'] = $this->Order_model->wallet();
            		$_SESSION['usewallet'] = true;
            		$this->load->view('user/checkout', $this->Global);	
		            
		            
		  //          $reffer = $this->Global['reffer'] = $this->User_model->getdata($_SESSION['userId']);
    //     			if($reffer['referred_by'] != NULL){
    //         			$this->Product_model->refferalupadte($reffer['referred_by'], $this->Global['referral_amount']);
    //         			$this->Product_model->updatereffertranscation($reffer['referred_by'],$this->Global['referral_amount']);
    //         			$this->Product_model->clearrefferid($_SESSION['userId']);
    //     			}
        
        
    //     			foreach ($this->cart->contents() as $cartItem) {
    //     				$cartItem['userId'] = $_SESSION['userId'];
    //     				$cartItem['less'] = $_SESSION['discount'] / $this->cart->total_items();
				// 		$cartItem['wallet'] = $price['wallet'] / $this->cart->total_items();
    //     				$this->Orders_model->orderitems($cartItem);
    //     				// $this->Product_model->purchasetranscation($_SESSION['userId'], $cartItem['price'] - $cartItem['less'], $cartItem['exhibitionId'], $cartItem['stall_number'],"");
    //                     $this->Product_model->purchasetranscation($_SESSION['userId'], $cartItem['wallet'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Wallet");
    //     				$this->Product_model->purchasetranscation($_SESSION['userId'], $cartItem['price']-$cartItem['wallet'] - $cartItem['less'], $cartItem['exhibitionId'], $cartItem['stall_number'],"Online");
    //     			}
    //     			$price['wallet'] = 0;
        
    //     			$this->Product_model->updatewallet($_SESSION['userId'], $price['wallet']);
        
    //     			$this->cart->destroy();
    //     			$this->session->unset_userdata('discount');
    //     			$this->session->unset_userdata('totalAmount');
    //     			$this->session->unset_userdata('coupon');
    //     			redirect('user/order_history');
		        }
		    }
		    else{
		        		            echo "first case";

		    }
		}
	}
}