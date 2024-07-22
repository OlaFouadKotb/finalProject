<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed Categories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    table {
      font-family: Arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .btn-restore, .btn-delete {
      margin: 0;
    }

    .btn-restore {
      background-color: #5bc0de;
      color: white;
      border: none;
    }

    .btn-restore:hover {
      background-color: #31b0d5;
    }

    .btn-delete {
      background-color: #d9534f;
      color: white;
      border: none;
    }

    .btn-delete:hover {
      background-color: #c9302c;
    }
  </style>
</head>
<body>

@include('adminIncludes.nav')
<div class="container">
  <h2>Trash Clients</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Restore</th>
        <th>Delete Permanently</th>
      </tr>
    </thead>
    <tbody>
      @foreach($trash as $category)
      <tr>
        <td>{{ $category->name }}</td>
        <td>
          <a href="{{ route('categories.restore', $category->id) }}" class="btn btn-restore btn-sm">Restore</a>
        </td>
        <td>
          <form action="{{ route('categories.forceDelete') }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{ $category->id }}" name="id">
            <button type="submit" onclick="return confirm('Are you sure you want to permanently delete this item?')" class="btn btn-delete btn-sm">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
