<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
</head>
<body>
    <h1>Create New Employee</h1>
    <form action="index.php?action=store" method="POST">
        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Save</button>
        <a href="index.php?action=index">Cancel</a>
    </form>
</body>
</html>