@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow-sm w-100" style="max-width: 600px;">
            <div class="card-header ">
                <h5 class="mb-0"><i class="bi bi-info-circle-fill me-1"></i> Task Details</h5>
            </div>

            <div class="card-body">
                <h4 class="mb-3">{{ $task->title }}</h4>

                <p><strong>Description:</strong><br> {{ $task->description }}</p>

                <p><strong>Assigned To:</strong> {{ $task->assignee->name }}</p>
                <p><strong>Assigned By:</strong> {{ $task->creator->name }}</p>

                <p>
                    <strong>Status:</strong>
                    <span class="badge
                        {{ $task->status == 'Completed' ? 'bg-success' :
        ($task->status == 'In Progress' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                        {{ $task->status }}
                    </span>
                </p>

                <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
                <p><strong>End Date:</strong> {{ $task->end_date }}</p>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left-circle me-1"></i> Back
                </a>
            </div>
        </div>
    </div>
@endsection
