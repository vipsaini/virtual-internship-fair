<?php
include_once("php_includes/check_login_status.php");
$sql = "SELECT username, avatar FROM users WHERE avatar IS NOT NULL AND company='1' ORDER BY RAND() LIMIT 32 ";
$query = mysqli_query($db_conx, $sql);
$userlist = "";
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$u = $row["username"];
	$avatar = $row["avatar"];
	$profile_pic = 'user/'.$u.'/'.$avatar;
	$userlist .= '<a title="'.$u.'"><img src="'.$profile_pic.'" alt="'.$u.'" style="width:100px; height:100px; margin:10px;"></a>';
}//href="user.php?u='.$u.'" 
$sql = "SELECT COUNT(id) FROM users WHERE activated='1'";
$query = mysqli_query($db_conx, $sql);
$row = mysqli_fetch_row($query);
$usercount = $row[0];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Online Internship Fair</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style/style.css">
<script src="js/main.js"></script>
</head>
<body>
	<?php include_once("template_pageTop.php"); ?>
	<div id="pageMiddle">
		<!--<h3> Total companies: <?php echo $usercount; ?></h3>--> 
		<p> Hurry up! Sign Up now to participate in internship fair. </p>
		<h3> Companies for internship this week:</h3>
		<?php echo $userlist; ?>
	</div>
	<?php include_once("template_pageBottom.php"); ?>
</body>
</html>