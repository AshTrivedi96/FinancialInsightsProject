<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top_stock extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->load->model("Admin_model");


	}
	public function index()
	{
		$category['trading'] = $this->Admin_model->load_stock(1);
		$category['short_term'] = $this->Admin_model->load_stock(2);
		$category['long_term'] = $this->Admin_model->load_stock(3);
		$trading = '';
		$short_term = '';
		$long_term = '';
		// to create a comma separated string to search in the api
		foreach ($category['trading'] as $key => $value) {
			
			$trading .= $value['shortname'].",";
		}

		foreach ($category['short_term'] as $key => $value) {
			
			$short_term .= $value['shortname'].",";
		}
		
		foreach ($category['long_term'] as $key => $value) {
			
			$long_term .= $value['shortname'].",";
		}
		
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "https://api.polygon.io/v2/reference/tickers?sort=ticker&search=".$trading."&perpage=10&page=1&apiKey=GdyGSXAhBv2zqnJqEI8AsX9wT3pFkldL"


		]);

		$trading = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "https://api.polygon.io/v2/reference/tickers?sort=ticker&search=".$short_term."&perpage=10&page=1&apiKey=GdyGSXAhBv2zqnJqEI8AsX9wT3pFkldL"


		]);

		$short_term = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "https://api.polygon.io/v2/reference/tickers?sort=ticker&search=".$long_term."&perpage=10&page=1&apiKey=GdyGSXAhBv2zqnJqEI8AsX9wT3pFkldL"


		]);

		$long_term = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 

		$data['trading'] = json_decode($trading,true)['tickers'];
		$data['short_term'] = json_decode($short_term,true)['tickers'];
		$data['long_term'] = json_decode($long_term,true)['tickers'];
		
		$title['title'] = "Top Stock";
		$this->load->view('header',$title);
		$this->load->view('top_stock',$data);
		$this->load->view('footer');

	}
}