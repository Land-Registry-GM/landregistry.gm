@extends('layouts.app')

@section('title', 'About - Land Registry - The Gambia')

@section('description', 'Learn about the modern land registry system for The Gambia, our mission, vision, and commitment to transparent property management.')

@section('content')
<div class="container">

    <!-- Mission & Vision -->
    <section class="mission-vision mb-6">
        <div class="grid-2">
            <div class="card">
                <h3>
                    <i class="fas fa-bullseye"></i>
                    Our Mission
                </h3>
                <p>To establish a modern, secure, and transparent land registry system that serves the people of The Gambia by providing reliable property information, reducing fraud, and promoting economic development through clear land ownership.</p>
            </div>
            <div class="card">
                <h3>
                    <i class="fas fa-eye"></i>
                    Our Vision
                </h3>
                <p>To become the leading digital land registry in West Africa, setting standards for transparency, efficiency, and public trust in property management systems.</p>
            </div>
        </div>
    </section>

    <!-- Project Overview -->
    <section class="project-overview mb-6">
        <div class="card">
            <h2>About LandRegistry.GM</h2>
            <p>The Land Registry System for The Gambia is an open-source initiative aimed at modernizing the country's property registration and management processes. Our system addresses the challenges faced by traditional paper-based land registries while ensuring compliance with Gambian laws and regulations.</p>

            <div class="key-objectives mt-4">
                <h3>Key Objectives</h3>
                <ul>
                    <li>Digitize all land records and make them accessible online</li>
                    <li>Reduce processing times for land transactions</li>
                    <li>Prevent land fraud and disputes through secure verification</li>
                    <li>Improve transparency and public access to property information</li>
                    <li>Support economic development through clear land ownership</li>
                    <li>Ensure compliance with international best practices</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Team & Partners -->
    <section class="team-partners mb-6">
        <div class="card">
            <h2>Development Team & Partners</h2>
            <p>This project is developed through collaboration between government agencies, technology experts, and the open-source community.</p>

            <div class="partners-grid mt-4">
                <div class="partner-item">
                    <h4>
                        <i class="fas fa-building"></i>
                        Government Partners
                    </h4>
                    <p>Working closely with relevant government departments to ensure compliance and integration with existing systems.</p>
                </div>
                <div class="partner-item">
                    <h4>
                        <i class="fas fa-code"></i>
                        Open Source Community
                    </h4>
                    <p>Leveraging the power of open-source development for transparency, security, and community-driven improvements.</p>
                </div>
                <div class="partner-item">
                    <h4>
                        <i class="fas fa-graduation-cap"></i>
                        Academic Partners
                    </h4>
                    <p>Collaborating with educational institutions for research, validation, and continuous improvement of the system.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="timeline mb-6">
        <h2 class="text-center mb-4">Development Timeline</h2>
        <div class="timeline-container">
            <div class="timeline-item">
                <div class="timeline-date">Phase 1</div>
                <div class="timeline-content">
                    <h4>Foundation & Core Features</h4>
                    <p>Basic property registration, user management, and admin interface development.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Phase 2</div>
                <div class="timeline-content">
                    <h4>Advanced Features</h4>
                    <p>Document management, dispute resolution, and public access portal.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Phase 3</div>
                <div class="timeline-content">
                    <h4>Integration & Testing</h4>
                    <p>Government system integration, security audits, and user acceptance testing.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Phase 4</div>
                <div class="timeline-content">
                    <h4>Launch & Training</h4>
                    <p>Public launch, user training, and ongoing support and maintenance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section class="contact-cta">
        <div class="card text-center" style="background: linear-gradient(135deg, var(--secondary-color), #2ecc71); color: white;">
            <h3>Get Involved</h3>
            <p class="mb-4">Interested in contributing to the development of this system? We welcome collaboration from developers, legal experts, and stakeholders.</p>
            <div class="cta-buttons">
                <a href="https://github.com/Land-Registry-GM/landregistry.gm" target="_blank" class="btn" style="background: white; color: var(--secondary-color);">
                    <i class="fab fa-github"></i> View on GitHub
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-envelope"></i> Contact Us
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

.grid-2 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.tech-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.tech-grid ul {
    list-style: none;
    padding: 0;
}

.tech-grid li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.tech-grid li:last-child {
    border-bottom: none;
}

.partners-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.timeline-container {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.timeline-container::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--secondary-color);
    transform: translateX(-50%);
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
}

.timeline-item:nth-child(odd) {
    flex-direction: row;
}

.timeline-item:nth-child(even) {
    flex-direction: row-reverse;
}

.timeline-date {
    background: var(--secondary-color);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: bold;
    min-width: 100px;
    text-align: center;
    z-index: 1;
}

.timeline-content {
    background: white;
    padding: 1.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin: 0 2rem;
    flex: 1;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .timeline-container::before {
        left: 20px;
    }

    .timeline-item {
        flex-direction: column !important;
        align-items: flex-start;
        margin-left: 40px;
    }

    .timeline-content {
        margin: 1rem 0 0 0;
        width: 100%;
    }

    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>
@endsection
