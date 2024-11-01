=== Xtreme MP3 Player v2 ===
Contributors: Flashtuning 
Tags: as3, audio, buttons, list, mp3, mp3 player, playlist, repeat, scroll, shuffle, xml
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: trunk

The most advanced XML MP3 Player application. No Flash Knowledge required to insert the MP3 Player SWF inside the HTML page(s) of your site.

== Description ==

XML MP3 Player / Playlist MP3 Player / Audio Player. 

**Features**

* No Flash Knowledge required to insert the player SWF inside the HTML page(s) of your site
* Fully customizable XML driven content and layout
* Unlimited number of albums / artists support
* Unlimited number of songs per album / artist support
* It includes three player layout modes
* It includes three Sound Spectrum models
* Play / Pause / Stop Buttons
* Volume Button / Volume Bar / Seek Bar
* Previous / Next Buttons
* Show / Hide Playlist Button
* Repeat / Shuffle Buttons
* Elapsed Time and Total Duration
* Artist / Song title / Song Thumbnail
* Navigation Buttons Tooltip support
* Optionally set the XML settings file path in HTML using FlashVars



== Installation ==

1. Download the plugin and upload it to the **/wp-content/plugins/** directory. Activate through the 'Plugins' menu in WordPress.
2. Download the [Free XtremeMp3Player](http://www.flashtuning.net/free-flash-files "Xtreme Mp3 Player") and copy the content of the archive in **wp-content** folder. (e.g: "http://www.yoursite.com/wp-content/flashtuning/xtreme-mp3-player-v2")
3. Insert the swf into post or page using this tag: `[xtreme-mp3-player-v2]`. The default values for width and height are 255 325. If you want other values write the width and height attributes into the tag like so: `[xtreme-mp3-player-v2 width="yourvalue" height="yourvalue"]`
4. To configure the MP3 Player general parameters use the settings.xml located on **xml** folder. For individual mp3 player items use the content.xml file (image path, image link and more). 
5. If you want to use multiple instances of Xtreme MP3 Player v2 on different pages. Follow this steps:
a. Modify the content.xml (/wp-content/flashtuning/xtreme-mp3-player-v2/xml) file according to your needs and rename it (eg.: content2.xml)
b. Copy the modified xml file to **wp-content/flashtuning/xtreme-mp3-player-v2/xml** folder
c. Use the **xml** attribute `[xtreme-mp3-player xml="content2.xml"]` when you insert the mp3 player on a page.
4. Optionally for custom pages use this php function: **xtremeMP3PlayerV2Echo(width,height,xmlFile)** (e.g: **xtremeMP3PlayerV2Echo(255,325,'content.xml')** )


== Screenshots ==

1. Fully customizable XML driven content (see the online demo at [Flashtuning.net](http://www.flashtuning.net/audio-mp3-player/x-treme-mp3-player-albums-sound-spectrum.html "Sample Xtreme MP3 Player v2") ). No Flash Knowledge required to insert the MP3 Player SWF inside the HTML page(s) of your site.

