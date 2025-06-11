<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/superadmin/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header class="dashboard-header">
            <h1 class="dashboard-title">User Management</h1>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn-signout">
                    <i class="fas fa-sign-out-alt"></i>
                    Sign Out
                </button>
            </form>

            <a href="{{ route('superadmin.add.user') }}" class="btn-signout">Create User</a>
        </header>

        <div class="table-wrapper">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                       @foreach ($users as $user )
                    <tr>

                       <td>{{ $user->name }}</td>
                       <td>{{ $user->email }}</td>
                       <td>{{ $user->role }}</td>
                       <td>{{ $user->created_at }}</td>
                       <td>
                           <button class="action-btn edit-btn"><a href="{{ route('superadmin.edit.user',$user->id) }}"><i class="fas fa-edit"></a></i></button>
                           <form action="{{ route('superadmin.delete.user',$user->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="action-btn delete-btn"><i class="fas fa-trash"></i></button>

                           </form>
                       </td>
                    </tr>

                       @endforeach


                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
