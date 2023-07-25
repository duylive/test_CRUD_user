@extends('users.layout')

@section('content')
    <body>
    <h1>User Detail</h1>
    <p>First Name: {{ $user->first_name }}</p>
    <p>Last Name: {{ $user->last_name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Status:
        @if($user->status === $user::STATUS_ACTIVE)
            Active
        @elseif($user->status === $user::STATUS_SUSPENDED)
            Suspended
        @elseif($user->status === $user::STATUS_DELETED)
            Deleted
        @else
            Unknown
        @endif
    </p>
    <a href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a>
    </body>
@endsection
