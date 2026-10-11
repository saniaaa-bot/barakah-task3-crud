@extends('students.layout')

@section('title', 'Edit Student')

@section('content')

<div class="topbar">
    <div>
        <h1 class="page-title">Edit Student</h1>
        <p class="page-subtitle">Update the details for Student #{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</p>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-light" style="border-radius: 12px; font-weight: 600; padding: 12px 24px;">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="glass-card">
            <div class="d-flex align-items-center gap-3 mb-4 pb-4" style="border-bottom: 2px solid #f3f4f6;">
                <div class="avatar" style="width: 60px; height: 60px; font-size: 1.5rem;">
                    {{ strtoupper(substr($student->name, 0, 1)) }}
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">{{ $student->name }}</h5>
                    <small class="text-muted">Editing student information</small>
                </div>
            </div>

            <form action="{{ route('students.update', $student) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label-modern">
                            <i class="bi bi-person me-1"></i> Full Name
                        </label>
                        <input type="text" name="name" 
                            class="form-control form-modern @error('name') is-invalid @enderror" 
                            value="{{ old('name', $student->name) }}">
                        @error('name') 
                            <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-modern">
                            <i class="bi bi-envelope me-1"></i> Email Address
                        </label>
                        <input type="email" name="email" 
                            class="form-control form-modern @error('email') is-invalid @enderror" 
                            value="{{ old('email', $student->email) }}">
                        @error('email') 
                            <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-modern">
                            <i class="bi bi-phone me-1"></i> Phone Number
                        </label>
                        <input type="text" name="phone" 
                            class="form-control form-modern @error('phone') is-invalid @enderror" 
                            value="{{ old('phone', $student->phone) }}">
                        @error('phone') 
                            <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-modern">
                            <i class="bi bi-book me-1"></i> Course
                        </label>
                        <input type="text" name="course" 
                            class="form-control form-modern @error('course') is-invalid @enderror" 
                            value="{{ old('course', $student->course) }}">
                        @error('course') 
                            <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> 
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-3 mt-5">
                    <button type="submit" class="btn btn-gradient">
                        <i class="bi bi-check-lg"></i> Update Student
                    </button>
                    <a href="{{ route('students.index') }}" class="btn btn-light" style="border-radius: 12px; padding: 12px 24px; font-weight: 600;">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection