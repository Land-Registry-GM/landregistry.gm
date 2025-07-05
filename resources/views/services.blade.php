@extends('layouts.app')

@section('title', 'Services - Land Registry - The Gambia')

@section('description', 'Explore the comprehensive services offered by the Land Registry system including property registration, title verification, and dispute resolution.')

@section('content')
<div class="container">
    <!-- Page Header -->
    <section class="page-header text-center mb-6">
        <h1>Our Services</h1>
        <p class="lead">Comprehensive land registry services designed to meet the needs of citizens, businesses, and government agencies</p>
    </section>

    <!-- Main Services -->
    <section class="main-services mb-6">
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Property Registration</h3>
                <p>Complete digital property registration process including title deeds, land surveys, and ownership verification.</p>
                <ul class="service-features">
                    <li>Online application submission</li>
                    <li>Document verification</li>
                    <li>Digital title generation</li>
                    <li>Real-time status tracking</li>
                </ul>
                <div class="service-status">
                    <span class="status-badge coming-soon">Coming Soon</span>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>Title Verification</h3>
                <p>Verify property ownership and title authenticity with our secure verification system.</p>
                <ul class="service-features">
                    <li>Instant title verification</li>
                    <li>Ownership history</li>
                    <li>Encumbrance checks</li>
                    <li>Digital certificates</li>
                </ul>
                <div class="service-status">
                    <span class="status-badge coming-soon">Coming Soon</span>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Document Management</h3>
                <p>Secure storage and management of all property-related documents and certificates.</p>
                <ul class="service-features">
                    <li>Digital document storage</li>
                    <li>Version control</li>
                    <li>Secure access</li>
                    <li>Document sharing</li>
                </ul>
                <div class="service-status">
                    <span class="status-badge coming-soon">Coming Soon</span>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3>Dispute Resolution</h3>
                <p>Integrated system for managing and resolving land disputes with transparency.</p>
                <ul class="service-features">
                    <li>Dispute filing</li>
                    <li>Case tracking</li>
                    <li>Mediation support</li>
                    <li>Resolution documentation</li>
                </ul>
                <div class="service-status">
                    <span class="status-badge coming-soon">Coming Soon</span>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>Property Search</h3>
                <p>Comprehensive property search and information retrieval system.</p>
                <ul class="service-features">
                    <li>Property lookup</li>
                    <li>Owner information</li>
                    <li>Property history</li>
                    <li>Map integration</li>
                </ul>
                <div class="service-status">
                    <span class="status-badge coming-soon">Coming Soon</span>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Permit Management</h3>
                <p>Streamlined process for managing construction and development permits.</p>
                <ul class="service-features">
                    <li>Permit applications</li>
                    <li>Approval workflow</li>
                    <li>Compliance tracking</li>
                    <li>Renewal notifications</li>
                </ul>
                <div class="service-status">
                    <span class="status-badge coming-soon">Coming Soon</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories -->
    <section class="service-categories mb-6">
        <h2 class="text-center mb-4">Service Categories</h2>
        <div class="categories-grid">
            <div class="category-card">
                <h3>
                    <i class="fas fa-user"></i>
                    For Citizens
                </h3>
                <p>Easy access to property information and registration services for individual property owners.</p>
                <ul>
                    <li>Property registration</li>
                    <li>Title verification</li>
                    <li>Document requests</li>
                    <li>Dispute filing</li>
                </ul>
            </div>

            <div class="category-card">
                <h3>
                    <i class="fas fa-building"></i>
                    For Businesses
                </h3>
                <p>Comprehensive services for real estate companies, developers, and business entities.</p>
                <ul>
                    <li>Bulk property searches</li>
                    <li>Commercial registration</li>
                    <li>Development permits</li>
                    <li>Corporate accounts</li>
                </ul>
            </div>

            <div class="category-card">
                <h3>
                    <i class="fas fa-building"></i>
                    For Government
                </h3>
                <p>Specialized services and integration for government agencies and departments.</p>
                <ul>
                    <li>System integration</li>
                    <li>Data analytics</li>
                    <li>Compliance reporting</li>
                    <li>Administrative tools</li>
                </ul>
            </div>

            <div class="category-card">
                <h3>
                    <i class="fas fa-balance-scale"></i>
                    For Legal Professionals
                </h3>
                <p>Professional services for lawyers, surveyors, and legal practitioners.</p>
                <ul>
                    <li>Legal document access</li>
                    <li>Case management</li>
                    <li>Professional verification</li>
                    <li>Bulk processing</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Pricing Information -->
    <section class="pricing-info mb-6">
        <div class="card">
            <h2 class="text-center mb-4">Service Fees & Pricing</h2>
            <p class="text-center mb-4">Transparent and affordable pricing structure for all our services</p>

            <div class="pricing-grid">
                <div class="pricing-item">
                    <h4>Basic Services</h4>
                    <div class="price">Free</div>
                    <ul>
                        <li>Property search</li>
                        <li>Basic title verification</li>
                        <li>Document viewing</li>
                    </ul>
                </div>

                <div class="pricing-item featured">
                    <h4>Standard Services</h4>
                    <div class="price">GMD 500</div>
                    <ul>
                        <li>Property registration</li>
                        <li>Title certificate</li>
                        <li>Document copies</li>
                        <li>Email support</li>
                    </ul>
                </div>

                <div class="pricing-item">
                    <h4>Premium Services</h4>
                    <div class="price">GMD 1,500</div>
                    <ul>
                        <li>Priority processing</li>
                        <li>Express verification</li>
                        <li>Legal documentation</li>
                        <li>Phone support</li>
                    </ul>
                </div>
            </div>

            <div class="pricing-note mt-4">
                <p><strong>Note:</strong> Pricing is subject to change and may vary based on property type and service complexity. Government fees may apply.</p>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works mb-6">
        <h2 class="text-center mb-4">How Our Services Work</h2>
        <div class="process-steps">
            <div class="step">
                <div class="step-number">1</div>
                <h4>Register Account</h4>
                <p>Create your secure account with identity verification</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h4>Submit Application</h4>
                <p>Complete online forms and upload required documents</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h4>Verification Process</h4>
                <p>Our team reviews and verifies your information</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h4>Receive Results</h4>
                <p>Get your processed documents and certificates</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="card text-center" style="background: linear-gradient(135deg, var(--accent-color), #2980b9); color: white;">
            <h3>Need Help with Our Services?</h3>
            <p class="mb-4">Our support team is here to assist you with any questions about our services or help you get started.</p>
            <div class="contact-options">
                <a href="{{ route('contact') }}" class="btn" style="background: white; color: var(--accent-color);">
                    <i class="fas fa-envelope"></i> Contact Support
                </a>
                <a href="{{ route('faq') }}" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-question-circle"></i> View FAQ
                </a>
            </div>
        </div>
    </section>
