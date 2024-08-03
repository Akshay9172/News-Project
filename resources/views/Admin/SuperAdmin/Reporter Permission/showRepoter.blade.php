<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @extends('Layouts.adminLayout')
    @section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title"><b>Users List</b></h2>
        </div>

        <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Select Permission</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr id="user-{{ $user->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                            <button type="button" class="btn btn-success {{ $user->status == 1 ? 'd-none' : '' }}" onclick="updateStatus({{ $user->id }}, 1)">
                                Activate
                            </button>
                            <button type="button" class="btn btn-danger {{ $user->status == 0 ? 'd-none' : '' }}" onclick="updateStatus({{ $user->id }}, 0)">
                                Deactivate
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateStatus(userId, newStatus) {
            if (confirm('Are you sure you want to change the status of this user?')) {

                fetch(`/user/${userId}/updateStatus`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    return response.text().then(text => { throw new Error(text) });
                })
                .then(data => {
                    if (data.success) {
                        var row = document.querySelector(`#user-${userId}`);
                        var activateButton = row.querySelector('.btn-success');
                        var deactivateButton = row.querySelector('.btn-danger');
                        if (newStatus === 1) {
                            activateButton.classList.add('d-none');
                            deactivateButton.classList.remove('d-none');
                        } else {
                            activateButton.classList.remove('d-none');
                            deactivateButton.classList.add('d-none');
                        }
                    } else {
                        alert('Failed to update status');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred: ' + error.message);
                });
            }
        }
    </script>
    @endsection
</body>
</html>
