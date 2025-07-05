# CSS Organization Structure

This document outlines the organized CSS structure for the Land Registry project.

## File Structure

```
resources/css/
├── app.css              # Main stylesheet with variables, base styles, and utilities
├── components.css       # Reusable UI components (buttons, cards, forms, etc.)
├── layout.css          # Layout-specific styles (header, footer, navigation)
├── pages/              # Page-specific styles
│   ├── welcome.css     # Welcome page styles
│   ├── contact.css     # Contact page styles
│   └── faq.css         # FAQ page styles
└── README.md           # This documentation file
```

## CSS Architecture

### 1. CSS Variables (app.css)
- **Colors**: Primary, secondary, accent colors and gray scale
- **Shadows**: Different shadow levels for depth
- **Border Radius**: Consistent border radius values
- **Transitions**: Standard transition timings
- **Spacing**: Consistent spacing scale
- **Typography**: Font sizes and family
- **Layout**: Container widths and component heights

### 2. Base Styles (app.css)
- CSS reset and normalization
- Typography hierarchy
- Basic element styling
- Utility classes for common patterns

### 3. Components (components.css)
- **Buttons**: Primary, outline, and size variants
- **Cards**: Standard card components with hover effects
- **Forms**: Input fields, labels, and validation styles
- **Badges**: Status and category badges
- **Alerts**: Success, warning, error, and info alerts
- **Modals**: Modal dialog components
- **Tooltips**: Hover tooltip components
- **Loading Spinners**: Animated loading indicators

### 4. Layout (layout.css)
- **Header**: Navigation, logo, and search bar
- **Footer**: Links and copyright information
- **Main Content**: Content area styling
- **Grid Systems**: Responsive grid layouts
- **Responsive Design**: Mobile-first breakpoints

### 5. Page-Specific Styles
Each page has its own CSS file for unique styling needs:
- **welcome.css**: Hero sections, feature grids, benefits
- **contact.css**: Contact forms, social media icons, map placeholders
- **faq.css**: Accordion functionality, search, category tabs

## Usage Guidelines

### 1. CSS Variables
Always use CSS variables for:
- Colors: `var(--primary-color)`
- Spacing: `var(--spacing-md)`
- Typography: `var(--font-size-lg)`
- Shadows: `var(--shadow)`

### 2. Utility Classes
Use utility classes for common patterns:
- Spacing: `.mb-4`, `.py-6`, `.px-3`
- Display: `.d-flex`, `.d-grid`, `.text-center`
- Responsive: `.d-md-none`, `.text-md-center`

### 3. Component Classes
Use component classes for UI elements:
- Buttons: `.btn`, `.btn-outline`, `.btn-lg`
- Cards: `.card`, `.card-header`, `.card-body`
- Forms: `.form-group`, `.form-input`, `.form-label`

### 4. Page-Specific Styles
Include page-specific CSS using the `@push('styles')` directive:
```blade
@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/welcome.css') }}">
@endpush
```

## Responsive Design

The CSS follows a mobile-first approach with breakpoints:
- **Mobile**: Default styles (no media query)
- **Tablet**: `@media (max-width: 768px)`
- **Desktop**: `@media (max-width: 1024px)`
- **Large Desktop**: `@media (max-width: 1200px)`

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- CSS Grid and Flexbox support
- CSS Custom Properties (variables)
- CSS transitions and transforms

## Performance Considerations

- CSS files are organized to minimize specificity conflicts
- Variables reduce repetition and improve maintainability
- Component-based approach allows for better caching
- Page-specific styles are loaded only when needed

## Maintenance

- Keep CSS variables in sync across all files
- Use consistent naming conventions
- Document complex CSS patterns
- Test across different screen sizes and browsers
- Regularly review and refactor for optimization 
