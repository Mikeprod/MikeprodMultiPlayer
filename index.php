<?php 
  function extUrl($urlString){
   $posDot=strrpos($urlString,".");
   $posSlash=strrpos($urlString,"/");

   if($posDot==False || $posSlash==False || $posDot<=$posSlash)
    return "noExt";
   else
    return substr($urlString, $posDot+1);
  }
  
  $audioExts=array("mp3","wav","ogg","aiff","flac","m4a","oga","wma");
  $videoExts=array("webm","mp4","mkv","avi","flv","vob","mov","ogv","qt","wmv","m4p","m4v","mpg","mp2","mpeg","m2v","3gp","f4v","f4p");
  $source=False;
  $disableType=False;
  $type="";
  $ext="";
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
    }
    
    if($type=="")
      $disableType=True;

  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.7.2.js"></script>
  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <title>Lecteur Multimedia</title>
  <style>body{margin:0;}</style>
</head>

<body>
  <video id="my-video" class="video-js" autoplay controls preload="auto" poster="" data-setup='{"playbackRates":[0.5, 0.75, 1, 1.5, 2] }'>
    <?php if($source){?><source src="<?php echo $url;?>" <?php if(!$disableType) echo 'type="'.$type.'/'.$ext.'"'; ?>><?php } ?>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>

  <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
  <script type="text/javascript">
  $( document ).ready(function() {
    $("#my-video").css("width",jQuery(document).width());
    $("#my-video").css("height",jQuery(document).height());
  });
    
  </script>
</body>
</html>