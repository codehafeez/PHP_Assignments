<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="index.php?action=update" method="POST">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($employee['name']); ?>" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($employee['email']); ?>" required>
        </div>
        <button type="submit">Update</button>
        <a href="index.php?action=index">Cancel</a>
    </form>
</body>
</html>