#!/bin/bash

# Sync Assets Script
# This script copies CSS and JS files from resources to public directory

echo "🔄 Syncing assets from resources to public..."

# Create directories if they don't exist
mkdir -p public/css/pages
mkdir -p public/js

# Copy main CSS files
echo "📁 Copying main CSS files..."
cp resources/css/app.css public/css/
cp resources/css/components.css public/css/
cp resources/css/layout.css public/css/

# Copy page-specific CSS files
echo "📄 Copying page-specific CSS files..."
cp resources/css/pages/*.css public/css/pages/

# Copy JavaScript files
echo "⚡ Copying JavaScript files..."
cp resources/js/*.js public/js/

echo "✅ Assets synced successfully!"
echo "📂 Files copied:"
echo "   - public/css/app.css"
echo "   - public/css/components.css"
echo "   - public/css/layout.css"
echo "   - public/css/pages/*.css"
echo "   - public/js/*.js"
