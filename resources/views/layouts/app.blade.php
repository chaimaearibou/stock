<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Management System</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI CSS -->
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="min-vh-100 d-flex flex-column">
    <header class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid px-4">
        <!-- Brand with spacing and hover effect -->
        <a class="navbar-brand fs-3 fw-bold d-flex align-items-center me-5" href="#">
            <i class="bi bi-box-seam me-2" style="font-size: 1.8rem"></i>
            <span class="hover-text">Stock System</span>
        </a>

        <!-- Toggler with better spacing -->
        <button class="navbar-toggler border-0 px-3 py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation with improved spacing -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-4">
                <!-- Dashboard link with hover effect -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" 
                       class="nav-link text-white d-flex align-items-center py-2 px-3 hover-effect border-bottom border-2 border-white">
                        <i class="bi bi-speedometer2 me-2"></i>
                        <span class="fw-medium">{{ trans('Dashboard') }}</span>
                    </a>
                </li>

                <!-- Language selector with custom styling -->
                <li class="nav-item dropdown">
                    <div class="position-relative">
                        <select name="selectLocale" id="selectLocale" 
                                class="form-select form-select-sm bg-dark text-white border-secondary pe-4"
                                style="width: 100px; appearance: none">
                            <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>AR</option>
                            <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>FR</option>
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                            <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>ES</option>
                        </select>
                        <i class="bi bi-chevron-down position-absolute end-0 top-50 translate-middle-y me-2"></i>
                    </div>
                </li>

                <!-- Logout button with better spacing -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="btn btn-danger btn-sm px-3 py-1 d-flex align-items-center">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            <span class="d-none d-lg-inline">Déconnexion</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

    <main class="container flex-grow-1 py-4">
        @yield('content')
    </main>

    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- charts code --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Stock Management System. All rights reserved.</p>
        </div>
    </footer>

    <script>
        $("#selectLocale").on('change', function() {
            var locale = $(this).val();
            window.location.href = "/changeLocale/" + locale;
        })
    </script>

    @stack('scripts')

</body>

</html>
