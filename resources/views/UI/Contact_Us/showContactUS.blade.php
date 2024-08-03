<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @extends('Layouts.adminLayout')
    @section('content')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title"><b>Contact Us Details</b></h2>
            </div>

            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contactUs as $key => $contactUs)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $contactUs->name }}</td>
                                <td>{{ $contactUs->email }}</td>
                                <td>{{ $contactUs->subject }}</td>
                                <td>{{ $contactUs->message }}</td>
                                <td>
                                    <a href="/delete-contactus/{{ $contactUs->id }}"><button type="submit"
                                            class="btn btn-danger">Remove</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    @endsection
</body>

</html>
