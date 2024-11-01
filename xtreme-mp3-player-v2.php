<?php
/*
Plugin Name: Xtreme MP3 Player v2
Plugin URI: 
Description: The most advanced XML MP3 Player application. No Flash Knowledge required to insert the MP3 Player SWF inside the HTML page(s) of your site.
Version: 1.0
Author: Flashtuning 
Author URI: http://www.flashtuning.net
*/

$xtreme_player_swf_nr	= 0; 											

function xtremePlayerV2Start($xtreme_obj) {
	
	$txtP = preg_replace_callback('/\[xtreme-mp3-player-v2\s*(width="(\d+)")?\s*(height="(\d+)")?\s*(xml="([^"]+)")?\s*\]/i', 'xtremePlayerV2AddObj', $xtreme_obj); 
	
	return $txtP;
}

function xtremePlayerV2AddObj($xtreme_player_param) {

    global $xtreme_player_swf_nr; //number of swfs
	$xtreme_player_swf_nr++;
	
	$xtreme_player_rand = substr(rand(),0,3);
	
	$xtreme_player_dir = WP_CONTENT_URL .'/flashtuning/xtreme-mp3-player-v2/';
	$xtreme_player_swf = $xtreme_player_dir.'mp3.swf';
	$xtreme_player_config = "swfobj2";
	
	if ($xtreme_player_param[2] !=""){$xtreme_player_width = $xtreme_player_param[2];}
	else {$xtreme_player_width = 255;}
	
	if ($xtreme_player_param[4] !=""){$xtreme_player_height = $xtreme_player_param[4];}
	else {$xtreme_player_height = 325;}
	
	if ($xtreme_player_param[6] !=""){$xtreme_player_xml  = $xtreme_player_dir.'xml/'.$xtreme_player_param[6];}
	else {$xtreme_player_xml = $xtreme_player_dir.'xml/content.xml';}
	
	
	
	
	
	/*
		quality - low | medium | high | autolow | autohigh | best
		bgcolor - hexadecimal RGB value
		wmode - Window | Opaque | Transparent
		allowfullscreen - true | false
		scale - noscale | showall | noborder | exactfit
		salign - L | R | T | B | TL | TR | BL | BR 
		allowscriptaccess - always | never | samedomain
	
	*/
	
	$xtreme_player_param = array("quality" =>	"high", "bgcolor" => "#FFFFFF", "wmode"	=>	"window", "version" =>	"9.0.0", "allowfullscreen"	=>	"true", "scale" => "noscale", "salign" => "TL", "allowscriptaccess" => "samedomain");
	
	if (is_feed()) {$xtreme_player_config = "xhtml";}

	
	if ($xtreme_player_config != "xhtml") {
		$xtreme_player_output = "<div id=\"xtreme-mp3-player".$xtreme_player_rand."\">Please install flash player.</div>";
	
	}
	
	switch ($xtreme_player_config) {
	
		case "xhtml":
			$xtreme_player_output.= "\n<object width=\"".$xtreme_player_width."\" height=\"".$xtreme_player_height."\">\n";
			$xtreme_player_output.= "<param name=\"movie\" value=\"".$xtreme_player_swf."\"></param>\n";
			$xtreme_player_output.= "<param name=\"quality\" value=\"".$xtreme_player_param['quality']."\"></param>\n";
			$xtreme_player_output.= "<param name=\"bgcolor\" value=\"".$xtreme_player_param['bgcolor']."\"></param>\n";
			$xtreme_player_output.= "<param name=\"wmode\" value=\"".$xtreme_player_param['wmode']."\"></param>\n";
			$xtreme_player_output.= "<param name=\"allowFullScreen\" value=\"".$xtreme_player_param['allowfullscreen']."\"></param>\n";
			$xtreme_player_output.= "<param name=\"scale\" value=\"".$xtreme_player_param['scale']."\"></param>\n";
			$xtreme_player_output.= "<param name=\"salign\" value=\"".$xtreme_player_param['salign']."\"></param>\n";
			$xtreme_player_output.= "<param name=\"allowscriptaccess\" value=\"".$xtreme_player_param['allowscriptaccess']."\"></param>\n";
			$xtreme_player_output.= "<param name=\"base\" value=\"".$xtreme_player_dir."\"></param>\n";
			$xtreme_player_output.= "<param name=\"FlashVars\" value=\"content=".$xtreme_player_xml."\"></param>\n";
			
			
			$xtreme_player_output.= "<embed type=\"application/x-shockwave-flash\" width=\"".$xtreme_player_width."\" height=\"".$xtreme_player_height."\" src=\"".$xtreme_player_swf."\" ";
			$xtreme_player_output.= "quality=\"".$xtreme_player_param['quality']."\" bgcolor=\"".$xtreme_player_param['bgcolor']."\" wmode=\"".$xtreme_player_param['wmode']."\" scale=\"".$xtreme_player_param['scale']."\" salign=\"".$xtreme_player_param['salign']."\" allowScriptAccess=\"".$xtreme_player_param['allowscriptaccess']."\" allowFullScreen=\"".$xtreme_player_param['allowfullscreen']."\" base=\"".$xtreme_player_dir."\" FlashVars=\"content=".$xtreme_player_xml."\"  ";
			
			$xtreme_player_output.= "></embed>\n";
			$xtreme_player_output.= "</object>\n";
			break;
	
		default:
		
			$xtreme_player_output.= '<script type="text/javascript">';
			$xtreme_player_output.= "swfobject.embedSWF('{$xtreme_player_swf}', 'xtreme-mp3-player{$xtreme_player_rand}', '{$xtreme_player_width}', '{$xtreme_player_height}', '{$xtreme_player_param['version']}', '' , { content: '{$xtreme_player_xml}'}, {base: '{$xtreme_player_dir}', wmode: '{$xtreme_player_param['wmode']}', scale: '{$xtreme_player_param['scale']}', salign: '{$xtreme_player_param['salign']}', bgcolor: '{$xtreme_player_param['bgcolor']}', allowScriptAccess: '{$xtreme_player_param['allowscriptaccess']}', allowFullScreen: '{$xtreme_player_param['allowfullscreen']}'}, {});";
			$xtreme_player_output.= '</script>';
	
			break;
					
	}
	return $xtreme_player_output;
}

