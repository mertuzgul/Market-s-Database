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


$sql="select salesman_name,count(sale_id) from salesmans inner join sales on salesmans.salesman_id = sales.sale_id group by salesman_name";



$result2 = mysqli_query($conn,$sql) or die("Hata burda");

if(mysqli_num_rows($result2) > 0)
{
	echo '<table cellpadding="10" cellspacing="10"';
	echo "table border='1'>";
	echo "<tr><td>Çalışan Adı</td><td>Satış miktarı</td>";
	while($row=mysqli_fetch_array($result2))
	{
		echo"<tr>";
		echo "<td>" . $row["salesman_name"]. "</td><td>". $row["count(sale_id)"]. "</td>";
	}
	echo "</table>";
}
?>