    <!-- Top Navigation -->
       @php
                        $user = Auth::user();
                        $initial = strtoupper(substr($user->name ?? 'U', 0, 1)); // Caso não haja nome, usa "U"
                    @endphp
    <header>
        <div class="header-content">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <p class="welcome-text">Bem-vindo de volta, {{$user->name}}!</p>
            </div>
            <div class="user-area">
               
                <div class="user-profile">
                 

                    <div
                        class="user-avatar w-10 h-10 bg-purple-600 text-white flex items-center justify-center rounded-full font-bold text-lg">
                        {{ $initial }}
                    </div>
                       <div class="relative">
                <button class="notification-btn text-gray-600 text-xl focus:outline-none">
                    <i class="fas fa-bell"></i>
                </button>
                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                    3
                </span>
            </div>
                </div>
            </div>
        </div>
    </header>
