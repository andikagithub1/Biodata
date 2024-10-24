<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $profile_img = "";

    // Handle file upload
    if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] == 0) {
        $allowed = ['png', 'gif'];
        $file_name = $_FILES['profile_img']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, $allowed)) {
            $new_file_name = uniqid() . '.' . $file_ext;
            move_uploaded_file($_FILES['profile_img']['tmp_name'], "uploads/" . $new_file_name);
            $profile_img = $new_file_name;
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO biodata (name, email, phone, bio, profile_img) VALUES ('$name', '$email', '$phone', '$bio', '$profile_img')";

    if ($conn->query($sql) === TRUE) {
        echo "Biodata submitted successfully!";
        echo "<a href='biodata_list.php'>View all biodata</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
