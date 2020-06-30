<!DOCTYPE html>
<html>
<body>

<?php

$servername="localhost";
$username="root";
$password="mysql";
$dbname="mertuzgul";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
		die("Baglanti kurulamadi: " . mysqli_connect_error());
}
$sql = "select salesman_name from salesmans";
$result = mysqli_query($conn,$sql) or die("Hata");

if(mysqli_num_rows($result)>0)
{
	echo "<form action='Go_SalesmanInfo.php' method='post'>";
	echo '<select name="salesmanInfo">';
	while($row=mysqli_fetch_array($result))
	{
		echo "<option value='" . $row["salesman_name"] . "'>";
		echo $row["salesman_name"];
		echo "</option>";
	}
	echo '</select>';
	echo '<input type="submit" value="Choose">';
	echo '</form>';
}
else
{
	echo "No result";
}
mysqli_close($conn);
?>

</body>
</html>