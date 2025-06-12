@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">My Assigned Tasks</h4>
                <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Create New Task
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Assigned By</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th style="width: 180px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                                                                        <tr>
                                                                            <td>{{ $task->title }}</td>
                                                                            <td>{{ $task->creator->name }}</td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge
                                                                                                                                                                {{ $task->status == 'Completed'
        ? 'bg-success'
        : ($task->status == 'In Progress'
            ? 'bg-warning text-dark'
            : 'bg-secondary') }}">
                                                                                    {{ $task->status }}
                                                                                </span>
                                                                            </td>
                                                                            <td>{{ $task->start_date }}</td>
                                                                            <td>{{ $task->end_date }}</td>
                                                                            <td>
                                                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm me-1">
                                                                                    <i class="bi bi-eye-fill"></i>
                                                                                </a>
                                                                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm me-1">
                                                                                    <i class="bi bi-pencil-square"></i>
                                                                                </a>
                                                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline delete-form">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="button" class="btn btn-danger btn-sm delete-btn">
                                                                                        <i class="bi bi-trash-fill"></i>
                                                                                    </button>
                                                                                </form>

                                                                            </td>
                                                                        </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No tasks assigned.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This task will be deleted permanently.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, delete it!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush

