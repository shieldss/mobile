<?php
////////////////////////////Header////////////////////////////
$pagetitle = '<img src="images/wrlc-logo-8-white.png" height="30px" style="position:absolute; margin:-2px 0 0 -38px;" /> WRLC Mobile';

include 'include/header.php';

////////////////////////////Page Content////////////////////////////

if (isset($_SESSION["id"]))
{ 
	if (isset($finesfees) and ($finesfees !=0)) { echo '<a href="fines.php" class="fixedbutton top red">$'.$finesfees.'</a>';
	}

$lib2 = ($_SESSION["loc"]);
$lib = strtolower($lib2);

//define variables based on Library for database queries
$libhours = mysql_real_escape_string($lib.'_libhours');
$libhoursLoc = mysql_real_escape_string($lib.'_libhoursLoc');
$libhoursSpecial = mysql_real_escape_string($lib.'_libhours_special');
$holidays = mysql_real_escape_string($lib.'_holidays');
$session = mysql_real_escape_string($lib.'_session_date');
$date = date('Ymd');

echo '<div class="card white">
<h2 class="account-title '.$lib.'"></h2>
<center>';
$icon = array(
    'fa-user',
    'fa-angellist',
    'fa-child',
	'fa-bicycle',
	'fa-smile-o',
	'fa-soccer-ball-o',
	'fa-anchor',
	'fa-bell',
	'fa-graduation-cap',
	'fa-meh-o',
	'fa-star',
	'fa-umbrella',
	'fa-paw',
	'fa-user-md',
	'fa-rocket');
	
	$a=array("green","light-green","lime","orange","deep-orange","yellow","amber","brown","red","gray","blue-gray","blue","light-blue","wrlc","purple","deep-purple","pink","indigo","cyan","teal");
	$random_keys=array_rand($a,3);
	$randomcolor = $a[$random_keys[0]];

	
echo '<div class="account-circle '.$randomcolor.'"><a href="account.php" style="text-decoration:none;"><i class="fa '.$icon[rand(0, count($icon) - 1)].'" style="font-size:2em; color:#fff; margin-top:-3px;"></i></a></div>
<h2>'. $displayname.'</h2>'
.$Institution.'<br />';
	 include('include/hours-today.php'); 
echo '<br />
	 <hr /><br /> <table width="100%" align="center"><tr align="center">
	 <td valign="absmiddle"><div id="slide-checked-out" class="info-circle teal"><a href="checked-out.php">'.$itemcount.'</a></div></td>
	 <td valign="absmiddle"><div id="slide-cls" class="info-circle green"><a href="cls.php">'.$CLSCount.'</a></div></td>
	 <td valign="absmiddle"><div id="slide-ill" class="info-circle cyan"><a href="ill.php">'.$ILLCount.'</a></div></td>
	 <td valign="absmiddle"><div id="slide-wdd" class="info-circle red"><a href="wdd.php">'.$WDDCount.'</a></div></td>
	 </tr>
	 <tr align="center">
	 <td id="fadein" class="summary" valign="absmiddle">Checked Out</td>
	 <td id="fadein" class="summary" valign="absmiddle">CLS Items</td>
	 <td id="fadein" class="summary" valign="absmiddle">ILL Items</td>
	 <td id="fadein" class="summary" valign="absmiddle">Web Docs</td>
	 </tr>
	 </table>
	 </center>';
}

else {	
	echo '<div class="card white">
	<center>
	<h2 class=" wrlc-bg2">
	</h2>';
	$messages = array(
    'Welcome to WRLC Mobile.',
    'Sup, Yo!',
    'Oh hey.  How are you?',
	'Looking for something? Search below.',
	'Thanks... It was dark in your pocket.');

	echo '
	<br />
	<form action="'.$searchsite.'" method="get">
	<input class="form-text" size="24" placeholder="Search Catalog" type="text" value="" name="s.q" id="search" />
	</center>
	<br />
	<button type="submit" class="form-submit-round submit-float" id="slide"><i class="fa fa-search"></i></button>
	
	</form>
	
	<h2 class="card-bottom teal-700">'.$messages[rand(0, count($messages) - 1)].'</h2>
	</div>
	
	<div class="home-nav-button"><center>
	<a href="account.php">My Account</a>   <a href="libraries.php">Locations and Hours</a></center></div>
	
	
	';	
	}
////////////////////////End Page Content////////////////////////////
////////////////////////////Footer////////////////////////////
include 'include/footer.php';
?>
