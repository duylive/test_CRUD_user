<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
<h1>Create User</h1>
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <label>First Name:</label>
    <input type="text" name="first_name" required>
    <br>
    <label>Last Name:</label>
    <input type="text" name="last_name" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <button type="submit">Create</button>
</form>
</body>
</html>
