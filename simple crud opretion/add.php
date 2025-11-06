<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #56ab2f, #a8e063);
      min-height: 100vh;
      padding: 40px 0;
      font-family: 'Poppins', sans-serif;
    }

    .form-container {
      background: #fff;
      border-radius: 15px;
      padding: 30px 40px;
      box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    .form-container:hover {
      transform: translateY(-5px);
    }

    h2 {
      text-align: center;
      font-weight: 700;
      color: #28a745;
      margin-bottom: 25px;
    }

    label {
      font-weight: 600;
      margin-top: 12px;
      color: #333;
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

    .btn-submit {
      background: #28a745;
    }
    .btn-submit:hover {
      background: #218838;
      transform: scale(1.05);
    }

    .btn-reset {
      background: #dc3545;
    }
    .btn-reset:hover {
      background: #b02a37;
      transform: scale(1.05);
    }

    .table-container {
      background: #fff;
      border-radius: 15px;
      padding: 20px;
      margin-top: 50px;
      box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
    }

    table {
      border-radius: 10px;
      overflow: hidden;
      width: 100%;
    }

    thead th {
      background: #28a745;
      color: white;
      text-align: center;
      font-weight: bold;
    }

    tbody tr:hover {
      background-color: #e8f5e9;
      transition: 0.3s;
    }

    a {
      text-decoration: none;
      color: white;
      font-weight: 600;
      padding: 5px 10px;
      border-radius: 5px;
      transition: 0.3s ease-in-out;
    }

    a[href*="edit"] {
      background: #007bff;
    }
    a[href*="edit"]:hover {
      background: #0056b3;
    }

    a[href*="delete"] {
      background: #dc3545;
    }
    a[href*="delete"]:hover {
      background: #b02a37;
    }

    th, td {
      vertical-align: middle;
      text-align: center;
      padding: 8px;
    }

    .checkbox-group, .radio-group {
      display: flex;
      gap: 15px;
      margin-top: 8px;
      flex-wrap: wrap;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="form-container">
    <h2>User Registration</h2>
    <form method="post" enctype="multipart/form-data">

      <label>Full Name:</label>
      <input type="text" class="form-control" name="username" required>

      <label>Password:</label>
      <input type="password" class="form-control" name="password" required>

      <label>Email:</label>
      <input type="email" class="form-control" name="email" required>

      <label>Age:</label>
      <input type="number" class="form-control" name="age" min="1" max="100">

      <label>Phone:</label>
      <input type="tel" class="form-control" name="phone">

      <label>Website:</label>
      <input type="url" class="form-control" name="website">

      <label>Gender:</label>
      <div class="radio-group">
        <label><input type="radio" name="gender" value="Male" required> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
      </div>

      <label>Hobbies:</label>
      <div class="checkbox-group">
        <label><input type="checkbox" name="hobbies[]" value="Reading"> Reading</label>
        <label><input type="checkbox" name="hobbies[]" value="Music"> Music</label>
        <label><input type="checkbox" name="hobbies[]" value="Sports"> Sports</label>
      </div>

      <label>Country:</label>
      <select name="country" class="form-control" required>
        <option value="">--Select Country--</option>
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
        <option value="Canada">Canada</option>
      </select>

      <label>Date of Birth:</label>
      <input type="date" class="form-control" name="birthdate">

      <label>Contact Time:</label>
      <input type="time" class="form-control" name="time">

      <label>Upload File:</label>
      <input type="file" class="form-control" name="file">

      <label>Message:</label>
      <textarea name="message" rows="3" class="form-control"></textarea>

      <label>Status:</label>
      <select name="status" class="form-control" required>
        <option value="">--Select Status--</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
        <option value="Pending">Pending</option>
      </select>

      <div class="d-flex justify-content-between mt-4">
        <button type="submit" name="submit" class="btn-custom btn-submit">Submit</button>
        <button type="reset" class="btn-custom btn-reset">Reset</button>
      </div>
    </form>
  </div>
</div>

<?php
$conn = new mysqli("localhost", "root", "", "task1");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $phone = $_POST['phone'];
  $website = $_POST['website'];
  $gender = $_POST['gender'];
  $country = $_POST['country'];
  $birthdate = $_POST['birthdate'];
  $time = $_POST['time'];
  $message = $_POST['message'];
  $status = $_POST['status'];
  $hobbies = implode(", ", $_POST['hobbies'] ?? []);

  $file = $_FILES['file']['name'];
  $target = "uploads/" . basename($file);
  move_uploaded_file($_FILES['file']['tmp_name'], $target);

  $sql = "INSERT INTO users (username, password, email, age, phone, website, gender, country, birthdate, contact_time, hobbies, message, status, file)
          VALUES ('$username', '$password', '$email', '$age', '$phone', '$website', '$gender', '$country', '$birthdate', '$time', '$hobbies', '$message', '$status', '$file')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data Inserted Successfully')</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<div class="container table-container">
  <h2 class="text-center mb-3 text-success fw-bold">User Records</h2>
  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>Email</th>
          <th>Age</th>
          <th>Phone</th>
          <th>Website</th>
          <th>Gender</th>
          <th>Hobbies</th>
          <th>Country</th>
          <th>Birthdate</th>
          <th>Contact Time</th>
          <th>File</th>
          <th>Message</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM users");
        while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
          <td><?= $row['id']; ?></td>
          <td><?= $row['username']; ?></td>
          <td><?= $row['password']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><?= $row['age']; ?></td>
          <td><?= $row['phone']; ?></td>
          <td><?= $row['website']; ?></td>
          <td><?= $row['gender']; ?></td>
          <td><?= $row['hobbies']; ?></td>
          <td><?= $row['country']; ?></td>
          <td><?= $row['birthdate']; ?></td>
          <td><?= $row['contact_time']; ?></td>
          <td><?= $row['file']; ?></td>
          <td><?= $row['message']; ?></td>
          <td><span class="badge bg-<?= ($row['status'] == 'Active') ? 'success' : (($row['status'] == 'Inactive') ? 'secondary' : 'warning'); ?>"><?= $row['status']; ?></span></td>
          <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this record?');">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
