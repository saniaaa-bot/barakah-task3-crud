@extends('students.layout')

@section('title', 'Add Student')

@section('content')

<div class="topbar">
    <div>
        <h1 class="page-title">Add New Student</h1>
        <p class="page-subtitle">Fill in the details to register a new student</p>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-light" style="border-radius: 12px; font-weight: 600; padding: 12px 24px;">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="glass-card">
            <div class="d-flex align-items-center gap-3 mb-4 pb-4" style="border-bottom: 2px solid #f3f4f6;">
                <div class="stat-icon stat-icon-1">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">Student Information</h5>
                    <small class="text-muted">All fields are required</small>
                </div>
            </div>

            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label-modern">
                            <i class="bi bi-person me-1"></i> Full Name
                        </label>
                        <input type="text" name="name" 
                            class="form-control form-modern @error('name') is-invalid @enderror" 
                            value="{{ old('name') }}" 
                            placeholder="e.g. Ahmed Khan">
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
                            value="{{ old('email') }}" 
                            placeholder="ahmed@example.com">
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
                            value="{{ old('phone') }}" 
                            placeholder="03001234567">
                        <small class="text-muted">Must be 11 digits</small>
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
                            value="{{ old('course') }}" 
                            placeholder="e.g. Laravel Development">
                        @error('course') 
                            <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> 
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-3 mt-5">
                    <button type="submit" class="btn btn-gradient">
                        <i class="bi bi-check-lg"></i> Save Student
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