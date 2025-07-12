<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            margin-top: 30px;
        }
        .user-row {
            margin-bottom: 10px;
        }
        input {
            margin-right: 5px;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>User Management</h1>

    <!-- ✅ Add Users Form -->
    <h2>Add </h2>
    <form action="create.php" method="post" id="addUserForm">
        <div id="userInputs">
            <div class="user-row">
                <input type="text" name="fname[]" placeholder="First Name" required>
                <input type="text" name="lname[]" placeholder="Last Name" required>
                <input type="number" name="age[]" placeholder="Age" required>
            </div>
        </div>
        <button type="button" onclick="addUserRow()">➕ Add New Row</button>
        <button type="submit">✅ Submit Users</button>
    </form>

    <!-- 🔵 View Users -->
    <h2>View </h2>
    <form action="read.php" method="get">
        <input type="submit" value="Show Users">
    </form>

    <!-- 🟡 Update User -->
    <h2>Update </h2>
    <form action="update.php" method="post">
        <input type="number" name="id" placeholder="User ID" required>
        <input type="text" name="fname" placeholder="New First Name" required>
        <input type="text" name="lname" placeholder="New Last Name" required>
        <input type="number" name="age" placeholder="New Age" required>
        <input type="submit" value="Update User">
    </form>

    <!-- 🔴 Delete Users -->
    <h2>Delete </h2>
    <form action="delete.php" method="post">
        <input type="text" name="ids" placeholder="IDs to delete (e.g. 1,2,3)" required>
        <input type="submit" value="Delete Users">
    </form>

    <!-- 🔧 JavaScript to add rows -->
    <script>
        function addUserRow() {
            const div = document.createElement('div');
            div.className = 'user-row';
            div.innerHTML = `
                <input type="text" name="fname[]" placeholder="First Name" required>
                <input type="text" name="lname[]" placeholder="Last Name" required>
                <input type="number" name="age[]" placeholder="Age" required>
                <button type="button" onclick="this.parentNode.remove()">❌</button>
            `;
            document.getElementById('userInputs').appendChild(div);
        }
    </script>
</body>
</html>