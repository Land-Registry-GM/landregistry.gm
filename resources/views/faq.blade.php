@extends('layouts.app')

@section('title', 'FAQ - Land Registry - The Gambia')

@section('description', 'Find answers to frequently asked questions about the Land Registry system, property registration, and our services.')

@section('content')
<div class="container">
    <!-- Page Header -->
    <section class="page-header text-center mb-6">
        <h1>Frequently Asked Questions</h1>
        <p class="lead">Find answers to common questions about our land registry services and system</p>
    </section>

    <!-- Search FAQ -->
    <section class="faq-search mb-6">
        <div class="card">
            <div class="search-container">
                <input type="text" id="faq-search" placeholder="Search for questions..." class="search-input">
                <button onclick="searchFAQ()" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- FAQ Categories -->
    <section class="faq-categories mb-6">
        <div class="category-tabs">
            <button class="tab-btn active" data-category="general">General</button>
            <button class="tab-btn" data-category="registration">Registration</button>
            <button class="tab-btn" data-category="verification">Verification</button>
            <button class="tab-btn" data-category="technical">Technical</button>
            <button class="tab-btn" data-category="legal">Legal</button>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="faq-content">
        <!-- General Questions -->
        <div class="faq-section active" id="general">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What is the Land Registry System?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>The Land Registry System is a modern, digital platform designed to manage and maintain land ownership records in The Gambia. It provides secure, transparent, and efficient property registration and management services.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Who can use the Land Registry System?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>The system is available to all citizens of The Gambia, businesses, legal professionals, and government agencies. Different user types have access to different levels of functionality based on their needs and authorization.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Is the system secure and reliable?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, the system uses advanced security measures including encryption, secure authentication, and regular backups. All data is protected and the system is designed to be highly reliable with 99.9% uptime.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What are the business hours for support?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Our support team is available Monday through Friday from 8:00 AM to 5:00 PM GMT. For urgent matters, you can contact us via email at any time, and we'll respond as soon as possible.</p>
                </div>
            </div>
        </div>

        <!-- Registration Questions -->
        <div class="faq-section" id="registration">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>How do I register my property?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Property registration can be done online through our portal. You'll need to:</p>
                    <ol>
                        <li>Create an account and verify your identity</li>
                        <li>Complete the registration application form</li>
                        <li>Upload required documents (proof of ownership, survey plans, etc.)</li>
                        <li>Pay the registration fee</li>
                        <li>Wait for verification and approval</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What documents do I need for registration?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Required documents typically include:</p>
                    <ul>
                        <li>Proof of ownership (deed, will, etc.)</li>
                        <li>Survey plan or land map</li>
                        <li>Valid identification documents</li>
                        <li>Tax clearance certificate</li>
                        <li>Any existing title documents</li>
                    </ul>
                    <p>Specific requirements may vary based on property type and location.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>How long does the registration process take?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Standard registration processing takes 5-10 business days. Express processing is available for urgent cases and takes 2-3 business days. Processing times may vary depending on the complexity of the case and completeness of documentation.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What are the registration fees?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Registration fees vary based on property type and value:</p>
                    <ul>
                        <li>Residential properties: GMD 500</li>
                        <li>Commercial properties: GMD 1,000</li>
                        <li>Agricultural land: GMD 300</li>
                        <li>Express processing: Additional GMD 500</li>
                    </ul>
                    <p>Fees are subject to change and may include additional government charges.</p>
                </div>
            </div>
        </div>

        <!-- Verification Questions -->
        <div class="faq-section" id="verification">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>How can I verify a property title?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Title verification can be done through our online portal by:</p>
                    <ol>
                        <li>Searching for the property using address or title number</li>
                        <li>Viewing the property details and ownership information</li>
                        <li>Checking for any encumbrances or disputes</li>
                        <li>Downloading verification certificates if needed</li>
                    </ol>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Is title verification free?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Basic title verification is free for registered users. Detailed verification reports and certificates may incur a small fee (GMD 100-200) depending on the level of detail required.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Can I verify ownership history?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, the system maintains a complete ownership history for all registered properties. You can view previous owners, transfer dates, and any changes in ownership over time. This information is available to authorized users.</p>
                </div>
            </div>
        </div>

        <!-- Technical Questions -->
        <div class="faq-section" id="technical">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What browsers are supported?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>The system supports all modern browsers including:</p>
                    <ul>
                        <li>Google Chrome (recommended)</li>
                        <li>Mozilla Firefox</li>
                        <li>Safari</li>
                        <li>Microsoft Edge</li>
                    </ul>
                    <p>For the best experience, we recommend using the latest version of your browser.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Can I access the system on mobile devices?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, the system is fully responsive and works on mobile devices including smartphones and tablets. All core functionality is available on mobile, though some features may be optimized for desktop use.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What if I forget my password?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>You can reset your password by clicking the "Forgot Password" link on the login page. You'll receive a reset link via email. For security reasons, password resets require email verification.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>How do I update my account information?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>You can update your account information through your profile settings. Some changes may require verification, especially if they affect your identity or contact information.</p>
                </div>
            </div>
        </div>

        <!-- Legal Questions -->
        <div class="faq-section" id="legal">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What legal protections are in place?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>The system operates under Gambian law and provides several legal protections:</p>
                    <ul>
                        <li>Digital signatures are legally recognized</li>
                        <li>All transactions are logged and auditable</li>
                        <li>Dispute resolution mechanisms are integrated</li>
                        <li>Data protection laws are strictly followed</li>
                    </ul>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>How are disputes handled?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>Land disputes can be filed through the system and are handled through a structured process:</p>
                    <ol>
                        <li>Dispute filing with supporting documentation</li>
                        <li>Initial review and case assignment</li>
                        <li>Mediation or formal resolution process</li>
                        <li>Final decision and documentation</li>
                    </ol>
                    <p>All disputes are handled in accordance with Gambian land law.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What happens if there's an error in the records?</h3>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="faq-answer">
                    <p>If you discover an error in the records, you can:</p>
                    <ol>
                        <li>Report the error through the system</li>
                        <li>Provide supporting documentation</li>
                        <li>Request a correction review</li>
                        <li>Follow the formal correction process if needed</li>
                    </ol>
                    <p>All corrections are logged and require proper authorization.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Support -->
    <section class="contact-support mt-6">
        <div class="card text-center" style="background: linear-gradient(135deg, var(--secondary-color), #2ecc71); color: white;">
            <h3>Still Have Questions?</h3>
            <p class="mb-4">If you couldn't find the answer you're looking for, our support team is here to help.</p>
            <div class="support-options">
                <a href="{{ route('contact') }}" class="btn" style="background: white; color: var(--secondary-color);">
                    <i class="fas fa-envelope"></i> Contact Support
                </a>
                <a href="mailto:{{ config('mail.contact_email', 'info@landregistry.gm') }}" class="btn btn-outline" style="border-color: white; color: white;">
                    <i class="fas fa-envelope"></i> Email Us
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

