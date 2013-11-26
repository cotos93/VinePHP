VinePHP
=======

*Basic Vine PHP Class*

		// This pulls your most recently liked Vine
		require_once('vine.php'); 
		$vine = new Vine('Your Email', 'Password');
		$vinedata = $vine->getRecentlyLikedVine();
        //$me is an array -- pulls your user account information
        $me = $vine->me();


**Note**: Please see Test.php as an example.

*Next Up*: Building the following functions.

		* Search by Tags
		* Get Post on Post ID

**Note**: Interested in building within this project? Tweet me at @petrosantoni
  


# Vine.app API Reference

The one and only public documentation of Vine.app 1.0.3

## Common headers

    user-agent: com.vine.iphone/1.0.3 (unknown, iPhone OS 6.1.0, iPhone, Scale/2.000000)
    vine-session-id: <userid>-1231ed86-80a0-4f07-9389-b03199690f73
    accept-language: en, sv, fr, de, ja, nl, it, es, pt, pt-PT, da, fi, nb, ko, zh-Hans, zh-Hant, ru, pl, tr, uk, ar, hr, cs, el, he, ro, sk, th, id, ms, en-GB, ca, hu, vi, en-us;q=0.8

## Login

    POST https://api.vineapp.com/users/authenticate

### Post data

    username=xxx@example.com
    password=xxx

### Response

    {
        "code": "",
        "data": {
            "username": "Bill",
            "userId": xxx,
            "key": "<userid>-1231ed86-80a0-4f07-9389-b03199690f73"
        },
        "success": true,
        "error": ""
    }

## Logout

    DELETE https://api.vineapp.com/users/authenticate

### Response

    {"code": "", "data": {}, "success": true, "error": ""}

## Get Popular

    GET https://api.vineapp.com/timelines/popular

### Response

    {
        "count": 1,
        "records": [
            {
                "avatarUrl": "http://vines.s3.amazonaws.com/avatars/FC220C82-1370-4340-887C-01254FBAFB7D-4274-000002E4D4C0B0D4.jpg",
                "comments": {
                    "count": 1,
                    "nextPage": null,
                    "previousPage": null,
                    "records": [
                        {
                            "avatarUrl": "https://vines.s3.amazonaws.com/avatars/D6360E08-0BF5-4750-A883-9F9F09F91E06-25016-0000191A7355BDF7.jpg",
                            "comment": "When pizza's on a bagel you can eat pizza anytime!",
                            "commentId": 898291497017937920,
                            "created": "2013-01-02T16:19:56.000000",
                            "location": "Brooklyn, NY",
                            "userId": 110,
                            "username": "Kristian Bauer"
                        }
                    ],
                    "size": 10
                },
                "created": "2013-01-02T16:12:23.000000",
                "description": "Pizza??? For breakfast?!?!",
                "foursquareVenueId": null,
                "latitude": 40.70322799682617,
                "liked": false,
                "likes": {
                    "count": 1,
                    "nextPage": null,
                    "previousPage": null,
                    "records": [
                        {
                            "avatarUrl": "https://vines.s3.amazonaws.com/avatars/1194B685-5366-40A9-B36A-A3403AA35716-2999-000000D804A9A9AA.jpg",
                            "created": "2013-01-02T16:26:28.000000",
                            "likeId": 898293141113806848,
                            "location": "NYC",
                            "userId": 5,
                            "username": "Dom Hofmann"
                        }
                    ],
                    "size": 10
                },
                "location": "NY USA",
                "longitude": -73.94598388671875,
                "postId": 898289598352990208,
                "postToFacebook": 0,
                "postToTwitter": 0,
                "promoted": 0,
                "tags": null,
                "thumbnailUrl": "http://vines.s3.amazonaws.com/thumbs/04DAF1DE-189D-4A14-829B-84932099763E-3016-000001F8531FB4AA_0.9.1.mp4.jpg",
                "userId": 108,
                "username": "Bobby McKenna",
                "videoLowURL": null,
                "videoUrl": "http://vines.s3.amazonaws.com/videos/04DAF1DE-189D-4A14-829B-84932099763E-3016-000001F8531FB4AA_0.9.1.mp4"
            }
        ],
        "size": 1
    }

## Get User Data

    GET https://api.vineapp.com/users/me
    GET https://api.vineapp.com/users/profiles/<userid>

