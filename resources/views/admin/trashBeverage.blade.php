<!-- resources/views/admin/beverages/trashBeverages.blade.php -->
@extends('layouts.adminMain')

@section('content')
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Trash</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Deleted Beverages</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Beverage Date</th>
                                            <th>Title</th>
                                            <th>Published</th>
                                            <th>Restore</th>
                                            <th>Permanently Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($beverages as $beverage)
                                        <tr>
                                            <td>{{ $beverage->date }}</td>
                                            <td>{{ $beverage->title }}</td>
                                            <td>{{ $beverage->published ? 'Yes' : 'No' }}</td>
                                            <td>
                                                <form action="{{ route('beverages.restore', $beverage->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success">Restore</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('beverages.forceDelete', $beverage->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete Permanently</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('beverages.index') }}" class="btn btn-secondary">Back to Beverages List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
