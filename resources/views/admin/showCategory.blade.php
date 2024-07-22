@extends('layouts.adminMain')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Category Details</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>{{ $category->name }}</h1>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category-name">Category Name:</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="category-name" class="form-control" value="{{ $category->name }}" disabled>
                                </div>
                            </div>

                            <!-- List of beverages -->
                            <div class="form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Beverages:</label>
                                <div class="col-md-6 col-sm-6">
                                    @if($category->beverages->isEmpty())
                                        <p>No beverages available for this category.</p>
                                    @else
                                        <ul class="list-group">
                                            @foreach($category->beverages as $beverage)
                                                <li class="list-group-item">
                                                    {{ $beverage->name }} - ${{ $beverage->price }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{ route('categories') }}" class="btn btn-primary">Back</a>
                                    <a href="{{ route('editcategory', $category->id) }}" class="btn btn-warning">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
