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


$sql="select product_name,count(sale_id) from products inner join sales on products.product_id = sales.product_id group by product_name";



$result = mysqli_query($conn,$sql) or die("Hata burda");

if(mysqli_num_rows($result) > 0)
{
	echo '<table cellpadding="10" cellspacing="10"';
	echo "table border='1'>";
	echo "<tr><td>Ürünler</td><td>Satış miktarı</td>";
	while($row=mysqli_fetch_array($result))
	{
		echo"<tr>";
		echo "<td>" . $row["product_name"]. "</td><td>". $row["count(sale_id)"]. "</td>";
	}
	echo "</table>";
}
?>