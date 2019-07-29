<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->library('parser');
		$this->load->helper('url');
	}
	public function index()
	{
		// $json = file_get_contents("https://api.facebook.com/method/links.getStats?urls=%%https://www.facebook.com/humansofnewyork/photos/a.102107073196735.4429.102099916530784/1063548277052605/%%&format=json");
		// echo($json);
		// echo json_encode($json['share_count']);
		// $json_parsed = echo json_encode($json);
		// echo $json->like_count;
		// print_r($json_parsed);

		$this->load->view('welcome_message');
	}


	function insights()
	{
		$yviews = 0;
		$vlimit = 18980145;
		$shares = 0;
		$slimit = 1000000;
		$likes = 0;
		$Llimit = 1000000;
		$tweets = 0;
		$tlimits = 1000000;
		$comments = 0;
		$climits = 1000000;
		// $retweets = 0;
		// $favourits = 0 ;
		// $flimits = 1000000;

		$json = file_get_contents("https://api.facebook.com/method/links.getStats?urls=http://bassita.org/en/causes/when-has-helping-gone-out-of-style-a-success-story&format=json");
		$result = json_decode($json);
		foreach ($result as $key => $value) {
			$shares+=$value->share_count;
			$comments+=$value->comment_count;
			$likes += $value->like_count;
		}

		$youtube_call = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=rrRljndvV_0&key=AIzaSyDy3yoz51n-znZu7ADky7EfOyPC70Xpz58");
		$youtube_result = json_decode($youtube_call);

		foreach ($youtube_result->items as $key => $value) {
			$yviews= $value->statistics->viewCount;
		}

		$twitter_call = file_get_contents("http://urls.api.twitter.com/1/urls/count.json?url=http://bassita.org/en/causes/when-has-helping-gone-out-of-style-a-success-story");
		$twitter_result = json_decode($twitter_call);
		$tweets = $twitter_result->count;

		$insights = array('youtube' => $yviews/1000, 'youtube_view_count' => $yviews,  'fshare' => $shares*4, 'share_count' => $shares,'flike' => $likes*2, 'like_count' => $likes,'tweets' => $tweets*2, 'tweet_count'=>$tweets,'fcomments'=>$comments, 'comment_count'=> $comments);
		// print_r($insights);
		$this->parser->parse('welcome_message', $insights);
	}

	function twitter_stat()
	{
		$url = 'https://api.twitter.com/1.1/statuses/485184563896152064/activity/summary.json?oauth_consumer_key="tTbjSFiLx0MeEB9MZ5qj4ETDV"&oauth_nonce="3370c17477ce544947c89ba9e76c013a"&oauth_signature="43U7lFOayixXhfBH2jtkeiQzMCw%3D"&oauth_signature_method="HMAC-SHA1"&oauth_timestamp="1440683808"&oauth_token="20782859-QO1Ko335xtKH9lCYcNlJJEfyaksOF07MBUdg1Ezpf"&oauth_version="1.0"';
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
		$json = curl_exec($ch);
		if(!$json) {
		    echo curl_error($ch);
		    // echo "test";
		}
		curl_close($ch);
		echo $json;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */