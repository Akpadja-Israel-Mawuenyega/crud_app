<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Application</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <h1>USER MANAGEMENT</h1>
  <a class="add-user-btn" href="create.php">Add User</a>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td>
            <a class="edit-btn" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a class="del-btn" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td style="text-align: center;" colspan="4">No users found</td>
      </tr>
    <?php endif; ?>
  </table>
</body>

</html>

<?php $conn->close(); ?>