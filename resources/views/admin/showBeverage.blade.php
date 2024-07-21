
@extends('layouts.adminMain')

@section('content')
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>View Beverage</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Beverage Details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <p>{{ $beverage->date }}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <p>{{ $beverage->title }}</p>
                    </div>
                    <div class="form-group">
                        <label for="published">Published</label>
                        <p>{{ $beverage->published ? 'Yes' : 'No' }}</p>
                    </div>
                    <a href="{{ route('editBeverages', $beverage->id) }}" class="btn btn-primary">Edit Beverage</a>
                    <form action="{{ route('trashBeverage', $beverage->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete Beverage</button>
                    </form>
                    <a href="{{ route('beverages') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
