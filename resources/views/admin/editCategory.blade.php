@extends('layouts.adminMain')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <!-- Page title section -->
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Category</h3> <!-- Page title -->
            </div>
            <div class="title_right">
                <!-- Search bar -->
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..."> <!-- Search input -->
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button> <!-- Search button -->
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of page title section -->

        <div class="clearfix"></div>

        <!-- Main content section -->
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Category</h2> <!-- Panel title -->
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a></li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- End of panel title -->

                    <div class="x_content">
                        <br />
                        <!-- Edit category form -->
                        <form id="edit-form" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf <!-- CSRF token for security -->
                            @method('PUT') <!-- HTTP method spoofing for PUT -->

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category-name">Category Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="category-name" name="name" required="required" class="form-control" value="{{ $category->name }}">
                                </div>
                            </div>
                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                        </form>
                        <!-- End of edit category form -->
                    </div>
                    <!-- End of panel content -->
                </div>
            </div>
        </div>
        <!-- End of main content section -->
    </div>
</div>
<!-- /page content -->

@endsection
