@extends('layouts.app')

@section('title', 'Terms of Service - Land Registry - The Gambia')

@section('description', 'Read our terms of service and conditions for using the Land Registry system.')

@section('content')
<div class="container">
    <!-- Page Header -->
    <section class="page-header text-center mb-6">
        <h1>Terms of Service</h1>
        <p class="lead">Terms and conditions for using the Land Registry system</p>
        <p class="text-muted">Last updated: {{ date('F j, Y') }}</p>
    </section>

    <!-- Terms Content -->
    <section class="terms-content">
        <div class="card">
            <div class="terms-section">
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing and using the Land Registry System for The Gambia ("the System"), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>

                <p>These Terms of Service ("Terms") govern your use of our land registry services, including all features, functionality, and content available through our website and system.</p>
            </div>

            <div class="terms-section">
                <h2>2. Description of Service</h2>
                <p>The Land Registry System provides digital land registration and management services including:</p>
                <ul>
                    <li>Property registration and title management</li>
                    <li>Land ownership verification and searches</li>
                    <li>Document management and storage</li>
                    <li>Dispute resolution services</li>
                    <li>Public access to property information</li>
                    <li>Administrative and regulatory compliance tools</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2>3. User Accounts and Registration</h2>

                <h3>3.1 Account Creation</h3>
                <p>To access certain features of the System, you must create an account. You agree to:</p>
                <ul>
                    <li>Provide accurate, current, and complete information</li>
                    <li>Maintain and update your account information</li>
                    <li>Keep your account credentials secure and confidential</li>
                    <li>Accept responsibility for all activities under your account</li>
                </ul>

                <h3>3.2 Account Security</h3>
                <p>You are responsible for:</p>
                <ul>
                    <li>Maintaining the confidentiality of your password</li>
                    <li>All activities that occur under your account</li>
                    <li>Notifying us immediately of any unauthorized use</li>
                    <li>Ensuring you log out at the end of each session</li>
                </ul>

                <h3>3.3 Account Termination</h3>
                <p>We reserve the right to terminate or suspend your account at any time for violations of these Terms or for any other reason at our sole discretion.</p>
            </div>

            <div class="terms-section">
                <h2>4. Acceptable Use Policy</h2>
                <p>You agree to use the System only for lawful purposes and in accordance with these Terms. You agree not to:</p>

                <div class="prohibited-uses">
                    <div class="prohibited-item">
                        <h4>🚫 Unauthorized Access</h4>
                        <p>Attempt to gain unauthorized access to any part of the System or other users' accounts.</p>
                    </div>

                    <div class="prohibited-item">
                        <h4>📝 False Information</h4>
                        <p>Provide false, misleading, or fraudulent information in any registration or application.</p>
                    </div>

                    <div class="prohibited-item">
                        <h4>🔄 System Interference</h4>
                        <p>Interfere with or disrupt the System's operation, servers, or networks.</p>
                    </div>

                    <div class="prohibited-item">
                        <h4>📊 Data Mining</h4>
                        <p>Use automated systems to extract data from the System without authorization.</p>
                    </div>

                    <div class="prohibited-item">
                        <h4>🦠 Malware</h4>
                        <p>Introduce viruses, malware, or other harmful code to the System.</p>
                    </div>

                    <div class="prohibited-item">
                        <h4>⚖️ Legal Violations</h4>
                        <p>Use the System for any illegal activities or in violation of applicable laws.</p>
                    </div>
                </div>
            </div>

            <div class="terms-section">
                <h2>5. Data and Privacy</h2>
                <p>Your privacy is important to us. Our collection and use of personal information is governed by our Privacy Policy, which is incorporated into these Terms by reference.</p>

                <h3>5.1 Data Accuracy</h3>
                <p>You are responsible for ensuring the accuracy of all information you provide to the System. We rely on the information you provide to maintain accurate land records.</p>

                <h3>5.2 Data Ownership</h3>
                <p>Property records and related data are official government records. While you retain rights to your personal information, property records may be subject to public access requirements.</p>
            </div>

            <div class="terms-section">
                <h2>6. Fees and Payments</h2>

                <h3>6.1 Service Fees</h3>
                <p>Certain services may require payment of fees. All fees are clearly displayed before you commit to a service. Fees are non-refundable unless otherwise specified.</p>

                <h3>6.2 Payment Methods</h3>
                <p>We accept various payment methods as indicated during the payment process. You agree to provide accurate payment information and authorize us to charge the specified amount.</p>

                <h3>6.3 Fee Changes</h3>
                <p>We reserve the right to modify fees at any time. Changes will be communicated in advance and will not affect services already paid for.</p>
            </div>

            <div class="terms-section">
                <h2>7. Intellectual Property</h2>

                <h3>7.1 System Ownership</h3>
                <p>The System and its content, including but not limited to text, graphics, logos, and software, are owned by or licensed to the Land Registry and are protected by intellectual property laws.</p>

                <h3>7.2 User Content</h3>
                <p>You retain ownership of content you submit to the System. By submitting content, you grant us a license to use, store, and display that content as necessary to provide our services.</p>

                <h3>7.3 Open Source</h3>
                <p>This system is developed as open-source software. The source code is available under appropriate open-source licenses as specified in the project documentation.</p>
            </div>

            <div class="terms-section">
                <h2>8. Disclaimers and Limitations</h2>

                <h3>8.1 Service Availability</h3>
                <p>We strive to maintain high system availability but cannot guarantee uninterrupted access. The System may be temporarily unavailable for maintenance or due to technical issues.</p>

                <h3>8.2 Data Accuracy</h3>
                <p>While we work to maintain accurate records, we cannot guarantee the accuracy of all information in the System. Users should verify critical information independently.</p>

                <h3>8.3 Limitation of Liability</h3>
                <p>To the maximum extent permitted by law, the Land Registry shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of the System.</p>
            </div>

            <div class="terms-section">
                <h2>9. Indemnification</h2>
                <p>You agree to indemnify and hold harmless the Land Registry, its officers, employees, and agents from any claims, damages, or expenses arising from:</p>
                <ul>
                    <li>Your use of the System</li>
                    <li>Your violation of these Terms</li>
                    <li>Your violation of any applicable laws or regulations</li>
                    <li>Any content you submit to the System</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2>10. Dispute Resolution</h2>

                <h3>10.1 Informal Resolution</h3>
                <p>We encourage users to contact us directly to resolve any issues before pursuing formal dispute resolution.</p>

                <h3>10.2 Formal Disputes</h3>
                <p>Any disputes arising from these Terms or your use of the System shall be resolved in accordance with Gambian law and the jurisdiction of Gambian courts.</p>

                <h3>10.3 Land Disputes</h3>
                <p>Land ownership disputes are handled through the System's integrated dispute resolution process and are subject to applicable land laws and regulations.</p>
            </div>

            <div class="terms-section">
                <h2>11. System Updates and Changes</h2>
                <p>We may update, modify, or discontinue features of the System at any time. We will provide reasonable notice of significant changes that affect your use of the System.</p>

                <h3>11.1 Feature Changes</h3>
                <p>New features may be added and existing features may be modified or removed. We will communicate significant changes through the System or via email.</p>

                <h3>11.2 System Maintenance</h3>
                <p>Scheduled maintenance may temporarily affect System availability. We will provide advance notice when possible.</p>
            </div>

            <div class="terms-section">
                <h2>12. Termination</h2>

                <h3>12.1 Termination by User</h3>
                <p>You may terminate your account at any time by contacting us or using the account deletion feature in your profile settings.</p>

                <h3>12.2 Termination by Us</h3>
                <p>We may terminate or suspend your access to the System immediately, without prior notice, for conduct that we believe violates these Terms or is harmful to other users or the System.</p>

                <h3>12.3 Effect of Termination</h3>
                <p>Upon termination, your right to use the System ceases immediately. However, certain information may be retained as required by law or for legitimate business purposes.</p>
            </div>

            <div class="terms-section">
                <h2>13. Governing Law</h2>
                <p>These Terms are governed by and construed in accordance with the laws of The Gambia. Any disputes shall be subject to the exclusive jurisdiction of the courts of The Gambia.</p>
            </div>

            <div class="terms-section">
                <h2>14. Severability</h2>
                <p>If any provision of these Terms is found to be unenforceable or invalid, that provision will be limited or eliminated to the minimum extent necessary so that these Terms will otherwise remain in full force and effect.</p>
            </div>

            <div class="terms-section">
                <h2>15. Changes to Terms</h2>
                <p>We reserve the right to modify these Terms at any time. Changes will be effective immediately upon posting. Your continued use of the System after changes become effective constitutes acceptance of the modified Terms.</p>

                <p>We will notify users of material changes through:</p>
                <ul>
                    <li>Email notifications to registered users</li>
                    <li>Prominent notices on the System</li>
                    <li>Updates to this Terms of Service page</li>
                </ul>
            </div>

            <div class="terms-section">
                <h2>16. Contact Information</h2>
                <p>If you have questions about these Terms of Service, please contact us:</p>

                <div class="contact-info">
                    <div class="contact-item">
                        <strong>Email:</strong>
                        <a href="mailto:{{ config('mail.contact_email', 'legal@landregistry.gm') }}">
                            {{ config('mail.contact_email', 'legal@landregistry.gm') }}
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

.terms-section {
    margin-bottom: 3rem;
}

.terms-section h2 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--secondary-color);
}

.terms-section h3 {
    color: var(--primary-color);
    margin: 1.5rem 0 0.5rem;
}

.terms-section p {
    line-height: 1.6;
    margin-bottom: 1rem;
}

.terms-section ul {
    margin-left: 1.5rem;
    margin-bottom: 1rem;
}

.terms-section li {
    margin-bottom: 0.5rem;
    line-height: 1.5;
}

.prohibited-uses {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin: 1.5rem 0;
}

.prohibited-item {
    background: #fff5f5;
    padding: 1.5rem;
    border-radius: var(--border-radius);
    border-left: 4px solid #e53e3e;
}

.prohibited-item h4 {
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
    .prohibited-uses {
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
