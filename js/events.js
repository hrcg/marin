/**
 * Events Page JavaScript
 * Handles filtering, search, and FAQ accordion functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all functionality
    initEventFiltering();
    initFAQAccordion();
    
    /**
     * Initialize Event Filtering Functionality
     */
    function initEventFiltering() {
        const searchInput = document.getElementById('events-search');
        const categorySelect = document.getElementById('events-category');
        const fromDateInput = document.getElementById('events-from-date');
        const untilDateInput = document.getElementById('events-until-date');
        const filterButton = document.getElementById('filter-events-btn');
        const eventsContainer = document.getElementById('events-container');
        const loadingIndicator = document.getElementById('events-loading');
        const noEventsMessage = document.getElementById('no-events-message');
        
        if (!eventsContainer) return;
        
        // Initialize Choices.js for category select
        if (categorySelect && typeof Choices !== 'undefined') {
            new Choices(categorySelect, {
                searchEnabled: false, // Disable search if you don't need it
                itemSelectText: '', // Remove the "Press to select" text
                // Add any other Choices.js options here
            });
        }
        
        // Initialize Flatpickr for date inputs
        if (typeof flatpickr !== 'undefined') {
            if (fromDateInput) {
                flatpickr(fromDateInput, {
                    dateFormat: "Y-m-d", // ISO format, matches your existing logic
                    altInput: true, // Show a human-friendly date format to the user
                    altFormat: "F j, Y", // Example: June 1, 2024
                    minDate: "today",
                    placeholder: fromDateInput.dataset.placeholder || "From Date", // Use data attribute
                    onChange: function(selectedDates, dateStr, instance) {
                        // If untilDateInput exists and its current date is before fromDateInput
                        if (untilDateInput._flatpickr && selectedDates[0] > untilDateInput._flatpickr.selectedDates[0]) {
                            untilDateInput._flatpickr.setDate(selectedDates[0]);
                        }
                        // Optionally, set minDate for untilDateInput
                        if (untilDateInput._flatpickr) {
                            untilDateInput._flatpickr.set('minDate', selectedDates[0]);
                        }
                    }
                });
            }
            if (untilDateInput) {
                flatpickr(untilDateInput, {
                    dateFormat: "Y-m-d",
                    altInput: true,
                    altFormat: "F j, Y",
                    minDate: "today",
                    placeholder: untilDateInput.dataset.placeholder || "Until Date", // Use data attribute
                    onChange: function(selectedDates, dateStr, instance) {
                        // If fromDateInput exists and its current date is after untilDateInput
                        if (fromDateInput._flatpickr && selectedDates[0] < fromDateInput._flatpickr.selectedDates[0]) {
                            fromDateInput._flatpickr.setDate(selectedDates[0]);
                        }
                    }
                });
            }
        }
        
        // Get all event items
        const eventItems = eventsContainer.querySelectorAll('.event-item');
        const originalEvents = Array.from(eventItems);
        
        // Store original events for reset
        let allEvents = originalEvents.slice();
        
        /**
         * Filter events based on current criteria
         */
        function filterEvents() {
            const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
            const selectedCategory = categorySelect ? categorySelect.value : '';
            const fromDate = fromDateInput ? fromDateInput.value : '';
            const untilDate = untilDateInput ? untilDateInput.value : '';
            
            // Show loading indicator
            showLoading(true);
            
            // Filter events with a slight delay to show loading
            setTimeout(() => {
                const filteredEvents = allEvents.filter(event => {
                    return matchesSearchCriteria(event, searchTerm, selectedCategory, fromDate, untilDate);
                });
                
                displayFilteredEvents(filteredEvents);
                showLoading(false);
            }, 300);
        }
        
        /**
         * Check if event matches search criteria
         */
        function matchesSearchCriteria(event, searchTerm, category, fromDate, untilDate) {
            // Search term matching
            if (searchTerm) {
                const title = event.dataset.title ? event.dataset.title.toLowerCase() : '';
                const description = event.dataset.description ? event.dataset.description.toLowerCase() : '';
                
                if (!title.includes(searchTerm) && !description.includes(searchTerm)) {
                    return false;
                }
            }
            
            // Category matching
            if (category) {
                const eventCategories = event.dataset.categories ? event.dataset.categories.split(',') : [];
                if (!eventCategories.includes(category)) {
                    return false;
                }
            }
            
            // Date range matching
            const eventDate = event.dataset.date;
            if (eventDate) {
                if (fromDate && eventDate < fromDate) {
                    return false;
                }
                if (untilDate && eventDate > untilDate) {
                    return false;
                }
            }
            
            return true;
        }
        
        /**
         * Display filtered events
         */
        function displayFilteredEvents(filteredEvents) {
            // Clear current events
            eventsContainer.innerHTML = '';
            
            if (filteredEvents.length === 0) {
                showNoEventsMessage(true);
                return;
            }
            
            // Show filtered events with animation
            filteredEvents.forEach((event, index) => {
                const eventClone = event.cloneNode(true);
                eventClone.style.opacity = '0';
                eventClone.style.transform = 'translateY(20px)';
                eventsContainer.appendChild(eventClone);
                
                // Animate in
                setTimeout(() => {
                    eventClone.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    eventClone.style.opacity = '1';
                    eventClone.style.transform = 'translateY(0)';
                }, index * 100);
            });
            
            showNoEventsMessage(false);
        }
        
        /**
         * Reset filters and show all events
         */
        function resetFilters() {
            if (searchInput) searchInput.value = '';
            if (categorySelect) categorySelect.value = '';
            if (fromDateInput) fromDateInput.value = '';
            if (untilDateInput) untilDateInput.value = '';
            
            displayFilteredEvents(allEvents);
        }
        
        /**
         * Show/hide loading indicator
         */
        function showLoading(show) {
            if (loadingIndicator) {
                loadingIndicator.style.display = show ? 'block' : 'none';
            }
        }
        
        /**
         * Show/hide no events message
         */
        function showNoEventsMessage(show) {
            if (noEventsMessage) {
                noEventsMessage.style.display = show ? 'block' : 'none';
            }
        }
        
        /**
         * Debounce function for search input
         */
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }
        
        // Event listeners
        if (searchInput) {
            searchInput.addEventListener('input', debounce(filterEvents, 300));
        }
        
        if (categorySelect) {
            categorySelect.addEventListener('change', filterEvents);
        }
        
        if (fromDateInput) {
            fromDateInput.addEventListener('change', filterEvents);
        }
        
        if (untilDateInput) {
            untilDateInput.addEventListener('change', filterEvents);
        }
        
        if (filterButton) {
            filterButton.addEventListener('click', function(e) {
                e.preventDefault();
                filterEvents();
            });
        }
        
        // Add reset functionality (double-click filter button)
        if (filterButton) {
            let clickCount = 0;
            filterButton.addEventListener('click', function() {
                clickCount++;
                setTimeout(() => {
                    if (clickCount === 2) {
                        resetFilters();
                    }
                    clickCount = 0;
                }, 300);
            });
        }
        
        // Add clear search functionality (Escape key)
        if (searchInput) {
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    resetFilters();
                }
            });
        }
    }
    
    /**
     * Initialize FAQ Accordion Functionality
     */
    function initFAQAccordion() {
        const faqItems = document.querySelectorAll('.faq-right-column .faq-item'); // Target items within the right column

        faqItems.forEach(item => {
            const questionButton = item.querySelector('.faq-question');
            const answerPanel = item.querySelector('.faq-answer');
            // const answerId = answerPanel ? answerPanel.id : null; // Already have this in aria-controls

            if (!questionButton || !answerPanel) return;

            questionButton.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';

                // Close all other FAQ items in the same group
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        const otherQuestion = otherItem.querySelector('.faq-question');
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        if (otherQuestion && otherAnswer) {
                            otherQuestion.setAttribute('aria-expanded', 'false');
                            otherQuestion.classList.remove('active');
                            otherAnswer.hidden = true;
                            otherAnswer.classList.remove('active'); // If you still use .active for CSS state
                        }
                    }
                });

                // Toggle current FAQ item
                if (isExpanded) {
                    this.setAttribute('aria-expanded', 'false');
                    this.classList.remove('active');
                    answerPanel.hidden = true;
                    answerPanel.classList.remove('active');
                } else {
                    this.setAttribute('aria-expanded', 'true');
                    this.classList.add('active');
                    answerPanel.hidden = false;
                    answerPanel.classList.add('active');
                    
                    // Optional: Smooth scroll to the opened FAQ if desired
                    setTimeout(() => {
                        item.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }, 150); // Adjust delay as needed for animation
                }
            });

            // Keyboard accessibility for FAQs (remains the same)
            questionButton.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        });
    }
    
    /**
     * Enhanced Event Interactions
     */
    function initEventInteractions() {
        const eventItems = document.querySelectorAll('.event-item');
        
        eventItems.forEach(event => {
            // Add hover effects for featured events
            if (event.classList.contains('featured-event')) {
                event.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                event.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(-5px) scale(1)';
                });
            }
            
            // Add click analytics (if you want to track event interactions)
            const reserveBtn = event.querySelector('.reserve-btn');
            if (reserveBtn) {
                reserveBtn.addEventListener('click', function() {
                    // You can add analytics tracking here
                    console.log('Reserve button clicked for event:', event.dataset.eventId);
                });
            }
        });
    }
    
    /**
     * Advanced Search Features
     */
    function initAdvancedSearch() {
        const searchInput = document.getElementById('events-search');
        if (!searchInput) return;
        
        // Add search suggestions/autocomplete functionality
        const searchSuggestions = document.createElement('div');
        searchSuggestions.className = 'search-suggestions';
        searchSuggestions.style.cssText = `
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 2px solid var(--border-color);
            border-top: none;
            border-radius: 0 0 8px 8px;
            box-shadow: var(--shadow);
            max-height: 200px;
            overflow-y: auto;
            z-index: 100;
            display: none;
        `;
        
        searchInput.parentNode.style.position = 'relative';
        searchInput.parentNode.appendChild(searchSuggestions);
        
        // Get all event titles for suggestions
        const eventTitles = Array.from(document.querySelectorAll('.event-title')).map(title => title.textContent.trim());
        const uniqueTitles = [...new Set(eventTitles)];
        
        searchInput.addEventListener('input', function() {
            const value = this.value.toLowerCase().trim();
            
            if (value.length < 2) {
                searchSuggestions.style.display = 'none';
                return;
            }
            
            const matches = uniqueTitles.filter(title => 
                title.toLowerCase().includes(value)
            ).slice(0, 5);
            
            if (matches.length > 0) {
                searchSuggestions.innerHTML = matches.map(title => 
                    `<div class="search-suggestion" style="padding: 10px 15px; cursor: pointer; border-bottom: 1px solid var(--border-color);">${title}</div>`
                ).join('');
                searchSuggestions.style.display = 'block';
                
                // Add click handlers to suggestions
                searchSuggestions.querySelectorAll('.search-suggestion').forEach(suggestion => {
                    suggestion.addEventListener('click', function() {
                        searchInput.value = this.textContent;
                        searchSuggestions.style.display = 'none';
                        // Trigger search
                        searchInput.dispatchEvent(new Event('input'));
                    });
                });
            } else {
                searchSuggestions.style.display = 'none';
            }
        });
        
        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.parentNode.contains(e.target)) {
                searchSuggestions.style.display = 'none';
            }
        });
    }
    
    // Initialize additional functionality
    initEventInteractions();
    
    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        
        .search-suggestion:hover {
            background: var(--background-light) !important;
        }
    `;
    document.head.appendChild(style);
    
    console.log('Events page JavaScript initialized successfully');
}); 