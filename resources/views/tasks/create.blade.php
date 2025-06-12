@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow-sm w-100" style="max-width: 600px;">
            <div class="card-header">
                <h4 class="mb-0">Create New Task</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                            placeholder="Enter Title">
                        @error('title')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"
                            placeholder="Enter Description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Assign To</label>
                        <select name="assigned_to" class="form-control">
                            <option value="">-- Select User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}">

                        @error('start_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" min="{{ date('Y-m-d') }}">

                        @error('end_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-arrow-left-circle me-1"></i> Back
                        </a>
                        <button class="btn btn-primary">
                            <i class="bi bi-save2-fill me-1"></i> Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
