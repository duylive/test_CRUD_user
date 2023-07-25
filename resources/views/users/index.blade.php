@extends('users.layout')

@section('content')
    <h1>User List</h1>
    <br>
    <table class="col-12">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Detail</th>
            <th>Soft Delete</th>
            <th>Delete</th>
        </tr>
        </thead>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>@if($user->status === $user::STATUS_ACTIVE)
                        Active
                    @elseif($user->status === $user::STATUS_SUSPENDED)
                        Suspended
                    @elseif($user->status === $user::STATUS_DELETED)
                        Deleted
                    @endif
                </td>
                <td><a href="{{ route('users.show', ['id' => $user->id]) }}"><button class="btn-info">Show</button></a></td>
                <td><form method="POST" action="{{ route('users.softDelete', ['id' => $user->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-dark">Soft Delete</button></form>
                </td>
                <td><form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{ route('users.create') }}"><button class="btn-primary">Create User</button></a>
@endsection
