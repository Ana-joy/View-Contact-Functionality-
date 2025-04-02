<?php
// Database Connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "library_db";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Contacts from Database
$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Contact Messages</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; }
        .wrapper { display: flex; }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #7FBF50; /* Apple Green */
            color: white;
            padding-top: 20px;
            position: fixed;
            transition: 0.3s;
        }
        .sidebar img {
            display: block;
            margin: 0 auto;
            width: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .sidebar h3 { text-align: center; font-size: 18px; margin-bottom: 30px; }
        .sidebar ul { list-style-type: none; padding: 0; }
        .sidebar ul li { padding: 15px; text-align: center; }
        .sidebar ul li a { text-decoration: none; color: white; font-size: 16px; display: block; }
        .sidebar ul li:hover { background-color: #689F38; }

        /* Responsive Sidebar */
        #sidebarToggle { display: none; cursor: pointer; font-size: 24px; color: white; margin-left: 10px; }
        @media (max-width: 768px) {
            .sidebar { width: 0; overflow: hidden; }
            .sidebar.show { width: 250px; }
            #sidebarToggle { display: block; }
        }

        /* Main Content */
        .main-content { margin-left: 250px; padding: 20px; width: 100%; transition: 0.3s; }
        @media (max-width: 768px) { .main-content { margin-left: 0; } }

        .card { background: white; border-radius: 8px; padding: 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); }
        h2 { color: #7FBF50; text-align: center; margin-bottom: 20px; }

        /* Responsive Table */
        .table-responsive { overflow-x: auto; }
        table { white-space: nowrap; }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h3><i id="sidebarToggle" class="fa fa-bars"></i> Library System</h3>
        <img src="school_logo.png" alt="School Logo"> <!-- Replace with your logo -->
        <ul>
            <li><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="view_books.php"><i class="fa fa-book"></i> View Books</a></li>
            <li><a href="view_contacts.php"><i class="fa fa-envelope"></i> View Contacts</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Library Contact Messages 📩</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['message']}</td>
                                        <td>{$row['created_at']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No contact messages found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap & JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar Toggle for Mobile
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('show');
    });
</script>

</body>
</html>

<?php
// Close Connection
$conn->close();
?>