</div>

<style>
.page-header h1 {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.lead {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.service-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 2rem;
    box-shadow: var(--shadow);
    transition: var(--transition);
    border: 2px solid transparent;
}

.service-card:hover {
    transform: translateY(-5px);
    border-color: var(--secondary-color);
}

.service-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    display: block;
}

.service-features {
    list-style: none;
    padding: 0;
    margin: 1rem 0;
}

.service-features li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 1.5rem;
}

.service-features li:before {
    content: "✓";
    color: var(--secondary-color);
    position: absolute;
    left: 0;
    font-weight: bold;
}

.service-features li:last-child {
    border-bottom: none;
}

.service-status {
    margin-top: 1rem;
}

.status-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
}

.status-badge.coming-soon {
    background: #f39c12;
    color: white;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.category-card {
    background: white;
    border-radius: var(--border-radius);
    padding: 1.5rem;
    box-shadow: var(--shadow);
    border-left: 4px solid var(--secondary-color);
}

.category-card ul {
    list-style: none;
    padding: 0;
    margin-top: 1rem;
}

.category-card li {
    padding: 0.25rem 0;
    position: relative;
    padding-left: 1.5rem;
}

.category-card li:before {
    content: "•";
    color: var(--secondary-color);
    position: absolute;
    left: 0;
    font-weight: bold;
}

.pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-top: 2rem;
}

.pricing-item {
    background: white;
    border-radius: var(--border-radius);
    padding: 1.5rem;
    text-align: center;
    border: 2px solid #eee;
    transition: var(--transition);
}

.pricing-item.featured {
    border-color: var(--secondary-color);
    transform: scale(1.05);
}

.price {
    font-size: 2rem;
    font-weight: bold;
    color: var(--secondary-color);
    margin: 1rem 0;
}

.pricing-item ul {
    list-style: none;
    padding: 0;
    text-align: left;
}

.pricing-item li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 1.5rem;
}

.pricing-item li:before {
    content: "✓";
    color: var(--secondary-color);
    position: absolute;
    left: 0;
    font-weight: bold;
}

.pricing-item li:last-child {
    border-bottom: none;
}

.process-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.step {
    text-align: center;
    position: relative;
}

.step-number {
    width: 60px;
    height: 60px;
    background: var(--secondary-color);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0 auto 1rem;
}

.contact-options {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .services-grid {
        grid-template-columns: 1fr;
    }

    .pricing-grid {
        grid-template-columns: 1fr;
    }

    .pricing-item.featured {
        transform: none;
    }

    .process-steps {
        grid-template-columns: 1fr;
    }

    .contact-options {
        flex-direction: column;
        align-items: center;
    }
}
</style>
@endsection
