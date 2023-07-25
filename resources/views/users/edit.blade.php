<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<h1>Edit User</h1>
<form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
    @csrf
    @method('PUT')
    <label>Name:</label>
    <input type="text" name="first_name" value="{{ $user->first_name }}" required>
    <br>
    <label>Name:</label>
    <input type="text" name="last_name" value="{{ $user->last_name }}" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required>
    <br>
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="{{ $user::STATUS_ACTIVE }}" {{ $user->status === $user::STATUS_ACTIVE ? 'selected' : '' }}>Active</option>
        <option value="{{ $user::STATUS_SUSPENDED }}" {{ $user->status === $user::STATUS_SUSPENDED ? 'selected' : '' }}>Suspended</option>
        <option value="{{ $user::STATUS_DELETED }}" {{ $user->status === $user::STATUS_DELETED ? 'selected' : '' }}>Deleted</option>
    </select>
    <button type="submit">Update</button>
</form>
</body>
</html>
