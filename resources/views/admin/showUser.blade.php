<!-- resources/views/admin/showUser.blade.php -->
@extends('layouts.adminMain')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User ID: {{ $user->id }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="card">
                            <div class="card-body">
                                <p><strong>Full Name:</strong> {{ $user->full_name }}</p>
                                <p><strong>Username:</strong> {{ $user->user_name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Status:</strong> {{ $user->active ? 'Active' : 'Inactive' }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('users') }}" class="btn btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
