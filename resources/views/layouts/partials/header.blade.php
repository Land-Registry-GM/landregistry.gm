<header>
    <nav class="container">
        <div class="nav-content">
            <div class="logo">
                <a href="{{ route('home') }}" style="color: white; text-decoration: none;">
                    {{ config('app.name', 'LRGM') }}
                </a>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Search for Property or Land..." id="search-input">
                <button onclick="performSearch()">Search</button>
            </div>

            <div class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">FAQ</a>

                @auth
                    <a href="{{ url('/auth') }}" class="btn btn-outline">
                        Dashboard
                    </a>
                @else
                    <a href="/auth/login" class="btn btn-outline">
                        Log in
                    </a>
                @endauth
            </div>
        </div>
    </nav>
</header>

<script>
function performSearch() {
    const searchTerm = document.getElementById('search-input').value.trim();
    if (searchTerm) {
        // For now, just show an alert. In the future, this could redirect to a search results page
        alert('Search functionality coming soon! You searched for: ' + searchTerm);
    }
}

// Allow search on Enter key
document.getElementById('search-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        performSearch();
    }
});
</script>
