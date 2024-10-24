<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Biodata Form</title>
    <link rel="stylesheet" href="css/style.css"> <!-- External CSS -->
</head>
<body>

    <div class="container">
        <h2>Biodata Form</h2>
        <form action="process_biodata.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" name="name" required>

            <label for="email">Email</label>
            <input type="email" name="email" required>

            <label for="phone">Phone</label>
            <input type="text" name="phone" required>

            <label for="bio">Bio</label>
            <textarea name="bio" rows="5" required></textarea>

            <label for="profile_img">Profile Image (PNG/GIF)</label>
            <input type="file" name="profile_img" accept="image/png, image/gif">

            <input type="submit" value="Submit Biodata">
        </form>
    </div>

</body>
</html>
