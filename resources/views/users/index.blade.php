<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
<h1>User List</h1>
<ul>
    @foreach($users as $user)
        <a href="{{ route('users.show', ['id' => $user->id]) }}">
            <li>{{ $user->first_name }} {{ $user->last_name }} - {{ $user->email }} -
                @if($user->status === $user::STATUS_ACTIVE)
                    Active
                @elseif($user->status === $user::STATUS_SUSPENDED)
                    Suspended
                @elseif($user->status === $user::STATUS_DELETED)
                    Deleted
                @endif
            </li>
        </a>
        <form method="POST" action="{{ route('users.softDelete', ['id' => $user->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Soft Delete</button>
        </form>
        <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endforeach
</ul>
</body>
</html>
