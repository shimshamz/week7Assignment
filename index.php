<?php

echo "<h1>PDO demo!</h1>";
$username = 'sm2292';
$password = 'cadmium5';
$hostname = 'sql2.njit.edu';

$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
    $id = 6;
	$query = 'SELECT * FROM accounts WHERE id < :id';
	$statement = $conn->prepare($query);
	$statement->bindValue(':id', $id); 
	$statement->execute();
	$accounts = $statement->fetchAll();
	$count = $statement->rowCount();
	echo "Results: $count<br>";
	
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>

<table border="1">
	<th>ID</th>
	<th>Email</th>
<?php foreach ($accounts as $account) { ?>
	<tr>
		<td><?php echo $account['id'];?></td>
		<td><?php echo $account['email'];?></td>
	</tr>
<?php }
$statement->closerCursor();
?>
</table>