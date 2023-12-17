@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Details</h2>

    <div class="card p-3">
        <div class="card-title">User Information</div>

        <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
        <p class="card-text"><strong>Password:</strong> {{ $user->password }}</p>
        <p class="card-text"><strong>Password Confirmation:</strong> {{ $user->password }}</p>

        <a href="{{ route('users.index') }}" class="w-25 btn btn-primary">Go back to Users Page</a>
    </div>
</div>
@endsection
