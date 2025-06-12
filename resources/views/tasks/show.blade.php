@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Task Details</h2>

        <div class="card p-3 mt-3">
            <h4>{{ $task->title }}</h4>
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p><strong>Assigned To:</strong> {{ $task->assignee->name }}</p>
            <p><strong>Assigned By:</strong> {{ $task->creator->name }}</p>
            <p><strong>Status:</strong> {{ $task->status }}</p>
            <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
            <p><strong>End Date:</strong> {{ $task->end_date }}</p>
        </div>
    </div>
@endsection
