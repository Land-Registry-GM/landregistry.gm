<footer>
    <div class="container">
        <div class="footer-links">
            <a href="https://www.landregistry.gm" target="_blank" rel="noopener">Official Website</a>
            <a href="https://github.com/Land-Registry-GM/landregistry.gm" target="_blank" rel="noopener">GitHub Project</a>
            <a href="mailto:{{ config('mail.contact_email', 'info@landregistry.gm') }}">Contact Email</a>
            <a href="{{ route('privacy') }}">Privacy Policy</a>
            <a href="{{ route('terms') }}">Terms of Service</a>
        </div>
        <div class="copyright">
            &copy; {{ date('Y') }} {{ config('app.name', 'Land Registry - The Gambia') }}. All rights reserved.
        </div>
    </div>
</footer>
