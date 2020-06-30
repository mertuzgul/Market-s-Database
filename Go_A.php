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


$sql = "select markets.market_name,count(sale_id) from cities inner join markets on cities.city_id = markets.city_id inner join salesmans on salesmans.market_id = markets.market_id inner join sales on salesmans.salesman_id = sales.salesman_id where cities.city='".$_POST['cityname']."' group by market_name";


$result = mysqli_query($conn,$sql) or die("Hata burda");

if(mysqli_num_rows($result) > 0)
{
	echo '<table cellpadding="10" cellspacing="10"';
	echo "table border='1'>";
	echo "<tr><td>Marketler</td><td>Satılan ürünlerin sayısı</td>";
	while($row=mysqli_fetch_array($result))
	{
		echo"<tr>";
		echo "<td>" . $row["market_name"]. "</td><td>". $row["count(sale_id)"]. "</td>";
	}
	echo "</table>";
}
?>