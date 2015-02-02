<?php
date_default_timezone_set("Asia/Shanghai");
echo "当前时间是 ". date("Y-m-d h:i:s");
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<textarea name="huifu" cols="100" rows="7"></textarea>
<br><br>
<input type="submit" name="submit" value="提交"> 
</form>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  if (mysql_query("CREATE DATABASE my_db",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

mysql_select_db("my_db", $con);
$sql = "CREATE TABLE H 
(
content varchar(150)
)";
mysql_query($sql,$con);
  
mysql_select_db("my_db", $con);

mysql_query("INSERT INTO  H(content) 
VALUES('$_POST[huifu]')");

$result = mysql_query("SELECT * FROM H");

while($row = mysql_fetch_array($result)) {
 ?>
   <div id="list" style="width:700px;height:100px;margin-bottom:5px;border:1px solid #ccc;">
    <?php echo $row['content'];?>
	<!--<p style="color:9B9B9B">
	<?php
echo $row['time'];
?></p>-->
   </div>
  <?php
  }
mysql_close($con);
?>