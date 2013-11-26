<?

// This pulls your most recently liked Vine

require_once('vine.php'); 
$vine = new Vine('Your User Name', 'Password');
$vinedata = $vine->getRecentlyLikedVine();

echo $vinedata["video_url"];
echo $vinedata["description"];
?>