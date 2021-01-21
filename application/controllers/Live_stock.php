<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live_stock extends CI_Controller 
{
	public function index()
	{
		
		
		$title['title'] = "Live Stock";
		$this->load->view('header',$title);
		$this->load->view('live_stock');
		$this->load->view('footer');
		$this->load->view('live_stock_js');


	}

	public function get_datatable()
	{ 

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "https://api.polygon.io/v2/reference/tickers?sort=ticker&perpage=500&page=1&apiKey=GdyGSXAhBv2zqnJqEI8AsX9wT3pFkldL"


		]);

			$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		

		$live_stock = json_decode($response,true)['tickers'];
		$count = json_decode($response,true)['count'];
		
		 $draw = intval($this->input->post("draw"));
      $start = intval($this->input->post("start"));
      $length = intval($this->input->post("length"));
      $data = [];
      $i=1;
      foreach($live_stock as $key => $value) {
           $data[] = array(
           		 
                 $value['ticker'],  
             	 $value['name'],
             	 $value['market'], 
             	 $value['locale'], 
             	 $value['currency'] 
           );
      $i++;
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