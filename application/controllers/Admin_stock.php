<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_stock extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Admin_model");
	}
	public function index()
	{

		if ($this->confirm_login()) {
			$title['title'] = "Admin Stock";
			$this->load->view('header', $title);
			$this->load->view('admin');
			$this->load->view('footer');
			$this->load->view('admin_js');
		} else {
			$this->session->set_flashdata('error', 'Please Login First');
			redirect('/index.php/admin_stock/login');
		}
	}
	public function login()
	{


		$title['title'] = "Login";
		$this->load->view('header', $title);
		$this->load->view('adminlogin');
		$this->load->view('footer');
	}

	public function save_stock()
	{
		$top_stock_value = $this->input->post('top_stock_value');
		$stock_category = $this->input->post('category');
		$to_delete = $this->input->post('to_delete');
		if ($to_delete == 0) {
			$data = $this->Admin_model->save_stock($top_stock_value, $stock_category);
		} else if ($to_delete == 1) {
			$data = $this->Admin_model->delete_stock($top_stock_value, $stock_category);
		}
	}

	public function load_stock()
	{
		$stock_category = $this->input->post('category');

		$data['category_stocks'] = $this->Admin_model->load_stock($stock_category);

		echo json_encode($data);
	}

	public function get_datatable()
	{
		$stock_category_name = $this->input->get('category', TRUE);

		$stock_category = 0;
		if ($stock_category_name == 'trading') {
			$stock_category = 1;
		} else if ($stock_category_name == 'shortTerm') {
			$stock_category = 2;
		} else if ($stock_category_name == 'longTerm') {
			$stock_category = 3;
		}

		$datatable = [];
		$count = 0;

		$datas = $this->Admin_model->load_stock($stock_category);
		foreach ($datas as $data) {
			$curl = curl_init();
			$count++;
			curl_setopt_array($curl, [
				CURLOPT_URL => "https://yahoo-finance-low-latency.p.rapidapi.com/v11/finance/quoteSummary/" . $data["shortname"] . "?modules=price",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"x-rapidapi-host: yahoo-finance-low-latency.p.rapidapi.com",
					"x-rapidapi-key: f9d1b4a4c7msh6d4822f878ed5e7p1eb5dbjsn82e90ff6afcd"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			}


			$live_stock = json_decode($response, true)['quoteSummary']['result'][0]['price'];
			array_push(
				$datatable,
				array(
					'<input type="checkbox" value="' . $data['shortname']
						. '" id="admin_stock_checkbox' . $count . '" class="admin_stock_checkbox" onchange="stock(\''
						. $data['shortname'] . '\',' . $count . ');">',

					$data["shortname"],
					$live_stock['shortName'],
					$live_stock['regularMarketPrice']['fmt'],

					$live_stock['regularMarketChangePercent']['fmt'],
					$live_stock['regularMarketChange']['fmt']
				)
			);
		}


		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));



		$result = array(
			"draw" => $draw,
			"recordsTotal" => $count,
			"recordsFiltered" => 20,
			"data" => $datatable
		);


		echo json_encode($result);
	}
	public function logincheck()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->Admin_model->check_login($username, $password);
		if ($data) {
			$user = array('stock_username' => $username, 'stock_password' => $password);
			$this->session->set_userdata($user);
			$this->session->set_flashdata('success', 'Successfully Loged In');
			redirect('/index.php/admin_stock/index');
		} else {
			$this->session->set_flashdata('error', 'You are not registered with us');
			redirect('/index.php/admin_stock/login');
		}
	}
	public function confirm_login()
	{
		if (!empty($this->session->userdata('stock_username'))) {
			return true;
		} else {
			return false;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/index.php/admin_stock/login');
	}
}
