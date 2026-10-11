@extends('students.layout')

@section('title', 'Students Dashboard')

@section('content')

<div class="topbar">
    <div>
        <h1 class="page-title">Students Dashboard</h1>
        <p class="page-subtitle">Manage all your students in one place</p>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-gradient">
        <i class="bi bi-plus-lg"></i> Add New Student
    </a>
</div>

@if(session('success'))
    <div class="alert-modern mb-4">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
@endif

<!-- Stats -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon stat-icon-1">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <p class="stat-value">{{ $students->count() }}</p>
                <p class="stat-label">Total Students</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon stat-icon-2">
                <i class="bi bi-book-fill"></i>
            </div>
            <div>
                <p class="stat-value">{{ $students->unique('course')->count() }}</p>
                <p class="stat-label">Active Courses</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon stat-icon-3">
                <i class="bi bi-calendar-check-fill"></i>
            </div>
            <div>
                <p class="stat-value">{{ $students->where('created_at', '>=', now()->subDays(7))->count() }}</p>
                <p class="stat-label">Added This Week</p>
            </div>
        </div>
    </div>
</div>

<!-- Students Table -->
<div class="glass-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0 fw-bold"><i class="bi bi-list-ul me-2"></i>All Students</h5>
        <span class="badge-course">{{ $students->count() }} Total</span>
    </div>

    @if($students->count() > 0)
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Contact</th>
                        <th>Course</th>
                        <th>Joined</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">{{ strtoupper(substr($student->name, 0, 1)) }}</div>
                                    <div>
                                        <div class="fw-bold">{{ $student->name }}</div>
                                        <small class="text-muted">ID: #{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div><i class="bi bi-envelope text-muted me-1"></i> {{ $student->email }}</div>
                                <small class="text-muted"><i class="bi bi-phone me-1"></i> {{ $student->phone }}</small>
                            </td>
                            <td><span class="badge-course">{{ $student->course }}</span></td>
                            <td class="text-muted">{{ $student->created_at->format('M d, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('students.edit', $student) }}" class="btn-icon btn-edit me-2" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon btn-delete" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <h4 class="mt-4 fw-bold">No Students Yet</h4>
            <p class="text-muted mb-4">Get started by adding your first student.</p>
            <a href="{{ route('students.create') }}" class="btn btn-gradient">
                <i class="bi bi-plus-lg"></i> Add First Student
            </a>
        </div>
    @endif
</div>

@endsection