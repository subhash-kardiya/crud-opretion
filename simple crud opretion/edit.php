<?php
$conn = new mysqli("localhost", "root", "", "task1");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$users = $result->fetch_assoc();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $phone = $_POST['phone'];
  $website = $_POST['website'];
  $gender = $_POST['gender'];
  $hobbies = implode(", ", $_POST['hobbies'] ?? []);
  $country = $_POST['country'];
  $birthdate = $_POST['birthdate'];
  $time = $_POST['time'];
  $message = $_POST['message'];
  $status = $_POST['status'];

  $update = "UPDATE users SET 
      username='$username', 
      password='$password', 
      email='$email', 
      age='$age', 
      phone='$phone', 
      website='$website', 
      gender='$gender', 
      hobbies='$hobbies',
      country='$country', 
      birthdate='$birthdate', 
      contact_time='$time', 
      message='$message', 
      status='$status' 
      WHERE id=$id";

  if ($conn->query($update)) {
    echo "<script>alert('Data updated successfully!'); window.location='add.php';</script>";
  } else {
    echo "<script>alert('Update failed: " . $conn->error . "');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #56ab2f, #a8e063);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }

    .form-container {
      background: #fff;
      border-radius: 15px;
      padding: 35px 40px;
      width: 100%;
      max-width: 650px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .form-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    h2 {
      text-align: center;
      color: #28a745;
      font-weight: 700;
      margin-bottom: 25px;
    }

    label {
      font-weight: 600;
      margin-top: 12px;
      color: #333;
    }

    input, select, textarea {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-top: 5px;
      font-size: 15px;
    }

    .radio-group, .checkbox-group {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
      margin-top: 8px;
    }

    .btn-custom {
      width: 48%;
      border: none;
      color: #fff;
      font-weight: bold;
      padding: 10px;
      border-radius: 10px;
      transition: 0.3s ease;
    }

    .btn-update {
      background: #007bff;
    }
    .btn-update:hover {
      background: #0056b3;
      transform: scale(1.05);
    }

    .btn-reset {
      background: #dc3545;
    }
    .btn-reset:hover {
      background: #b02a37;
      transform: scale(1.05);
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      font-weight: 600;
      color: #007bff;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Edit User</h2>
  <form method="post" enctype="multipart/form-data">

    <label>Full Name:</label>
    <input type="text" name="username" value="<?= $users['username']; ?>" required>

    <label>Password:</label>
    <input type="password" name="password" value="<?= $users['password']; ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $users['email']; ?>" required>

    <label>Age:</label>
    <input type="number" name="age" min="1" max="100" value="<?= $users['age']; ?>">

    <label>Phone:</label>
    <input type="tel" name="phone" value="<?= $users['phone']; ?>">

    <label>Website:</label>
    <input type="url" name="website" value="<?= $users['website']; ?>">

    <label>Gender:</label>
    <div class="radio-group">
      <label><input type="radio" name="gender" value="Male" <?= ($users['gender'] == 'Male') ? 'checked' : '' ?>> Male</label>
      <label><input type="radio" name="gender" value="Female" <?= ($users['gender'] == 'Female') ? 'checked' : '' ?>> Female</label>
    </div>

    <?php $hobbies = explode(", ", $users['hobbies'] ?? ""); ?>
    <label>Hobbies:</label>
    <div class="checkbox-group">
      <label><input type="checkbox" name="hobbies[]" value="Reading" <?= in_array("Reading", $hobbies) ? 'checked' : '' ?>> Reading</label>
      <label><input type="checkbox" name="hobbies[]" value="Music" <?= in_array("Music", $hobbies) ? 'checked' : '' ?>> Music</label>
      <label><input type="checkbox" name="hobbies[]" value="Sports" <?= in_array("Sports", $hobbies) ? 'checked' : '' ?>> Sports</label>
    </div>

    <label>Country:</label>
    <select name="country" required>
      <option value="">--Select Country--</option>
      <option value="India" <?= ($users['country'] == 'India') ? 'selected' : '' ?>>India</option>
      <option value="USA" <?= ($users['country'] == 'USA') ? 'selected' : '' ?>>USA</option>
      <option value="UK" <?= ($users['country'] == 'UK') ? 'selected' : '' ?>>UK</option>
      <option value="Canada" <?= ($users['country'] == 'Canada') ? 'selected' : '' ?>>Canada</option>
    </select>

    <label>Date of Birth:</label>
    <input type="date" name="birthdate" value="<?= $users['birthdate']; ?>">

    <label>Contact Time:</label>
    <input type="time" name="time" value="<?= $users['contact_time']; ?>">

    <label>Upload File:</label>
    <input type="file" name="file">

    <label>Message:</label>
    <textarea name="message" rows="4"><?= $users['message']; ?></textarea>

    <label>Status:</label>
    <select name="status" required>
      <option value="">--Select Status--</option>
      <option value="Active" <?= ($users['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
      <option value="Inactive" <?= ($users['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
      <option value="Pending" <?= ($users['status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
    </select>

    <div class="d-flex justify-content-between mt-4">
      <button type="submit" name="submit" class="btn-custom btn-update">Update</button>
      <button type="reset" class="btn-custom btn-reset">Reset</button>
    </div>

    <a href="add.php" class="back-link">← Back to User List</a>
  </form>
</div>

</body>
</html>
