<?

// This pulls your most recently liked Vine
//me is an array with your account information
require_once('vine.php'); 
$vine = new Vine('email', 'password');
$me = $vine->me();
$vinedata = $vine->getRecentlyLikedVine();
$video_url = $vinedata["video_url"];
$video_description = $vinedata["description"];


var_dump($me);
echo "Video URL:" . $video_url;
?>