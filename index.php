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
  <link href="style.css" rel="stylesheet">
  <link rel="icon" type="image/jpg" href="favicon.jpg" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.jpg" />
  <script src="http://code.jquery.com/jquery-1.7.2.js"></script>
  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <title>Multimedia Player</title>
</head>

<body>
  <?php if(!empty($_GET['url']) && isset($_GET['url'])) { ?>
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
  <?php } else {?>
    <header><h1>Multimedia Player</h1></header>
    <section id="text">
    <img src="http://lecteur.mikeprod.com/logo.png">
      <h2>Welcome</h2>
      How to use : Enter your media link below. If your url has no extension you can select the proper one in the list.<br>
      You can directly access the player by passing your url by parameter as follow : http://lecteur.mikeprod.com/?url=myurl&amp;ext=forcedExtension
    </section>
    <section><form method="get">
      <input name="url" type="url" placeholder="Type or paste the url of your media here" autofocus size="60"></input>
      <select name="ext">
        <option value="">Choose *.ext</option>
        <option value="mp3">mp3</option>
        <option value="wav">wav</option>
        <option value="ogg">ogg</option>
        <option value="aiff">aiff</option>
        <option value="aiff">aiff</option>
        <option value="flac">flac</option>
        <option value="flac">flac</option>
        <option value="m4a">m4a</option>
        <option value="oga">oga</option>
        <option value="wma">wma</option>
        <option value="webm">webm</option>
        <option value="mp4">mp4</option>
        <option value="mkv">mkv</option>
        <option value="avi">avi</option>
        <option value="flv">flv</option>
        <option value="vob">vob</option>
        <option value="mov">mov</option>
        <option value="ogv">ogv</option>
        <option value="qt">qt</option>
        <option value="wmv">wmv</option>
        <option value="m4p">m4p</option>
        <option value="m4v">m4v</option>
        <option value="mpg">mpg</option>
        <option value="mp2">mp2</option>
        <option value="mpeg">mpeg</option>
        <option value="m2v">m2v</option>
        <option value="3gp">3gp</option>
        <option value="f4v">f4v</option>
        <option value="f4p">f4p</option>
      </select>
      <input type="submit" value="Play"></input>
    </form></section>

    <section id="notice">No data is gathered on the server with this player. Copyright Mikeprod 2016</section>
  <?php } ?>
</body>
</html>