function xtremeMP3PlayerV2Echo($xtreme_player_width, $xtreme_player_height, $xtreme_player_xml) {
    echo xtremePlayerV2AddObj( array( null, null, $xtreme_player_width, null, $xtreme_player_height, null, $xtreme_player_xml) );
}




function xtremePlayerV2Admin() {

if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }


?>
		<div class="wrap">
			<h2>Xtreme MP3 Player v2 1.0</h2>
					<table>
					<tr>
						<th valign="top" style="padding-top: 10px;color:#FF0000;">
							!IMPORTANT: Copy the flashtuning folder(located in Wordpress folder) to the wp-content folder on your server. (eg.: http://www.yoursite.com/wp-content/flashtuning/xtreme-mp3-player-v2/)
						</th>

					</tr>
                    <tr>
						<td>
					      <ul>
					        <li>1. Insert the swf into post or page using this tag: <strong>[xtreme-mp3-player-v2]</strong>.</li>
                            <li>2. If you want to modify the width and height of the mp3 player insert this attributes into the tag: <strong>[xtreme-mp3-player-v2 width="yourvalue" height="yourvalue"]</strong></li>
   					        <li>3. If you want to use multiple instances of Xtreme MP3 Player v2 on different pages. Follow this steps:
                            	<ul>
	                          <li>a. Modify the content.xml (/wp-content/flashtuning/xtreme-mp3-player-v2/xml) file according to your needs and rename it (eg.: content2.xml) </li>
                              <li>b. Copy the modified xml file to <strong>wp-content/flashtuning/xtreme-mp3-player-v2/xml</strong> folder</li>
                              <li>c. Use the <strong>xml</strong> attribute [xtreme-mp3-player-v2 xml="content2.xml"] when you insert the mp3 player on a page. </li>
                                </ul>
                            <li>4. Optionally for custom pages use this php function: <strong>xtremeMP3PlayerV2Echo(width,height,xmlFile)</strong> (e.g: xtremeMP3PlayerV2Echo(255,325,'content.xml') )</li>                  
                            </ul>
						</td>
				  </tr>
                    
					<tr>
						<td>
						  <p>Check out other useful links. If you have any questions / suggestions, please leave a comment on the component page. </p>
					      <ul>
					        <li><a href="http://www.flashtuning.net">Author Home Page</a></li>
			                <li><a href="http://www.flashtuning.net/audio-mp3-player/x-treme-mp3-player-albums-sound-spectrum.html">Xtreme MP3 Player v2 Page</a> </li>
			           </ul>
						</td>
				  </tr>
				</table>
			
		</div>
		
<?php
}
function xtremePlayerV2AdminAdd() {
	
	add_options_page('Xtreme MP3 Player Options', 'Xtreme MP3 Player', 'manage_options','xtrememp3player', 'xtremePlayerV2Admin');
}

function xtremePlayerV2SwfObj() {
		wp_enqueue_script('swfobject');
	}


add_filter('the_content', 'xtremePlayerV2Start');
add_action('admin_menu', 'xtremePlayerV2AdminAdd');
add_action('init', 'xtremePlayerV2SwfObj');
?>