<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Teacher's Details</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 

  //$id = $_GET['id'];
  //$address = $_GET['address'];

  $result = $_GET['result'];
  $data = json_decode($_GET['result'], true);

  // db connect

  //echo "result $result";
  //echo "result1 $data";

  //echo "this is id ".$data['Id'];
  //echo "this is address ".$data['address'];
  ?>
<div class="container">
  <form action="./teacher_display.php" method="POST">
    <div class="title">Update Teacher Detail</div>
    <div class="form">
      <div class="input_feild">
        <label>Id</label>
        <input type="text" value=<?php echo $data['id'] ?> class="input" name="id">
      </div>
      <div class="input_feild">
        <label>First Name</label>
        <input type="text" value=<?php echo $data['fname'] ?> class="input" name="fname">
      </div>
      <div class="input_feild">
        <label>Last Name</label>
        <input type="text" value="<?php echo $data['lname']; ?>" class="input" name="lname">
      </div>
      <div class="input_feild">
        <label>Password</label>
        <input type="password" value="<?php echo $data['password']; ?>" class="input" name="password">
      </div>
      <div class="input_feild">
        <label>Confirm Password</label>
        <input type="password" value="" class="input" name="conpassword">
      </div>
      <div class="input_feild">
        <label>Subject</label>
        <select class="selectbox" name="gender">
    <option value="">Select</option>
    <option value="Male" <?php echo (isset($data['gender']) && $data['gender'] == 'Male') ? 'selected' : ''; ?>>C</option>
    <option value="Female" <?php echo (isset($data['gender']) && $data['gender'] == 'Female') ? 'selected' : ''; ?>>C++</option>
    <option value="Female" <?php echo (isset($data['gender']) && $data['gender'] == 'Female') ? 'selected' : ''; ?>>php</option>
    <option value="Female" <?php echo (isset($data['gender']) && $data['gender'] == 'Female') ? 'selected' : ''; ?>>Javascript</option>
    <option value="Female" <?php echo (isset($data['gender']) && $data['gender'] == 'Female') ? 'selected' : ''; ?>>Nodejs</option>
</select>


        </div>
      <div class="input_feild">
        <label>Email Address</label>
        <input type="email" value="<?php echo $data['email']; ?>" class="input" name="email">
      </div>
      <div class="input_feild">
        <label>Phone Number</label>
        <input type="text" value="<?php echo $data['phone']; ?>" class="input" name="phone">
      </div>
      <div class="input_feild">
        <label>Address</label>
        <textarea class="textarea" name="address"><?php echo $data['address']; ?></textarea>
      </div>
      <div class="input_feild terms">
        <label class="check">
          <input type="checkbox" name="terms">
          <span class="checkmark"></span>
        </label>
        <p>Agree to terms and conditions</p>
      </div>
      <div class="input_feild">
        <input type="submit" value="Update" class="btn" name="Register">
      </div>
    </div>
  </form>
</div>
</body>
</html>