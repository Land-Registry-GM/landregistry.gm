// ===================================
// FAQ PAGE FUNCTIONALITY
// ===================================

document.addEventListener('DOMContentLoaded', function() {
    // FAQ Accordion functionality
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentElement;
            const answer = faqItem.querySelector('.faq-answer');
            const toggleIcon = this.querySelector('.toggle-icon');

            // Close other open items
            faqQuestions.forEach(otherQuestion => {
                if (otherQuestion !== this) {
                    const otherItem = otherQuestion.parentElement;
                    const otherAnswer = otherItem.querySelector('.faq-answer');
                    const otherIcon = otherQuestion.querySelector('.toggle-icon');

                    otherQuestion.classList.remove('active');
                    otherAnswer.classList.remove('show');
                    otherIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Toggle current item
            this.classList.toggle('active');
            answer.classList.toggle('show');

            if (this.classList.contains('active')) {
                toggleIcon.style.transform = 'rotate(180deg)';
            } else {
                toggleIcon.style.transform = 'rotate(0deg)';
            }
        });
    });

    // FAQ Search functionality
    const searchInput = document.querySelector('.faq-search input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }

    // Category tabs functionality
    const categoryTabs = document.querySelectorAll('.category-tab');
    const faqSections = document.querySelectorAll('.faq-section');

    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all tabs
            categoryTabs.forEach(t => t.classList.remove('active'));

            // Add active class to clicked tab
            this.classList.add('active');

            // Show/hide FAQ sections based on category
            const category = this.getAttribute('data-category');

            faqSections.forEach(section => {
                if (category === 'all' || section.getAttribute('data-category') === category) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });

    // Smooth scroll to FAQ items when clicking on links
    const faqLinks = document.querySelectorAll('a[href^="#faq-"]');

    faqLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                // Open the FAQ item
                const question = targetElement.querySelector('.faq-question');
                const answer = targetElement.querySelector('.faq-answer');
                const toggleIcon = question.querySelector('.toggle-icon');

                // Close other items first
                faqQuestions.forEach(otherQuestion => {
                    if (otherQuestion !== question) {
                        const otherItem = otherQuestion.parentElement;
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        const otherIcon = otherQuestion.querySelector('.toggle-icon');

                        otherQuestion.classList.remove('active');
                        otherAnswer.classList.remove('show');
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Open target item
                question.classList.add('active');
                answer.classList.add('show');
                toggleIcon.style.transform = 'rotate(180deg)';

                // Scroll to the element
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    });

    // Keyboard navigation for accessibility
    faqQuestions.forEach(question => {
        question.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });

        // Make questions focusable
        question.setAttribute('tabindex', '0');
    });

    // Category tabs keyboard navigation
    categoryTabs.forEach(tab => {
        tab.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });

        // Make tabs focusable
        tab.setAttribute('tabindex', '0');
    });
});