### Response

    {
        "code": "",
        "data": {
            "username": "Bill",
            "following": 0,
            "followerCount": 1,
            "verified": 0,
            "description": "Vine.app example account",
            "avatarUrl": "https://vines.s3.amazonaws.com/avatars/123456789.jpg",
            "twitterId": 123456789,
            "userId": 123456789,
            "twitterConnected": 1,
            "likeCount": 0,
            "facebookConnected": 0,
            "postCount": 0,
            "phoneNumber": null,
            "location": "Paris, France",
            "followingCount": 0,
            "email": "xxx@example.com"
        },
        "success": true,
        "error": ""
    }

## Get User Timeline

    GET https://api.vineapp.com/timelines/users/<userid>

### Response

    {
        "code": "",
        "data": {
            "count": 0,
            "records": [],
            "nextPage": null,
            "previousPage": null,
            "size": 20
        },
        "success": true,
        "error": ""
    }

## Get Tag

    GET https://api.vineapp.com/timelines/tags/<tag>

### Response

    {
        "code": "",
        "data": {
            "count": 18,
            "records": [{
                "username": "Alex",
                "videoLowURL": "http://vines.s3.amazonaws.com/videos_500k/4C661F55-7836-439A-9A1C-20D1F7B93A4D-4037-00000258397B6E18_1.0.3. mp4?versionId=gq6LxdxP8okJliUFev5zvETn7Xk7_WAI",
                "liked": false,
                "postToTwitter": 0,
                "videoUrl": "http://vines.s3.amazonaws.com/videos/4C661F55-7836-439A-9A1C-20D1F7B93A4D-4037-00000258397B6E18_1.0.3. mp4?versionId=MQADrr3uVdIuMaPDSn0f2eolBGA2KBCF",
                "description": "My #design project. The theme for my calander is #mustaches #tribalprint #pattern and #handmade",
                "created": "2013-01-29T13:51:02.000000",
                "avatarUrl": "http://vines.s3.amazonaws.com/avatars/4A018ACF-FFDA-4A54-BF11-60ED4B989540-3586-000001A49A3F8A58. jpg?versionId=DIZg6F7hLMsdma1RoqjO6ZVGFs0Ovt8F",
                "userId": 123456789,
                "comments": {
                    "count": 0,
                    "records": [],
                    "nextPage": null,
                    "previousPage": null,
                    "size": 10
                },
                "thumbnailUrl": "http://vines.s3.amazonaws.com/thumbs/4C661F55-7836-439A-9A1C-20D1F7B93A4D-4037-00000258397B6E18_1.0.3.mp4. jpg?versionId=Y1xhPATvT4gdxkeBMBTafWLGpOUaxMDj",
                "foursquareVenueId": null,
                "likes": {
                    "count": 0,
                    "records": [],
                    "nextPage": null,
                    "previousPage": null,
                    "size": 10
                },
                "postToFacebook": 0,
                "promoted": 0,
                "verified": 0,
                "postId": 123456789,
                "explicitContent": 0,
                "tags": [{
                    "tagId": 123456789,
                    "tag": "design"
                }, {
                    "tagId": 123456789,
                    "tag": "handmade"
                }],
                "location": null
            }],
            "nextPage": null,
            "previousPage": null,
            "size": 20
        },
        "success": true,
        "error": ""
    }

## Get Single Post

    GET https://api.vineapp.com/timelines/posts/<postid>

### Response

    {
        "code": "",
        "data": {
            "count": 0,
            "records": [],
            "nextPage": null,
            "previousPage": null,
            "size": 20
        },
        "success": true,
        "error": ""
    }

## Get Notifications

    GET https://api.vineapp.com/users/<userid>/pendingNotificationsCount

### Empty Response

    {
        "code": "",
        "data": 1,
        "success": true,
        "error": ""
    }

### Response

    {
        "code": "",
        "data": {
            "count": 1,
            "records": [{
                "body": "<: user | vine://user-id/123456789 :>some user<:> is now following you!",
                "displayUserId": 123456789,
                "thumbnailUrl": null,
                "verified": 0,
                "avatarUrl": "https://vines.s3.amazonaws.com/avatars/123456789.jpg",
                "notificationTypeId": 1,
                "created": "2013-01-29T12:16:06.000000",
                "userId": 123456789,
                "displayAvatarUrl": "https://vines.s3.amazonaws.com/avatars/123456789.jpg",
                "notificationId": 123456789,
                "postId": null
            }],
            "nextPage": null,
            "previousPage": null,
            "size": 250
        },
        "success": true,
        "error": ""
    }
