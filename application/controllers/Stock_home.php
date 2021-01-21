<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_home extends CI_Controller
{
	public function index()
	{
		$title['title'] = "Home";
		$this->load->view('header', $title);
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function read()
	{
		$object['stockHomeController'] = $this;
		$this->load->view('read', $object);
	}


	public static function getNews()
	{

		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/news/list?category=generalnews&region=US",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
				"x-rapidapi-key: f9d1b4a4c7msh6d4822f878ed5e7p1eb5dbjsn82e90ff6afcd"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		}

		$items = json_decode($response, true)['items'];
		$count = 0;


		$data = [];
		foreach ($items as $key => $result) {
			foreach ($result as $key => $value) {
				$news = new stdClass();
				$news->title = $value['title'];
				$news->link = $value['link'];
				$news->summary = $value['summary'];
				$news->content = $value['content'];
				if (strlen($news->content) > 700)
					$news->content = substr($news->content, 0, 700) . '...';
				$news->author = $value['author'];
				if (isset($value['main_image']) && isset($value['main_image']['resolutions'])) {
					foreach ($value['main_image']['resolutions'] as $resolution) {
						if ($resolution['tag'] == 'ios:size=large_new_fixed') {
							$news->image = $resolution['url'];
							break;
						}
					}
				}
				array_push(
					$data,
					$news
				);
				$count++;
				if ($count == 4) {
					break;
				}
			}
			if ($count == 4) {
				break;
			}
		}
		return $data;
	}
}
