<?
	session_start();
	$group_id=$_REQUEST['selTeam'];
	$health=$_REQUEST['hp'];
	$dis_name=$_REQUEST["dis_name"];
	$sq_location=" # LOCATION # ";
	$sq_user=" # USER # ";
	$sq_pass=" # PASS # ";
	$sq_db=" # DATABASE # ";
	$conn = mysql_connect($sq_location,$sq_user,$sq_pass) or die("Error: could not connect to SQL Server\n");
	mysql_select_db($sq_db) or die("Error: could not connect to database\n");
	$res=mysql_query("SELECT * FROM `player_status` WHERE `group_number` = $group_id ");
	while($row=mysql_fetch_row($res))
	{
		$tmp=$row[1];
	}
	$sum=$tmp+$health;
	$res=mysql_query("UPDATE `vletpaoh_premwit`.`player_status` 
					  SET `Hp` = $sum 
					  WHERE CONVERT( `player_status`.`group_number` USING utf8 ) = $group_id 
					  LIMIT 1 ;");
	$_SESSION['st']=801;
	mysql_close();
	header('Location: index.php');
?>