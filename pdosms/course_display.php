<!DOCTYPE html>
<html>
<head>
    <title>DISPLAY</title>
    <style>
        body {
            background-color: #53b6e1;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            background-color: aliceblue;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e2e2e2;
        }
        .operations a, .operations form {
            display: inline-block;
            margin: 2px;
        }
        .operations a {
            padding: 8px 16px;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            text-align: center;
            font-size: 14px;
        }
        .operations a:hover {
            background-color: #0056b3;
        }
        .operations form input[type="submit"] {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }
        .operations form input[type="submit"]:hover {
            background-color: #c82333;
        }
        .add-button {
            display: inline-block;
            margin-bottom: 20px;
        }
        .add-button a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
        }
        .add-button a:hover {
            background-color: #0056b3;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2><mark>Displaying course record</mark></h2>
        <div class="add-button">
            <a href="./courseadd_detail.php">Add New Record</a>
        </div>
        <table border="3" cellspacing="7">
            <tr>
                <th width="10%">Course ID</th>
                <th width="30%">Course Name</th>
                <th width="30%">Course Duration in months</th>
                <th colspan="3" width="15%">Operations</th>
            </tr>

            <?php
            include("connection.php");
            error_reporting(0);

            // Create a PDO instance
            $dbh = new Dbh();
            $conn = $dbh->connect();

            // Handle Add Operation
            if (isset($_POST['Add_Course'])) {
                $course_name = $_POST['course_name'];
                $course_id = $_POST['course_id'];
                $course_duration = $_POST['course_duration'];

                if ($course_name != "" && $course_id != "" && $course_duration != "") {
                    try {
                        $query = "INSERT INTO course (course_id, course_name, course_duration) VALUES (:course_id, :course_name, :course_duration)";
                        $stmt = $conn->prepare($query);
                        $stmt->execute(['course_id' => $course_id, 'course_name' => $course_name, 'course_duration' => $course_duration]);
                        echo "<p>Inserted successfully!</p>";
                    } catch (PDOException $e) {
                        echo "<p>Failed to insert: " . $e->getMessage() . "</p>";
                    }
                } else {
                    echo "<p>Please insert all details.</p>";
                }
            }

            // Handle Update Operation
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_id'])) {
                $course_id = $_POST['update_id'];
                $course_name = $_POST['course_name'];
                $course_duration = $_POST['course_duration'];
                
                try {
                    $sql = "UPDATE course SET course_name = :course_name, course_duration = :course_duration WHERE course_id = :course_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['course_name' => $course_name, 'course_duration' => $course_duration, 'course_id' => $course_id]);
                    echo "<p>Record updated successfully</p>";
                } catch (PDOException $e) {
                    echo "<p>Error updating record: " . $e->getMessage() . "</p>";
                }
            }

            // Handle Delete Operation
            if (isset($_POST['delete_id'])) {
                $course_id = intval($_POST['delete_id']);
                try {
                    $delete_query = "DELETE FROM course WHERE course_id = :course_id";
                    $stmt = $conn->prepare($delete_query);
                    $stmt->execute(['course_id' => $course_id]);
                    echo "<p>Record deleted successfully!</p>";
                } catch (PDOException $e) {
                    echo "<p>Failed to delete record: " . $e->getMessage() . "</p>";
                }
            }

            // Fetch course records for display
            try {
                $query = "SELECT * FROM course";
                $stmt = $conn->query($query);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 

                if (!empty($results)) {
                    foreach ($results as $result) {
                        echo "<tr>
                            <td>" . htmlspecialchars($result['course_id']) . "</td>
                            <td>" . htmlspecialchars($result['course_name']) . "</td>
                            <td>" . htmlspecialchars($result['course_duration']) . "</td>
                            <td class='operations'>
                                <a href='courseupdate.php?result=" . urlencode(json_encode($result)) . "'>Edit</a>
                            </td>
                            <td class='operations'>
                                <form method='post' action='course_display.php'>
                                    <input type='hidden' name='delete_id' value='" . htmlspecialchars($result['course_id']) . "'>
                                    <input type='submit' value='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\");'>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align:center;'>No record found</td></tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='5' style='text-align:center;'>Error fetching records: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
