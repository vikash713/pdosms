<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP CRUD Operation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #ffffff;
      padding: 15px; /* Reduced padding */
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px; /* Reduced max-width */
    }

    .title {
      font-size: 20px; /* Reduced font size */
      font-weight: bold;
      margin-bottom: 15px; /* Reduced margin-bottom */
      color: #333;
    }

    .form {
      display: flex;
      flex-direction: column;
    }

    .input_feild {
      margin-bottom: 10px; /* Reduced margin-bottom */
    }

    .input_feild label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }

    .input_feild .input,
    .input_feild .textarea,
    .input_feild .selectbox {
      width: 100%;
      padding: 8px; /* Reduced padding */
      border-radius: 4px;
      border: 1px solid #ddd;
      box-sizing: border-box;
    }

    .input_feild .input:focus,
    .input_feild .textarea:focus,
    .input_feild .selectbox:focus {
      border-color: #007bff;
      outline: none;
    }

    .textarea {
      resize: vertical;
      min-height: 80px; /* Reduced min-height */
    }

    .terms {
      display: flex;
      align-items: center;
    }

    .terms .check {
      position: relative;
      display: inline-block;
      width: 18px; /* Reduced width */
      height: 18px; /* Reduced height */
      margin-right: 8px; /* Reduced margin-right */
    }

    .terms .check input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .terms .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 18px; /* Reduced height */
      width: 18px; /* Reduced width */
      background-color: #eee;
      border-radius: 4px;
    }

    .terms .check input:checked ~ .checkmark {
      background-color: #007bff;
    }

    .terms .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    .terms .check input:checked ~ .checkmark:after {
      display: block;
      left: 5px; /* Adjusted left position */
      top: 2px; /* Adjusted top position */
      width: 5px;
      height: 10px;
      border: solid #fff;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }

    .terms p {
      margin: 0;
      color: #555;
      font-size: 14px; /* Reduced font size */
    }

    .btn {
      background-color: #007bff;
      color: white;
      padding: 8px 12px; /* Reduced padding */
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px; /* Reduced font size */
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="./student_display.php" method="post">
      <div class="title">Add Student Details</div>
      <div class="form">
        <div class="input_feild">
          <label for="fname">First Name</label>
          <input type="text" class="input" name="fname" id="fname">
        </div>
        <div class="input_feild">
          <label for="lname">Last Name</label>
          <input type="text" class="input" name="lname">
        </div>
        <div class="input_feild">
          <label for="password">Password</label>
          <input type="password" class="input" name="password">
        </div>
        <div class="input_feild">
          <label for="conpassword">Confirm Password</label>
          <input type="password" class="input" name="conpassword">
        </div>
        <div class="input_feild">
          <label for="gender ">Subject</label>
          <select class="selectbox" name="gender">
            <option>Select</option>
            <option>C</option>
            <option>C++</option>
            <option>Php</option>
            <option>Javascript</option>
            <option>Node JS</option>
          </select>
        </div>
        <div class="input_feild">
          <label for="email">Email Address</label>
          <input type="email" class="input" name="email">
        </div>
        <div class="input_feild">
          <label for="phone">Phone Number</label>
          <input type="text" class="input" name="phone">
        </div>
        <div class="input_feild">
          <label for="address">Address</label>
          <textarea class="textarea" name="address"></textarea>
        </div>

        <div class="input_feild terms">
          <label class="check">
            <input type="checkbox" name="">
            <span class="checkmark"></span>
          </label>
          <p>Agree to terms and conditions</p>
        </div>
        <div class="input_feild">
          <input type="submit" value="Add" class="btn" name="Add">
        </div>
      </div>
    </form>
  </div>
</body>
</html>
