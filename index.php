<title>Has Rio checked his email yet?</title>
<style>
body {
	width:600px;
	
	background:#eee;
	margin:0 auto;
	font-family:Helvetica Neue, Helvetica, sans-serif;
margin-top:30px;
}
h1 {
	font-size:300px;
	padding:0;
	font-weight:100;
	margin:0;
}
</style>
<h2>Has Rio checked his email recently?</h2>
<?php 
include("conf2.php");    

function _ago($tm,$rcs = 0) {
   $cur_tm = time(); $dif = $cur_tm-$tm;
   $pds = array('second','minute','hour','day','week','month','year','decade');
   $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
   for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

   $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
   if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
   return $x;
}    

$query = sprintf("select * from mailchecked order by time desc limit 0, 1");    
$result = mysql_query($query);
$curtime = time();
while ($row = mysql_fetch_assoc($result)) {
  if ($curtime - $row["time"] > 10000) {
  	echo "<h1>NO</h1>";
  } else {
  	echo "<h1>YES</h1>";
  	echo _ago($row["time"])." ago";	
  }
}
?>

<?php
/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'email@gmail.com';
$password = 'passwordy';

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'UNSEEN');

/* if emails are returned, cycle through each... */
if($emails) {
	
	echo "but you are among the ".count($emails)." currently unread in my inbox. (<a href='http://davidwalsh.name/gmail-php-imap'>Legitimately</a>!).";
	
	
} 

/* close the connection */
imap_close($inbox);

?>