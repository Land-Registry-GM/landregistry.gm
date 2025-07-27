@extends('layouts.app')

@section('title', 'Contact Us - Land Registry - The Gambia')

@section('description', 'Get in touch with the Land Registry team. Find our contact information and support details.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/contact.css') }}?v=1.5">
<style>
/* Force grid layout for contact info */
.contact-info {
    display: grid !important;
    grid-template-columns: repeat(2, 1fr) !important;
    gap: 1.5rem !important;
    max-width: 800px !important;
    margin: 0 auto !important;
    justify-content: center !important;
}

.contact-item {
    background: white !important;
    border-radius: 8px !important;
    padding: 1.5rem !important;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
    transition: all 0.3s ease !important;
    height: fit-content !important;
}

.contact-item:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15) !important;
}

.contact-content {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    min-height: 400px !important;
}

@media (max-width: 768px) {
    .contact-info {
        grid-template-columns: 1fr !important;
        max-width: 100% !important;
    }

    .contact-content {
        min-height: auto !important;
    }
}
</style>
@endpush

@section('content')
<div class="container">
    <!-- Contact Hero -->
    <section class="contact-hero">
        <h1>Contact Us</h1>
        <p>Get in touch with our team for support and inquiries about our land registry services</p>
    </section>

    <!-- Contact Information -->
    <section class="contact-content">
        <div class="contact-info">
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-details">
                    <h3>Email Support</h3>
                    <a href="mailto:{{ config('mail.contact_email', 'info@landregistry.gm') }}">
                        {{ config('mail.contact_email', 'info@landregistry.gm') }}
                    </a>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-details">
                    <h3>Phone Support</h3>
                    <a href="tel:+220123456789">
                        +220 123 456 789
                    </a>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-building"></i>
                </div>
                <div class="contact-details">
                    <h3>Office Address</h3>
                    <p>Main office location</p>
                    <address>
                        Land Registry Office<br>
                        Banjul, The Gambia<br>
                        West Africa
                    </address>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="contact-details">
                    <h3>Business Hours</h3>
                    <p>When we're available</p>
                    <div>
                        Monday - Friday<br>
                        8:00 AM - 5:00 PM GMT<br>
                        <small>Weekends: Closed</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media -->
    <section class="social-media">
        <h3>Follow Us</h3>

        <div class="social-icons">
            <a href="#" class="social-icon github" title="GitHub">
                <i class="fab fa-github"></i>
            </a>
            <a href="#" class="social-icon twitter" title="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon linkedin" title="LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="#" class="social-icon instagram" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="social-icon youtube" title="YouTube">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
    </section>
</div>




@endsection
