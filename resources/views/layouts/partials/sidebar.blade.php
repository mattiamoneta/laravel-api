    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary vh-100 bg-dark sidebar">
        <a class="navbar-brand d-flex align-items-center justify-conten mb-4" href="{{ url('/') }}">
            <div class="logo_laravel text-white">
                <h1 class="display-6 fw-bold">Bool<span class="display-6">folio</span></h1>
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <ul class="nav nav-pills flex-column mb-auto">

            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white" aria-current="page">
                    <i class="fa-solid fa-house me-2"></i>
                    Overview
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}" class="nav-link text-white link-body-emphasis">
                    <i class="fa-solid fa-book me-2"></i>
                    Portfolio
                </a>
            </li>
            <hr class="border-light">
            <li>
                <a href="{{ route('admin.types.index') }}" class="nav-link text-white link-body-emphasis">
                    <i class="fa-solid fa-filter me-2"></i>
                    Types
                </a>
            </li>
            <li>
                <a href="{{ route('admin.technologies.index') }}" class="nav-link text-white link-body-emphasis">
                    <i class="fa-solid fa-filter me-2"></i>
                    Technologies
                </a>
            </li>
            <hr class="border-light">
            <li>
                <a href="{{ route('admin.projects.create') }}"
                    class="btn btn-light w-100 rounded-5 text-uppercase small-btn fw-bold">
                    <i class="fa-solid fa-plus me-2"></i>
                    New Project
                </a>
            </li>
        </ul>
    </div>
