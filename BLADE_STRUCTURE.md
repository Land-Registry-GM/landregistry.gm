# Blade Template Structure

This document outlines the new structured Blade template system for the Land Registry application.

## Directory Structure

```
resources/views/
├── layouts/
│   ├── app.blade.php              # Main layout template
│   └── partials/
│       ├── header.blade.php       # Navigation header
│       └── footer.blade.php       # Footer component
├── welcome.blade.php              # Main landing page
├── home.blade.php                 # Home page (redirects to welcome)
├── about.blade.php                # About page
├── services.blade.php             # Services page
├── contact.blade.php              # Contact page
├── faq.blade.php                  # FAQ page
├── privacy.blade.php              # Privacy policy
└── terms.blade.php                # Terms of service
```

## Layout System

### Main Layout (`layouts/app.blade.php`)
- Base template that all pages extend
- Includes common CSS variables and responsive design
- Provides `@yield` sections for content, title, and description
- Supports `@stack` for additional styles and scripts

### Header Partial (`layouts/partials/header.blade.php`)
- Navigation menu with active state detection
- Search functionality (placeholder)
- Authentication links (login/register/dashboard)
- Responsive design for mobile devices

### Footer Partial (`layouts/partials/footer.blade.php`)
- Links to important pages and external resources
- Copyright information
- Contact information

## Page Templates

### Welcome Page (`welcome.blade.php`)
- Hero section with call-to-action buttons
- Feature cards highlighting system capabilities
- Benefits section with statistics
- Contact information

### About Page (`about.blade.php`)
- Mission and vision statements
- Project overview and objectives
- Technology stack information
- Development timeline
- Team and partners information

### Services Page (`services.blade.php`)
- Detailed service descriptions
- Service categories (Citizens, Businesses, Government, Legal)
- Pricing information
- Process steps
- Contact support section

### Contact Page (`contact.blade.php`)
- Contact information cards
- Interactive contact form with validation
- FAQ preview section
- Social media links

### FAQ Page (`faq.blade.php`)
- Searchable FAQ system
- Categorized questions (General, Registration, Verification, Technical, Legal)
- Expandable/collapsible answers
- Contact support section

### Privacy Policy (`privacy.blade.php`)
- Comprehensive privacy policy
- Information collection and usage
- Data security measures
- User rights and choices
- Contact information

### Terms of Service (`terms.blade.php`)
- Complete terms and conditions
- Acceptable use policy
- User account responsibilities
- Disclaimers and limitations
- Contact information

## CSS Architecture

### CSS Variables
The system uses CSS custom properties for consistent theming:

```css
:root {
    --primary-color: #2c3e50;
    --secondary-color: #27ae60;
    --accent-color: #3498db;
    --text-color: #333;
    --light-bg: #f5f5f5;
    --white: #ffffff;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
    --transition: all 0.3s ease;
}
```

### Responsive Design
- Mobile-first approach
- CSS Grid and Flexbox for layouts
- Breakpoints at 768px and 1024px
- Responsive navigation and content

### Component Classes
- `.card` - Standard card component
- `.btn` - Button styles with variants
- `.container` - Content wrapper
- Utility classes for spacing and alignment

## JavaScript Features

### Interactive Elements
- FAQ accordion functionality
- Search functionality (placeholder)
- Form validation
- Smooth animations and transitions

### Search Implementation
- Real-time search in FAQ page
- Search highlighting
- Category filtering

## SEO and Accessibility

### Meta Tags
- Dynamic titles and descriptions
- Open Graph support
- Proper heading hierarchy

### Accessibility Features
- Semantic HTML structure
- ARIA labels where needed
- Keyboard navigation support
- Screen reader friendly

## Usage Examples

### Creating a New Page
```php
@extends('layouts.app')

@section('title', 'Page Title')

@section('description', 'Page description for SEO')

@section('content')
<div class="container">
    <!-- Your content here -->
</div>
@endsection
```

### Adding Custom Styles
```php
@section('content')
<!-- Content here -->
@endsection

@push('styles')
<style>
/* Custom styles for this page */
</style>
@endpush
```

### Adding Custom Scripts
```php
@push('scripts')
<script>
// Custom JavaScript for this page
</script>
@endpush
```

## Maintenance

### Adding New Pages
1. Create the Blade template in `resources/views/`
2. Add the route in `routes/web.php`
3. Update navigation in `layouts/partials/header.blade.php`
4. Add link in footer if needed

### Updating Styles
- Global styles are in `layouts/app.blade.php`
- Page-specific styles are in each template
- Use CSS variables for consistent theming

### Content Updates
- All content is in the Blade templates
- Easy to update text, links, and information
- Contact information uses config variables

## Benefits

1. **Maintainability** - Clean separation of concerns
2. **Consistency** - Shared layout and styling
3. **Scalability** - Easy to add new pages
4. **Performance** - Optimized CSS and minimal JavaScript
5. **Accessibility** - Semantic HTML and ARIA support
6. **SEO** - Proper meta tags and structure
7. **Responsive** - Works on all device sizes 
