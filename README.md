VinePHP
=======

*Basic Vine PHP Class*

		// This pulls your most recently liked Vine
		require_once('vine.php'); 
		$vine = new Vine('Your Email', 'Password');
		$vinedata = $vine->getRecentlyLikedVine();

**Note**: Please see Test.php as an example.