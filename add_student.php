<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $gate = $_POST['gate'];
    $admission = $_POST['admission'];
    $passing = $_POST['passing'];

    // File uploads
    $photo = $_FILES['photo']['name'];
    $signature = $_FILES['signature']['name'];

    move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo);
    move_uploaded_file($_FILES['signature']['tmp_name'], "uploads/" . $signature);

    $sql = "INSERT INTO students 
    (RollNo, Name, Course, PhoneNo, GateNo, Year_of_admission, Passing_year, Photo, Signature)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiiss", $roll, $name, $course, $phone, $gate, $admission, $passing, $photo, $signature);

    $message = "";

    if ($stmt->execute()) {
        $message = "<div class='success'>✔ Student Added Successfully</div>";
    } else {
        $message = "<div class='error'>❌ Error: " . $conn->error . "</div>";
    }
}
?>

<?php if (!empty($message))
    echo $message; ?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <h2>Add Student</h2>

        <label>Roll No</label>
        <input type="text" name="roll" required>

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Course</label>
        <input type="text" name="course" required>

        <label>Phone</label>
        <input type="text" name="phone">

        <label>Gate No</label>
        <input type="text" name="gate">

        <label>Admission Year</label>
        <input type="number" name="admission">

        <label>Passing Year</label>
        <input type="number" name="passing">

        <label>Photo</label>
        <input type="file" name="photo">

        <label>Signature</label>
        <input type="file" name="signature">

        <button type="submit">Save</button>
    </form>
</div>

<script>
    setTimeout(() => {
        let msg = document.querySelector('.success, .error');
        if (msg) msg.style.display = 'none';
    }, 3000);
</script>