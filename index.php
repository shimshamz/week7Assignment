<?php

echo "<h1>PDO demo!</h1>";
$username = 'sm2292';
$password = 'cadmium5';
$hostname = 'sql2.njit.edu';

$dsn = "mysql:host=$hostname;dbname=$username";

try {
    $conn = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;


// Assignment Begins

$id = 6

$query = 'SELECT * FROM accounts
		  WHERE id < :id';
$statement = $conn->prepare($query);
$statement->bindValue(':id', $id); 
$statement->execute();
$statement->closerCursor();
?>

<?php foreach ($accounts as $account) { ?>
<table>
	<tr>
		<td><?php echo $account['id']; ?></td>
		<td><?php echo $account['email']; ?></td>
	</tr>
</table>
<?php } ?>