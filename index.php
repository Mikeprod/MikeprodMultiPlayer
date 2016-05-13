<?php 
	function extUrl($urlString){
		$posDot=strrpos($urlString,".");
		$posSlash=strrpos($urlString,"/");

		if($posDot==False || $posSlash==False || $posDot<=$posSlash)
			return "noExt";
		else
			return substr($urlString, $posDot+1);
	}

	function ext2Type($extension){
		if($extension=="mkv" || $extension=="mp4" || $extension=="m4v" || $extension=="m4a")
			return "mp4";

		if($extension=="ogg" || $extension=="ogv" || $extension=="oga")
			return "ogg";

		if($extension=="flv" || $extension=="f4v")
			return "x-flv";

		if($extension=="wma" || $extension=="wmv")
			return "x-ms-".$extension;

		if($extension=="3gp")
			return "3gpp";

		if($extension=="mov" || $extension=="qt" || $extension=="vob")
			return "quicktime";

		if($extension=="mpg" || $extension=="mp2" || $extension=="mpeg")
			return "mpeg";

		return $extension;
	}

	$audioExts=array("mp3","wav","ogg","aiff","flac","m4a","oga","wma");
	$videoExts=array("webm","mp4","mkv","avi","flv","vob","mov","ogv","qt","wmv","m4p","m4v","mpg","mp2","mpeg","m2v","3gp","f4v","f4p");
	$source=False;
	$disableType=False;
	$ext="";
	$type="";
	$url="";
	
	if(!empty($_GET['url']) && isset($_GET['url'])){
		$url=$_GET['url'];
		if(!empty($_GET['ext']) && isset($_GET['ext']))
			$ext=strtolower($_GET['ext']);
		else
			$ext=strtolower(extUrl($url));

		if($ext!="noext"){
			for($i=0;$i<count($audioExts);$i++)
				if($ext==$audioExts[$i]){
					$type="audio";
					break;
				}

			for($i=0;$i<count($videoExts);$i++)
				if($ext==$videoExts[$i]){
					$type="video";
					break;
				}

			$source=True;
			$ext=ext2Type($ext);
		}

		if($type=="")
			$disableType=True;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		<link rel="icon" type="image/jpg" href="media/favicon.jpg" />
		<link rel="shortcut icon" type="image/x-icon" href="media/favicon.jpg" />
		<script src="http://code.jquery.com/jquery-1.7.2.js"></script>
		<!-- Support IE8 -->
		<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
		<title>Multimedia Player</title>
	</head>

	<body>
		<?php if(!empty($_GET['url']) && isset($_GET['url'])) { ?>
			<video id="my-video" class="video-js" autoplay controls preload="auto" poster="" data-setup='{"playbackRates":[0.5, 0.75, 1, 1.5, 2] }'>
				<?php if($source){?><source src="<?php echo $url;?>" <?php if(!$disableType) echo 'type="'.$type.'/'.$ext.'"'; ?>><?php } ?>
				<p class="vjs-no-js">
					To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
				</p>
			<object type="application/x-shockwave-flash" data="http://vjs.zencdn.net/4.12/video-js.swf" width="100%" height="100%" id="player_flash_api" name="player_flash_api" class="vjs-tech" style="display: block;">
				<param name="movie" value="http://vjs.zencdn.net/4.12/video-js.swf">
				<param name="flashvars" value="readyFunction=videojs.Flash.onReady&amp;eventProxyFunction=videojs.Flash.onEvent&amp;errorEventProxyFunction=videojs.Flash.onError&amp;autoplay=true&amp;preload=true&amp;loop=false&amp;muted=false&amp;file=<?php echo $url;?>">
				<param name="allowScriptAccess" value="always">
				<param name="allowNetworking" value="all">
				<param name="wmode" value="opaque">
				<param name="bgcolor" value="#000000">
			</object>
			</video>

			<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
			<script type="text/javascript">
				$( document ).ready(function() {
					$("#my-video").css("width",jQuery(document).width());
					$("#my-video").css("height",jQuery(document).height());
				});
			</script>

		<?php } else {?>
			
			<span id="forkongithub"><a href="https://github.com/Mikeprod/MikeprodMultiPlayer">Fork me on GitHub</a></span>
			<header><h1>Multimedia Player</h1></header>
			<section id="text">
				<img src="media/logo.png">
				<h2>Welcome</h2>
				How to use : Enter your media link below. If your url has no extension you can select the proper one in the list.
				<br>
				You can directly access the player by passing your url by parameter as follow : http://lecteur.mikeprod.com/?url=myurl&amp;ext=forcedExtension
			</section>
			<section>
				<form method="get">
					<input name="url" type="url" placeholder="Type or paste the url of your media here" autofocus size="60"></input>
					<select name="ext">
						<option value="">Choose your extension</option>
						<option>--------------- audio / video ---------------</option>
						<option value="ogg">ogg / ogv / oga</option>
						<option value="mp4">mp4 / mkv / m4v (H264 &amp; AAC) / m4a </option>
						<option value="">-------------------- audio --------------------</option>
						<option value="mp3">mp3</option>
						<option value="wav">wav</option>
						<option value="">-------------------- video --------------------</option>
						<option value="webm">webm</option>
						<option value="x-flv">flv / f4v</option>
						<option value="3gpp">3gp</option> <!-- Does not seem to be working -->
						<option value="quicktime">mov / qt / vob</option>
						<option value="avi">avi</option>
						<option value="mpeg">mpg / mp2 / mpeg</option>
					</select>
					<input type="submit" value="Play"></input>
				</form>
			</section>

			<section id="notice">No data is gathered on the server with this player. Copyright Mikeprod 2016</section>
		<?php } ?>
	</body>
</html>