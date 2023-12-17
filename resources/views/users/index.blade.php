@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="mt-4">
                        <a href="{{ route('user.create') }}"
                           class="btn btn-primary mt-2 mb-2 position-relative top-10 start-100 translate-middle">Create</a>
                    </div>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="d-flex justify-content-between">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary">Edit</a>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning">Show</a>
                                <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
