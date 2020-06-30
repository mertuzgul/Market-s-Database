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
//bölgeler
$sql="select district,count(sale_id) from districts inner join cities on cities.district_id = districts.district_id inner join markets on markets.city_id = cities.city_id inner join salesmans on salesmans.market_id = markets.market_id inner join sales on sales.salesman_id = salesmans.salesman_id group by district";

$result = mysqli_query($conn,$sql) or die("HATA_1");



if(mysqli_num_rows($result)>0)
{
	echo '<table cellpadding="10" cellspacing="10"';
	echo "table border='1'>";
	echo "<tr><td>Bölgeler</td><td>Satış sayısı</td>";
	while($row=mysqli_fetch_array($result))
	{
		echo"<tr>";
		echo "<td>" . $row["district"]. "</td><td>". $row["count(sale_id)"]. "</td>";
	}
	echo "</table>";
}
//marketler
$sql="select market_name,count(sale_id) from markets inner join salesmans on salesmans.market_id = markets.market_id inner join sales on sales.salesman_id = salesmans.salesman_id group by market_name";

$result2 = mysqli_query($conn,$sql) or die("HATA_2");

if(mysqli_num_rows($result2)>0)
{
	echo '<table cellpadding="10" cellspacing="10"';
	echo "table border='1'>";
	echo "<tr><td>Marketler</td><td>Satış sayısı</td>";
	while($row=mysqli_fetch_array($result2))
	{
		echo"<tr>";
		echo "<td>" . $row["market_name"]. "</td><td>". $row["count(sale_id)"]. "</td>";
	}
	echo "</table>";
}

?>