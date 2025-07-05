@extends('layouts.app')

@section('title', 'Welcome - Land Registry - The Gambia')

@section('description', 'Welcome to the modern land registry system for The Gambia. Secure, transparent, and efficient property registration and management.')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <section class="hero-section text-center py-8">
        <div class="hero-content">
            <h1 class="hero-title mb-6">Modern Land Registry for The Gambia</h1>
            <p class="hero-subtitle mb-6">
                Transforming property registration and management with secure, transparent, and efficient digital solutions
            </p>
            <div class="hero-buttons">
                <a href="{{ route('services') }}" class="btn">Explore Services</a>
                <a href="{{ route('about') }}" class="btn btn-outline">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Status Banner -->
    <section class="status-banner mb-6">
        <div class="card" style="background: linear-gradient(135deg, #27ae60, #2ecc71); color: white; text-align: center;">
            <h3>
                <i class="fas fa-wrench"></i>
                System Under Development
            </h3>
            <p>We are actively building a comprehensive land registry system. The platform will be available soon with full functionality.</p>
        </div>
    </section>

    <!-- Features Grid -->
    <section class="features-section mb-6">
        <h2 class="text-center mb-6">Key Features</h2>
        <div class="features-grid">
            <div class="card">
                <div class="feature-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Secure Land Records</h3>
                <p>Digital system for secure and transparent land ownership records with tamper-proof documentation and blockchain verification.</p>
            </div>

            <div class="card">
                <div class="feature-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Title Registration</h3>
                <p>Streamlined digital land title registration and verification process to reduce bureaucracy and processing times.</p>
            </div>

            <div class="card">
                <div class="feature-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Property Information</h3>
                <p>Online access to verified property information for citizens, businesses, and government agencies with real-time updates.</p>
            </div>

            <div class="card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Efficient Processes</h3>
                <p>Reduced paperwork and automated workflows to make transactions faster, more reliable, and cost-effective.</p>
            </div>

            <div class="card">
                <div class="feature-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>Open Development</h3>
                <p>Transparent, open-source approach to system development for public trust, collaboration, and continuous improvement.</p>
            </div>

            <div class="card">
                <div class="feature-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3>Dispute Resolution</h3>
                <p>Integrated mechanisms for addressing land disputes and maintaining accurate records with legal framework compliance.</p>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section mb-6">
        <div class="benefits-content">
            <div class="benefits-text">
                <h2>Why Choose Our Land Registry System?</h2>
                <ul class="benefits-list">
                    <li><strong>Transparency:</strong> All land records are publicly accessible and verifiable</li>
                    <li><strong>Security:</strong> Advanced encryption and blockchain technology protect your data</li>
                    <li><strong>Efficiency:</strong> Reduce processing times from months to days</li>
                    <li><strong>Accessibility:</strong> 24/7 online access from anywhere in The Gambia</li>
                    <li><strong>Compliance:</strong> Full compliance with Gambian land laws and regulations</li>
                    <li><strong>Support:</strong> Dedicated support team for citizens and professionals</li>
                </ul>
            </div>
            <div class="benefits-visual">
                <div class="card" style="background: linear-gradient(135deg, #3498db, #2980b9); color: white;">
                    <h3>Quick Facts</h3>
                    <div class="stats">
                        <div class="stat-item">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Digital Records</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Accessibility</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">< 5 days</span>
                            <span class="stat-label">Processing Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="card text-center">
            <h3>Get in Touch</h3>
            <p class="mb-4">Have questions about the land registry system? We're here to help.</p>
            <div class="contact-options">
                <a href="mailto:{{ config('mail.contact_email', 'info@landregistry.gm') }}" class="btn">
                    <i class="fas fa-envelope"></i> Email Us
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline">
                    <i class="fas fa-phone"></i> Contact Info
                </a>
            </div>
        </div>
    </section>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/welcome.css') }}">
@endpush
@endsection
