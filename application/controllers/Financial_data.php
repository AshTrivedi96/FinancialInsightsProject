<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial_data extends CI_Controller 
{
	public function index()
	{
		
		
		$title['title'] = "Financial Data";
		$this->load->view('header',$title);
		$this->load->view('financial_data');
		$this->load->view('footer');
		$this->load->view('financial_data_js');


	}

	public function get_datatable()
	{ 

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://morning-star.p.rapidapi.com/market/v2/get-movers",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: morning-star.p.rapidapi.com",
				"x-rapidapi-key: f9d1b4a4c7msh6d4822f878ed5e7p1eb5dbjsn82e90ff6afcd"
			],

		]);

			$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		$draw = intval($this->input->post("draw"));

		$actives = json_decode($response, true)['actives'];
		$gainers = json_decode($response, true)['gainers'];
		$losers = json_decode($response, true)['losers'];
		$count = 0;


		$data = [];
		foreach($actives as $key => $value) {
			 array_push($data,
				array(	$value['ticker'],
					$value['standardName'], 
					$value['lastPrice'], 
					$value['percentChange'], 
					$value['priceChange'],
					'actives')
			 );
		$count++;
		}
  
		foreach($gainers as $key => $value) {
			array_push($data,
				  array( $value['ticker'],
				   $value['standardName'], 
				   $value['lastPrice'], 
				   $value['percentChange'], 
				   $value['priceChange'],
				   'gainers')
			);
	   $count++;
	   }

		foreach($losers as $key => $value) {
			array_push($data,
				array(   $value['ticker'],
				   $value['standardName'], 
				   $value['lastPrice'], 
				   $value['percentChange'], 
				   $value['priceChange'],
				   'losers')
			);
	   $count++;
	   }
  
		$result = array(
				 "draw" => $draw,
				   "recordsTotal" => $count,
				   "recordsFiltered" => 20,
				   "data" => $data
			  );
  
      echo json_encode($result);
	}
}