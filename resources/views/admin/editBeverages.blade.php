<!-- resources/views/admin/beverages/edit.blade.php -->
@extends('layouts.adminMain')

@section('content')
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Beverage</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Beverage</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('updatebeverage', $beverage->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" class="form-control">
        
    </select>
</div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ $beverage->date }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $beverage->title }}">
                        </div>
                        <div class="form-group">
                            <label for="published">Published</label>
                            <select name="published" class="form-control">
                                <option value="1" {{ $beverage->published ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$beverage->published ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Beverage</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
