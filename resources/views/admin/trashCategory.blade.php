<!DOCTYPE html>
<html lang="en">
<head>
  <title> Trashed Categories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>

@include('adminIncludes.nav')
<div class="container">
  <h2> Trash Clients </h2>
  <table class="table table-hover">
  <thead>
<tr>
    <td>Name</td>
    <td>restore</td>
    <td>Delete</td>
  </tr>
</thead>
    <tbody>
    @foreach($trash as $category)
<tr>
<td>{{ $category->name }}</td>
<td><a href="{{route('categories.restore',$category->id)}}">Restore</a></td>
<td>
  <form action="{{route('categories.forceDelete')}}" method="post">
    @csrf
    @method('DELETE')
    <input type="hidden" value="{{$category->id}}" name="id">
    <input type="submit" onclick=" return confirm('Are you sure to delete')" value="delete">
  </form>
</td>
</tr>
@endforeach
     
    </tbody>

    
  </table>
</div>

</body>
</html>