/* Search Styles */
.search-container {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
}

.search-input {
    flex: 1;
    padding: 1rem;
    border: 2px solid #e1e5e9;
    border-radius: var(--border-radius) 0 0 var(--border-radius);
    font-size: 1rem;
    border-right: none;
}

.search-input:focus {
    outline: none;
    border-color: var(--accent-color);
}

.search-btn {
    padding: 1rem 1.5rem;
    background: var(--accent-color);
    color: white;
    border: none;
    border-radius: 0 var(--border-radius) var(--border-radius) 0;
    cursor: pointer;
    font-size: 1.2rem;
}

.search-btn:hover {
    background: #2980b9;
}

/* Category Tabs */
.category-tabs {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}

.tab-btn {
    padding: 0.75rem 1.5rem;
    background: white;
    border: 2px solid #e1e5e9;
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: var(--transition);
    font-weight: 500;
}

.tab-btn:hover {
    border-color: var(--accent-color);
    background: #f8f9fa;
}

.tab-btn.active {
    background: var(--accent-color);
    color: white;
    border-color: var(--accent-color);
}

/* FAQ Sections */
.faq-section {
    display: none;
}

.faq-section.active {
    display: block;
}

.faq-item {
    background: white;
    border-radius: var(--border-radius);
    margin-bottom: 1rem;
    box-shadow: var(--shadow);
    overflow: hidden;
}

.faq-question {
    padding: 1.5rem;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: var(--transition);
    border-bottom: 1px solid transparent;
}

.faq-question:hover {
    background: #f8f9fa;
}

.faq-question.active {
    border-bottom-color: #e1e5e9;
}

.faq-question h3 {
    margin: 0;
    color: var(--primary-color);
    font-size: 1.1rem;
}

.toggle-icon {
    font-size: 1.5rem;
    font-weight: bold;
    color: var(--accent-color);
    transition: var(--transition);
}

.faq-question.active .toggle-icon {
    transform: rotate(45deg);
}

.faq-answer {
    padding: 0 1.5rem;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.faq-answer.active {
    padding: 1.5rem;
    max-height: 500px;
}

.faq-answer p {
    margin-bottom: 1rem;
    line-height: 1.6;
}

.faq-answer ul, .faq-answer ol {
    margin-left: 1.5rem;
    margin-bottom: 1rem;
}

.faq-answer li {
    margin-bottom: 0.5rem;
}

/* Support Section */
.support-options {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 768px) {
    .category-tabs {
        flex-direction: column;
        align-items: center;
    }

    .tab-btn {
        width: 100%;
        max-width: 300px;
    }

    .faq-question {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .support-options {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<script>
// FAQ Toggle Function
function toggleFAQ(element) {
    const question = element;
    const answer = question.nextElementSibling;
    const icon = question.querySelector('.toggle-icon');

    // Close other open FAQs
    const allQuestions = document.querySelectorAll('.faq-question');
    allQuestions.forEach(q => {
        if (q !== question) {
            q.classList.remove('active');
            q.nextElementSibling.classList.remove('active');
        }
    });

    // Toggle current FAQ
    question.classList.toggle('active');
    answer.classList.toggle('active');
}

// Category Tab Function
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const faqSections = document.querySelectorAll('.faq-section');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');

            // Remove active class from all tabs and sections
            tabBtns.forEach(b => b.classList.remove('active'));
            faqSections.forEach(s => s.classList.remove('active'));

            // Add active class to clicked tab and corresponding section
            this.classList.add('active');
            document.getElementById(category).classList.add('active');
        });
    });
});

// Search Function
function searchFAQ() {
    const searchTerm = document.getElementById('faq-search').value.toLowerCase();
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('h3').textContent.toLowerCase();
        const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
            // Highlight search term
            if (searchTerm) {
                item.style.backgroundColor = '#fff3cd';
            } else {
                item.style.backgroundColor = 'white';
            }
        } else {
            item.style.display = 'none';
        }
    });
}

// Search on Enter key
document.getElementById('faq-search').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        searchFAQ();
    }
});

// Clear search highlighting when search is cleared
document.getElementById('faq-search').addEventListener('input', function() {
    if (!this.value) {
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            item.style.backgroundColor = 'white';
            item.style.display = 'block';
        });
    }
});
</script>
@endsection
