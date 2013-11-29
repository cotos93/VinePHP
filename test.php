<?

// This pulls your most recently liked Vine
//me is an array with your account information
require_once('vine.php'); 
$vine = new Vine('', '');
$me = $vine->me();
$vinedata = $vine->getRecentlyLikedVine();
$YourLikes= $vine->getYourLikesOnVineJSON();
$video_url = $vinedata["video_url"];
$video_description = $vinedata["description"];

?>
<br><br><br><br>
<?
var_dump($YourLikes);
?>
<br><br><br><br>
<?
echo "Video URL:" . $video_url;
?>