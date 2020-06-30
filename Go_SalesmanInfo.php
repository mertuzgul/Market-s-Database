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


$sql = "select salesman_name,products.product_name,products.price,customers.customer_name,sales.sale_date from salesmans inner join sales on sales.salesman_id = salesmans.salesman_id inner join products on products.product_id = sales.product_id inner join customers on customers.customer_id = sales.customer_id where salesman_name='". $_POST['salesmanInfo']."'";


$result = mysqli_query($conn,$sql) or die("Hata burda");

if(mysqli_num_rows($result) > 0)
{
	echo '<table cellpadding="10" cellspacing="10"';
	echo "table border='1'>";
	echo "<tr><td>Çalışan adı</td><td>Ürün adı</td><td>Fiyat</td><td>Müşteri Adı</td><td>Satış Tarihi</td>";
	while($row=mysqli_fetch_array($result))
	{
		echo"<tr>";
		echo "<td>" . $row["salesman_name"]. "</td><td>". $row["product_name"]. "</td><td>". $row["price"]. "</td><td>". $row["customer_name"]. "</td><td>". $row["sale_date"]. "</td>";
	}
	echo "</table>";
}
?>