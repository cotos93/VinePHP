<?

/**
 * Vine API wrapper in PHP
 *
 * @author      Peter A. Tariche
 * @copyright   2012 Peter A. Tariche <ptariche@gmail.com>
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        http://github.com/ptariche/VinePHP
 * @category    Services
 * @package     Vine
 * @version     0.0.1
 * @todo        Limited Functionality
 */

Class Vine {

    private static $username;
    private static $password;

    private $_baseURL = 'https://api.vineapp.com';

    public function __construct() {

        if (func_get_args(0))
            self::$username = func_get_arg(0);

        if (func_get_arg(1))
            self::$password = func_get_arg(1);
    }

    public function getKey() {
    	$username = urlencode(self::$username);
		$password = urlencode(self::$password);

		$postFields = "username=$username&password=$password"; 

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->_baseURL.'/users/authenticate');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
		curl_setopt($ch, CURLOPT_USERAGENT, "com.vine.iphone/1.0.3 (unknown, iPhone OS 6.1.0, iPhone, Scale/2.000000)");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($ch);
		
		if (!$result)
		{
		        echo curl_error($ch);
		}

		$json = json_decode($result, true);
		$key = $json["data"]["key"];

		return $key;
    }

    public function getRecentlyLikedVine() {
  
		$key = $this->getKey();
		$userId = strtok($key,'-');

		$url = $this->_baseURL.'/timelines/users/'.$userId.'/likes';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "com.vine.iphone/1.0.3 (unknown, iPhone OS 6.1.0, iPhone, Scale/2.000000)");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($ch);


		if (!$result)
		{
		        echo curl_error($ch);
		}

		$result2 = preg_replace ('/:\s?(\d{14,})/', ': "${1}"', $result);
		$json = json_decode($result2, true);

		$postId = $json["data"]["records"][0]["postId"];


		$url = $this->_baseURL.'/timelines/posts/'.$postId;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "com.vine.iphone/1.0.3 (unknown, iPhone OS 6.1.0, iPhone, Scale/2.000000)");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('vine-session-id: '.$key));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($ch);

		if (!$result)
		{
		        echo curl_error($ch);
		}

		$json= json_decode($result, true);

		$description= $json["data"]["records"][0]["description"];
		$video_url= $json["data"]["records"][0]["shareUrl"];

		curl_close($ch);

		$vinedata = array("video_url" => $video_url, "description" =>$description,);

		return $vinedata;
   }

}

?>