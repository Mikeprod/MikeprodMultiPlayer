# Mikeprod Multimedia Player
Source for the multimedia player at lecteur.mikeprod.com

This player uses the Videojs player available at http://videojs.org

## Usage 
You are free to use it on your website as follows : 
`http://lecteur.mikeprod.com/?url=yourMediaUrl`

If your url has no multimedia extension or a wrong one you can force it by using the following :
`http://lecteur.mikeprod.com/?url=yourMediaUrl&ext=theRealExt`

## HTML5 video codec compatibilities

|            | MPEG-4 ASP | H.264 | Ogg Theora | WebM (VP8) | WebM (VP9) |
| ---------- | ---------- | ----- | ---------- | ---------- | ---------- |
|   Firefox  | No | Yes (>=28) | Yes | Yes | Yes (>=28) |
| Chrome	 | No | Yes | Yes | Yes | Yes (>=36) |
| IE  		 | No | Yes | No | No | No |
| Edge 		 | Yes | Yes | No | No | No |
| Opera 	 | No | Yes (>=26) | Yes | Yes | Yes (>=26) |
| Safari	 | Yes | Yes | No | No | No |
| Android	 | No | Yes (>=4.4) | No | Yes (>=4.4) | Yes(>=4.4.3) |
| iOS  		 | Yes | Yes | No | No | No |

## Improvements

The possible media playable has not yet been tested.

Player CSS customisation

Others in the Issue tab
