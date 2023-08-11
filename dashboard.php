<?php 
include('db_conn.php'); ?>
<html>
<body>
    <h1>Dashboard</h1>

    <h2>User List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Website</th>
            <th>Gender</th>
            <th>Actions</th>
        </tr>
        <?php

        $sql = "SELECT * FROM users";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['age']."</td>";
                echo "<td>".$row['website']."</td>";
                echo "<td>".$row['gender']."</td>";
                echo "<td>
                        <a href='editUser.php?id=".$row['id']."'>Edit</a> |
                        <a href='deleteUser.php?delete=".$row['id']."'>Delete</a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }

        $connection->close();
        ?>
            <a class="add-user-button" href="addUser.php">Add User</a>

    </table>
</body>
</html>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-user-button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .add-user-button:hover {
            background-color: #45a049;
        }
