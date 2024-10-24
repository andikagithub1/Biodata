<?php
include 'db.php';

$sql = "SELECT * FROM biodata";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Biodata</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Submitted Biodata</h2>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="profile">
                <h3><?php echo $row['name']; ?></h3>
                <p>Email: <?php echo $row['email']; ?></p>
                <p>Phone: <?php echo $row['phone']; ?></p>
                <p>Bio: <?php echo $row['bio']; ?></p>
                <?php if ($row['profile_img']): ?>
                    <img src="uploads/<?php echo $row['profile_img']; ?>" alt="Profile Image">
                <?php else: ?>
                    <img src="default.png" alt="Default Profile Image">
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No biodata found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</div>

</body>
</html>
