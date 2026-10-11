<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Students Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        body {
            background: linear-gradient(135deg, #f5f3ff 0%, #fdf2f8 100%);
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            background: linear-gradient(180deg, #1e1b4b 0%, #4c1d95 100%);
            min-height: 100vh;
            width: 260px;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
            color: white;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        
        .sidebar-logo {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sidebar-logo i {
            color: #ec4899;
            font-size: 1.8rem;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
        }
        
        .sidebar-menu li {
            margin-bottom: 8px;
        }
        
        .sidebar-menu a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 12px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar-menu a i {
            font-size: 1.2rem;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px 40px;
            min-height: 100vh;
        }
        
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #6d28d9, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }
        
        .page-subtitle {
            color: #6b7280;
            margin: 5px 0 0 0;
            font-size: 0.95rem;
        }
        
        /* Cards */
        .glass-card {
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(109, 40, 217, 0.08);
            border: 1px solid rgba(255,255,255,0.5);
        }
        
        /* Buttons */
        .btn-gradient {
            background: linear-gradient(135deg, #6d28d9, #ec4899);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(109, 40, 217, 0.3);
        }
        
        .btn-gradient:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(109, 40, 217, 0.4);
        }
        
        /* Table */
        .table-modern {
            margin: 0;
        }
        
        .table-modern thead th {
            background: transparent;
            color: #6b7280;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 16px;
            border-bottom: 2px solid #f3f4f6;
        }
        
        .table-modern tbody td {
            padding: 20px 16px;
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }
        
        .table-modern tbody tr {
            transition: all 0.2s;
        }
        
        .table-modern tbody tr:hover {
            background: rgba(109, 40, 217, 0.03);
        }
        
        /* Avatar */
        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6d28d9, #ec4899);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
        }
        
        /* Badge */
        .badge-course {
            background: linear-gradient(135deg, #ddd6fe, #fbcfe8);
            color: #6d28d9;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }
        
        /* Action Buttons */
        .btn-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.2s;
            text-decoration: none;
        }
        
        .btn-edit {
            background: #fef3c7;
            color: #d97706;
        }
        
        .btn-edit:hover {
            background: #fcd34d;
            color: #92400e;
            transform: scale(1.1);
        }
        
        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }
        
        .btn-delete:hover {
            background: #fca5a5;
            color: #991b1b;
            transform: scale(1.1);
        }
        
        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(109, 40, 217, 0.15);
        }
        
        .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-icon-1 { background: linear-gradient(135deg, #6d28d9, #8b5cf6); }
        .stat-icon-2 { background: linear-gradient(135deg, #ec4899, #f472b6); }
        .stat-icon-3 { background: linear-gradient(135deg, #10b981, #34d399); }
        
        .stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e1b4b;
            margin: 0;
        }
        
        .stat-label {
            color: #6b7280;
            font-size: 0.85rem;
            margin: 0;
            font-weight: 500;
        }
        
        /* Form inputs */
        .form-modern {
            background: white;
            border: 2px solid #f3f4f6;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        
        .form-modern:focus {
            border-color: #6d28d9;
            box-shadow: 0 0 0 4px rgba(109, 40, 217, 0.1);
            outline: none;
        }
        
        .form-label-modern {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        /* Alert */
        .alert-modern {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border: none;
            border-radius: 14px;
            padding: 16px 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideDown 0.4s ease;
        }
        
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        
        .empty-state i {
            font-size: 5rem;
            background: linear-gradient(135deg, #6d28d9, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { width: 70px; padding: 20px 10px; }
            .sidebar-logo span, .sidebar-menu a span { display: none; }
            .sidebar-menu a { justify-content: center; padding: 12px; }
            .main-content { margin-left: 70px; padding: 20px; }
            .page-title { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-logo">
        <i class="bi bi-mortarboard-fill"></i>
        <span>EduManage</span>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.index') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i> <span>Dashboard</span>
        </a></li>
        <li><a href="{{ route('students.create') }}" class="{{ request()->routeIs('students.create') ? 'active' : '' }}">
            <i class="bi bi-person-plus-fill"></i> <span>Add Student</span>
        </a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>