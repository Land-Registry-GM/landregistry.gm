@extends('layouts.app')

@section('title', 'Privacy Policy - Land Registry - The Gambia')

@section('description', 'Learn about how we protect your privacy and handle your personal information in the Land Registry system.')

@section('content')
<div class="container">
    <!-- Page Header -->
    <section class="page-header text-center mb-6">
        <h1>Privacy Policy</h1>
        <p class="lead">How we protect your privacy and handle your personal information</p>
        <p class="text-muted">Last updated: {{ date('F j, Y') }}</p>
    </section>

    <!-- Privacy Content -->
    <section class="privacy-content">
        <div class="card">
            <div class="policy-section">
                <h2>1. Introduction</h2>
                <p>The Land Registry System for The Gambia ("we," "our," or "us") is committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our land registry services.</p>

                <p>By using our system, you agree to the collection and use of information in accordance with this policy. We are committed to complying with applicable data protection laws and regulations in The Gambia.</p>
            </div>

            <div class="policy-section">
                <h2>2. Information We Collect</h2>

                <h3>2.1 Personal Information</h3>
                <p>We may collect the following personal information:</p>
                <ul>
                    <li>Full name and contact details (email, phone, address)</li>
                    <li>Government-issued identification numbers</li>
                    <li>Property ownership information</li>
                    <li>Financial information for payment processing</li>
                    <li>Account credentials and authentication data</li>
                </ul>

                <h3>2.2 Property Information</h3>
                <p>We collect and store information related to properties including:</p>
                <ul>
                    <li>Property addresses and descriptions</li>
                    <li>Survey plans and boundary information</li>
                    <li>Ownership history and transfer records</li>
                    <li>Legal documents and certificates</li>
                    <li>Tax and assessment information</li>
                </ul>

                <h3>2.3 Technical Information</h3>
                <p>We automatically collect certain technical information when you use our system:</p>
                <ul>
                    <li>IP addresses and device information</li>
                    <li>Browser type and version</li>
                    <li>Usage patterns and system interactions</li>
                    <li>Error logs and performance data</li>
                </ul>
            </div>

            <div class="policy-section">
                <h2>3. How We Use Your Information</h2>
                <p>We use the collected information for the following purposes:</p>

                <div class="usage-grid">
                    <div class="usage-item">
                        <h4>🔐 Service Provision</h4>
                        <p>To provide and maintain our land registry services, process registrations, and manage property records.</p>
                    </div>

                    <div class="usage-item">
                        <h4>✅ Verification</h4>
                        <p>To verify your identity, validate property ownership, and ensure data accuracy.</p>
                    </div>

                    <div class="usage-item">
                        <h4>📞 Communication</h4>
                        <p>To communicate with you about your account, services, and important updates.</p>
                    </div>

                    <div class="usage-item">
                        <h4>🛡️ Security</h4>
                        <p>To protect against fraud, unauthorized access, and ensure system security.</p>
                    </div>

                    <div class="usage-item">
                        <h4>📊 Analytics</h4>
                        <p>To improve our services, analyze usage patterns, and enhance user experience.</p>
                    </div>

                    <div class="usage-item">
                        <h4>⚖️ Compliance</h4>
                        <p>To comply with legal obligations, government regulations, and audit requirements.</p>
                    </div>
                </div>
            </div>

            <div class="policy-section">
                <h2>4. Information Sharing and Disclosure</h2>
                <p>We do not sell, trade, or rent your personal information to third parties. However, we may share your information in the following circumstances:</p>

                <h3>4.1 Government Agencies</h3>
                <p>We may share information with authorized government agencies as required by law or for regulatory compliance.</p>

                <h3>4.2 Legal Requirements</h3>
                <p>We may disclose information when required by law, court order, or government request.</p>

                <h3>4.3 Service Providers</h3>
                <p>We may share information with trusted third-party service providers who assist us in operating our system, such as:</p>
                <ul>
                    <li>Cloud hosting providers</li>
                    <li>Payment processors</li>
                    <li>Security and monitoring services</li>
                    <li>Technical support providers</li>
                </ul>

                <h3>4.4 Public Records</h3>
                <p>Certain property information may be publicly accessible as required by land registry laws and regulations.</p>
            </div>

            <div class="policy-section">
                <h2>5. Data Security</h2>
                <p>We implement comprehensive security measures to protect your information:</p>

                <div class="security-features">
                    <div class="security-item">
                        <h4>🔒 Encryption</h4>
                        <p>All data is encrypted in transit and at rest using industry-standard encryption protocols.</p>
                    </div>

                    <div class="security-item">
                        <h4>🛡️ Access Controls</h4>
                        <p>Strict access controls and authentication mechanisms protect sensitive information.</p>
                    </div>

                    <div class="security-item">
                        <h4>📝 Audit Logging</h4>
                        <p>All system activities are logged and monitored for security purposes.</p>
                    </div>

                    <div class="security-item">
                        <h4>🔄 Regular Backups</h4>
                        <p>Regular backups ensure data integrity and availability.</p>
                    </div>
                </div>
            </div>

            <div class="policy-section">
                <h2>6. Your Rights and Choices</h2>
                <p>You have the following rights regarding your personal information:</p>

                <div class="rights-grid">
                    <div class="right-item">
                        <h4>👁️ Access</h4>
                        <p>Request access to your personal information and property records.</p>
                    </div>

                    <div class="right-item">
                        <h4>✏️ Correction</h4>
                        <p>Request correction of inaccurate or incomplete information.</p>
                    </div>

                    <div class="right-item">
                        <h4>🗑️ Deletion</h4>
                        <p>Request deletion of your personal information, subject to legal requirements.</p>
                    </div>

                    <div class="right-item">
                        <h4>🚫 Restriction</h4>
                        <p>Request restriction of processing in certain circumstances.</p>
                    </div>

                    <div class="right-item">
                        <h4>📤 Portability</h4>
                        <p>Request a copy of your data in a portable format.</p>
                    </div>

                    <div class="right-item">
                        <h4>📧 Communication</h4>
                        <p>Opt out of non-essential communications and marketing materials.</p>
                    </div>
                </div>
            </div>

            <div class="policy-section">
                <h2>7. Data Retention</h2>
                <p>We retain your information for as long as necessary to:</p>
                <ul>
                    <li>Provide our services and maintain your account</li>
                    <li>Comply with legal and regulatory requirements</li>
                    <li>Resolve disputes and enforce agreements</li>
                    <li>Maintain historical property records as required by law</li>
                </ul>

                <p>Property records are typically retained indefinitely as they constitute official government records.</p>
            </div>

            <div class="policy-section">
                <h2>8. Cookies and Tracking</h2>
                <p>We use cookies and similar technologies to:</p>
                <ul>
                    <li>Maintain your session and authentication status</li>
                    <li>Remember your preferences and settings</li>
                    <li>Analyze system usage and performance</li>
                    <li>Improve user experience and functionality</li>
                </ul>

                <p>You can control cookie settings through your browser preferences.</p>
            </div>

            <div class="policy-section">
                <h2>9. International Transfers</h2>
                <p>Your information is primarily stored and processed within The Gambia. If international transfers occur, we ensure appropriate safeguards are in place to protect your data.</p>
            </div>

            <div class="policy-section">
                <h2>10. Children's Privacy</h2>
                <p>Our services are not intended for children under 18 years of age. We do not knowingly collect personal information from children under 18.</p>
            </div>

            <div class="policy-section">
                <h2>11. Changes to This Policy</h2>
                <p>We may update this Privacy Policy from time to time. We will notify you of any material changes by:</p>
                <ul>
                    <li>Posting the updated policy on our website</li>
                    <li>Sending email notifications to registered users</li>
                    <li>Displaying prominent notices on our system</li>
                </ul>

                <p>Your continued use of our services after changes become effective constitutes acceptance of the updated policy.</p>
            </div>

            <div class="policy-section">
                <h2>12. Contact Us</h2>
                <p>If you have questions about this Privacy Policy or our data practices, please contact us:</p>

                <div class="contact-info">
                    <div class="contact-item">
                        <strong>Email:</strong>
                        <a href="mailto:{{ config('mail.contact_email', 'privacy@landregistry.gm') }}">
                            {{ config('mail.contact_email', 'privacy@landregistry.gm') }}
                        </a>
                    </div>

                    <div class="contact-item">
                        <strong>Address:</strong> Land Registry Office, Banjul, The Gambia
                    </div>

                    <div class="contact-item">
                        <strong>Phone:</strong> +220 123 456 789
                    </div>
                </div>
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
    margin: 0 auto 0.5rem;
}

.text-muted {
    color: #999;
    font-size: 0.9rem;
}

.policy-section {
    margin-bottom: 3rem;
}

.policy-section h2 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--secondary-color);
}

.policy-section h3 {
    color: var(--primary-color);
    margin: 1.5rem 0 0.5rem;
}

.policy-section p {
    line-height: 1.6;
    margin-bottom: 1rem;
}

.policy-section ul {
    margin-left: 1.5rem;
    margin-bottom: 1rem;
}

.policy-section li {
    margin-bottom: 0.5rem;
    line-height: 1.5;
}

.usage-grid, .security-features, .rights-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin: 1.5rem 0;
}

.usage-item, .security-item, .right-item {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: var(--border-radius);
    border-left: 4px solid var(--secondary-color);
}

.usage-item h4, .security-item h4, .right-item h4 {
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.contact-info {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: var(--border-radius);
    margin-top: 1rem;
}

.contact-item {
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.contact-item a {
    color: var(--accent-color);
    text-decoration: none;
}

.contact-item a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .usage-grid, .security-features, .rights-grid {
        grid-template-columns: 1fr;
    }

    .contact-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
}
</style>
@endsection
