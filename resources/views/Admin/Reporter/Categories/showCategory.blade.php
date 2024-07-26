<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
   @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
  <h2>Category Table</h2> </br>
     <a href="/add-category"> <button type="button" class="btn btn-primary">Add Category </button> </a>
  <table class="table">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $category)


      <tr>
        <td>{{$category->category_name}}</td>
        <td>
            <a href="/delete-category/{{$category->id}}"> <button type="submit" class="btn btn-danger">Remove</button> </a>

        </td>
      </tr>

      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
