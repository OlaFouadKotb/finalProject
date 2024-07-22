@extends('layouts.adminMain')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Messages</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Message Details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group">
                            <label class="col-form-label"><strong>Full Name:</strong></label>
                            <p>{{ $message->full_name }}</p>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><strong>Email:</strong></label>
                            <p>{{ $message->email }}</p>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><strong>Message Content:</strong></label>
                            <p>{{ $message->message }}</p>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <a href="{{ route('messages.index') }}" class="btn btn-primary">Back to List</a>
                            <!-- Add more buttons if needed, e.g., Delete or Mark as Read -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection
