# Mikeprod Multimedia Player
Source for the multimedia player at lecteur.mikeprod.com

This player uses the Videojs player available at http://videojs.org

## Usage 
You are free to use it on your website as follows : 
`http://lecteur.mikeprod.com/?url=yourMediaUrl`

If your url has no multimedia extension or a wrong one you can force it by using the following :
`http://lecteur.mikeprod.com/?url=yourMediaUrl&ext=theRealExt`

## HTML5 video codec compatibilities

|            | MPEG-4 ASP | H.264		| Ogg Theora  | WebM (VP8) 	| WebM (VP9) 	|
| ---------- | ---------- | ----------- | ----------- | ---------- 	| -------------	|
| Firefox 	 | 	No 		  | Yes (>=21) 	| Yes (>=3.6) | Yes (>=11) 	| Yes (>=28) 	|
| Chrome	 | 	No 		  | Yes 		| Yes 		  | Yes 		| Yes (>=29) 	|
| IE  		 | 	No 		  | Yes (>=9) 	| No 		  | No 			| No 		 	|
| Edge 		 | 	Yes		  | Yes 		| No 		  | No 			| No 		 	|
| Opera 	 | 	No  	  | Yes (>=26) 	| Yes 		  | Yes 		| Yes (>=18) 	|
| Safari	 | 	Yes		  | Yes 		| No 		  | No 			| No 		 	|
| Android	 | 	No  	  | Yes (>=4.4) | No 		  | Yes (>=4.4) | Yes(>=4.4.3) 	|
| iOS  		 | 	Yes		  | Yes 		| No 		  | No 			| No 		 	|


## HTML5 audio codec compatibilities

|            | AAC 			| MP3 		| Ogg Vorbis | Ogg Opus  | WebM Vorbis | WebM Opus | PCM 		|
| ---------- | ------------ | --------- | ---------- | --------- | ----------- | --------- | ----------	|
| Firefox 	 | Yes (>=21)	| Yes (>=21)| Yes (>=3.6)| Yes (>=16)| Yes (>=11)  | Yes (>=28)| Yes (>=3.6)|
| Chrome	 | Yes 			| Yes		| Yes		 | Yes (>=33)| Yes		   | Yes (>=33)| Yes 		|
| IE  		 | Yes (>=9)	| Yes (>=9) | No		 | No 		 | No		   | No 	   | No 		|
| Edge 		 | Yes			| Yes		| No		 | No 		 | No		   | No 	   | Yes (>=13) |
| Opera 	 | Yes (>=26)	| Yes (>=26)| Yes		 | Yes (>=20)| Yes		   | Yes (>=20)| Yes		|
| Safari	 | Yes			| Yes		| No 		 | No 		 | No		   | No 	   | No 		|
| Android	 | Yes (>=4.4)	| Yes		| Yes (>=4.4)| No 		 | Yes (>=4.4) | No 	   | Yes(>=4.4) |
| iOS  		 | Yes			| Yes		| No 		 | No 		 | No 		   | No 	   | Yes (<=7)	|

## Video streaming support
This feature was added to the 4.2.0 release of video.js and supports streams with the following format `rtmp/mp4` and `rtmp/flv`
The source url must follow the following format : `rtmp://your.streaming.provider.net/cfx/st/&mp4:path/to/video.mp4`

If you do not understand how it is formated here is a litteral explanation : The streaming server **&** The type of stream (mp4 or flv) **:** The path to the video 

Reference : [Streaming Playback](https://github.com/videojs/video.js/blob/master/docs/guides/tech.md) from video.js
## Improvements
Share it in the issue tab :)
