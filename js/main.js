document.addEventListener('DOMContentLoaded', function() {
    // Hero Slider
    if (document.querySelector('.hero-swiper')) {
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            speed: 1000,
            effect: 'slide',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '"></span>';
                }
            },
            on: {
                init: function () {
                    // Update pagination on initialization
                    this.pagination.update();
                },
                slideChange: function () {
                    console.log('Hero Swiper slide changed');
                    // Find the currently visible hero video by checking offsetParent
                    const desktopVideo = document.querySelector('.hero-video-desktop, .hero-video.hero-retreats-video');
                    const mobileVideo = document.querySelector('.hero-video-mobile');
                    const visibleVideo = (mobileVideo && mobileVideo.offsetParent !== null) ? mobileVideo : desktopVideo;
                    console.log('Visible video element (offsetParent check):', visibleVideo);
                    const videoPauseBtn = document.querySelector('.video-pause-btn');
                    
                    if (visibleVideo && videoPauseBtn) {
                        console.log('Video and button found.');
                        console.log('Previous slide index:', this.previousIndex, 'Current slide index:', this.activeIndex);
                        // Reset video and button state when leaving video slide
                        if (this.previousIndex === 0 && this.activeIndex !== 0) { 
                            console.log('Slid away from video slide.');
                            if (!visibleVideo.paused) {
                                console.log('Video was playing, attempting to keep playing (Swiper might override)');
                                // visibleVideo.play(); // Re-enable if needed, but Swiper might pause it anyway
                            }
                            // The button state doesn't need resetting here as it reflects the video's state
                        }
                        // Pause video if sliding away from the video slide
                        if (this.activeIndex !== 0 && this.previousIndex === 0) {
                            console.log('Attempting to pause video due to slide change.');
                            visibleVideo.pause();
                            videoPauseBtn.classList.add('paused');
                        }
                    } else {
                        console.log('Visible video or pause button not found.');
                    }
                    
                    // Force pagination update after slide change
                    this.pagination.update();
                }
            }
        });

        // Video Pause/Play Button
        const videoPauseBtn = document.querySelector('.video-pause-btn');

        // Ensure button state matches initial video state AND try to play if paused on slide 0
        const checkInitialVideoState = () => {
            console.log('Checking initial video state.');
            // Find the currently visible hero video by checking offsetParent
            const desktopVideo = document.querySelector('.hero-video-desktop, .hero-video.hero-retreats-video');
            const mobileVideo = document.querySelector('.hero-video-mobile');
            const visibleVideo = (mobileVideo && mobileVideo.offsetParent !== null) ? mobileVideo : desktopVideo;

            console.log('Visible video for initial check (offsetParent check):', visibleVideo);

            if (visibleVideo && videoPauseBtn) {
                // Check if the video is paused AND we are on the first slide (realIndex accounts for loop)
                if (visibleVideo.paused && heroSwiper && heroSwiper.realIndex === 0) {
                    console.log('Initial state is paused on slide 0, attempting to play...');
                    // Attempt to play the video programmatically
                    visibleVideo.play().then(() => {
                        console.log('Autoplay successful via JS.');
                        videoPauseBtn.classList.remove('paused');
                        videoPauseBtn.setAttribute('aria-label', 'Pause video');
                    }).catch(error => {
                        console.error('Autoplay failed or was interrupted:', error);
                        // If play() fails, ensure the button reflects the paused state
                        videoPauseBtn.classList.add('paused');
                        videoPauseBtn.setAttribute('aria-label', 'Play video');
                    });
                } else if (visibleVideo.paused) {
                     console.log('Initial state is paused (or not on slide 0), updating button.');
                     videoPauseBtn.classList.add('paused');
                     videoPauseBtn.setAttribute('aria-label', 'Play video');
                } else {
                    console.log('Initial state is playing, updating button.');
                    videoPauseBtn.classList.remove('paused');
                    videoPauseBtn.setAttribute('aria-label', 'Pause video');
                }
            } else {
                 console.log('Visible video or pause button not found for initial check.');
            }
        };

        // Check after a short delay to allow video to attempt autoplay
        setTimeout(checkInitialVideoState, 500); 

        // Click handler for the pause button (should remain)
        if (videoPauseBtn) {
            videoPauseBtn.addEventListener('click', function() {
                console.log('Pause button clicked.');
                // Find the currently visible hero video by checking offsetParent
                const desktopVideo = document.querySelector('.hero-video-desktop, .hero-video.hero-retreats-video');
                const mobileVideo = document.querySelector('.hero-video-mobile');
                const visibleVideo = (mobileVideo && mobileVideo.offsetParent !== null) ? mobileVideo : desktopVideo;
                console.log('Visible video element on click (offsetParent check):', visibleVideo);
                if (visibleVideo) {
                    console.log('Video is currently paused:', visibleVideo.paused);
                    if (visibleVideo.paused) {
                        console.log('Attempting to play video.');
                        visibleVideo.play().catch(error => console.error('Play error:', error));
                        this.classList.remove('paused');
                        this.setAttribute('aria-label', 'Pause video');
                    } else {
                        console.log('Attempting to pause video.');
                        visibleVideo.pause();
                        this.classList.add('paused');
                        this.setAttribute('aria-label', 'Play video');
                    }
                } else {
                    console.log('Visible video not found on click.');
                }
            });
        }
    }

    // Initialize Choices.js for homepage select (if it exists)
    const homepageSelect = document.getElementById('homepage-category-select');
    if (homepageSelect && typeof Choices !== 'undefined') {
        new Choices(homepageSelect, {
            searchEnabled: false, // Common to disable search for simple selects
            itemSelectText: '',
            // Add any other specific Choices.js options for the homepage select here
        });
    }

    // Accommodations Slider
    if (document.querySelector('.accommodations-swiper')) {
        const accommodationsSwiper = new Swiper('.accommodations-swiper', {
            slidesPerView: 2.5,
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            speed: 600,
            allowTouchMove: false, // Disable touch by default
            touchRatio: 0, // Disable touch ratio by default
            touchAngle: 0, // Disable touch angle by default
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            mousewheel: false,
            keyboard: {
                enabled: true,
                onlyInViewport: true
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
                formatFractionCurrent: function(number) {
                    return number;
                },
                formatFractionTotal: function(number) {
                    return number;
                },
                renderFraction: function(currentClass, totalClass) {
                    return '<span class="' + currentClass + '"></span>' +
                           ' / ' +
                           '<span class="' + totalClass + '"></span>';
                }
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                    allowTouchMove: true,
                    touchRatio: 1,
                    touchAngle: 45,
                    touchStartPreventDefault: true,
                    touchStartForcePreventDefault: true,
                    touchMoveStopPropagation: true,
                    watchSlidesProgress: true,
                    preventInteractionOnTransition: true,
                    touchReleaseOnEdges: true,
                    touchRatio: 0.5,
                    resistance: true,
                    resistanceRatio: 0.85,
                    followFinger: false,
                    noSwiping: true,
                    noSwipingClass: 'swiper-slide-no-swiping',
                    touchStartThreshold: 5,
                    touchMoveStopPropagation: true,
                    preventClicks: true,
                    preventClicksPropagation: true,
                    slideToClickedSlide: false
                },
                768: {
                    slidesPerView: 1.5,
                    spaceBetween: 30,
                    allowTouchMove: true,
                    touchRatio: 1,
                    touchAngle: 45,
                    touchStartPreventDefault: true,
                    touchStartForcePreventDefault: true,
                    touchMoveStopPropagation: true,
                    watchSlidesProgress: true,
                    preventInteractionOnTransition: true,
                    touchReleaseOnEdges: true,
                    touchRatio: 0.5,
                    resistance: true,
                    resistanceRatio: 0.85,
                    followFinger: false,
                    noSwiping: true,
                    noSwipingClass: 'swiper-slide-no-swiping',
                    touchStartThreshold: 5,
                    touchMoveStopPropagation: true,
                    preventClicks: true,
                    preventClicksPropagation: true,
                    slideToClickedSlide: false
                },
                1024: {
                    slidesPerView: 2.5,
                    spaceBetween: 40,
                    allowTouchMove: false,
                    touchRatio: 0,
                    touchAngle: 0,
                    touchStartPreventDefault: true,
                    touchStartForcePreventDefault: true,
                    touchMoveStopPropagation: true,
                    watchSlidesProgress: true,
                    preventInteractionOnTransition: true
                },
                1440: {
                    slidesPerView: 3.5,
                    spaceBetween: 50,
                    allowTouchMove: false,
                    touchRatio: 0,
                    touchAngle: 0,
                    touchStartPreventDefault: true,
                    touchStartForcePreventDefault: true,
                    touchMoveStopPropagation: true,
                    watchSlidesProgress: true,
                    preventInteractionOnTransition: true
                }
            }
        });

        // Add custom touch handler for mobile
        if (window.innerWidth < 1024) {
            const swiperElement = document.querySelector('.accommodations-swiper');
            let touchStartX = 0;
            let touchEndX = 0;
            let isAnimating = false;

            swiperElement.addEventListener('touchstart', function(e) {
                touchStartX = e.touches[0].clientX;
                isAnimating = accommodationsSwiper.animating;
            }, { passive: true });

            swiperElement.addEventListener('touchend', function(e) {
                if (isAnimating) return;
                
                touchEndX = e.changedTouches[0].clientX;
                const diff = touchStartX - touchEndX;

                if (Math.abs(diff) > 50) { // Minimum swipe distance
                    if (diff > 0) {
                        accommodationsSwiper.slideNext();
                    } else {
                        accommodationsSwiper.slidePrev();
                    }
                }
            }, { passive: true });
        }

        // Add custom click handlers for navigation
        document.querySelector('.accommodations-swiper').addEventListener('click', function(e) {
            // Only proceed if clicking on the image area
            if (!e.target.closest('.accommodation-image')) return;

            const clickX = e.clientX;
            const swiperRect = this.getBoundingClientRect();
            const swiperCenter = swiperRect.left + (swiperRect.width / 2);

            // Prevent rapid clicking
            if (accommodationsSwiper.animating) return;

            // Left side triggers previous, right side triggers next
            if (clickX < swiperCenter) {
                accommodationsSwiper.slidePrev();
            } else if (clickX > swiperCenter) {
                accommodationsSwiper.slideNext();
            }
        });

        // Add keyboard navigation with debounce
        let lastKeyPress = 0;
        const keyDebounceTime = 600; // Match the slider speed

        document.addEventListener('keydown', function(e) {
            const now = Date.now();
            if (accommodationsSwiper.animating || (now - lastKeyPress) < keyDebounceTime) return;

            if (e.key === 'ArrowLeft') {
                accommodationsSwiper.slidePrev();
                lastKeyPress = now;
            } else if (e.key === 'ArrowRight') {
                accommodationsSwiper.slideNext();
                lastKeyPress = now;
            }
        });

        // Add touch event prevention for desktop
        if (window.innerWidth >= 1024) {
            const swiperElement = document.querySelector('.accommodations-swiper');
            swiperElement.addEventListener('touchstart', function(e) {
                e.preventDefault();
            }, { passive: false });
        }
    }

    // Initialize Choices.js for select elements within .reviews-filters (if they exist)
    const reviewsFiltersContainer = document.querySelector('.reviews-filters');
    if (reviewsFiltersContainer && typeof Choices !== 'undefined') {
        const reviewSelects = reviewsFiltersContainer.querySelectorAll('select');
        reviewSelects.forEach(selectElement => {
            new Choices(selectElement, {
                searchEnabled: false, // Typically false for filter dropdowns
                itemSelectText: '',
                // Add any other specific Choices.js options for review filters here
            });
        });
    }

    // Facilities Navigation
    const facilitiesGrid = document.querySelector('.facilities-grid');
    const prevBtn = document.querySelector('.nav-prev');
    const nextBtn = document.querySelector('.nav-next');

    if (facilitiesGrid && prevBtn && nextBtn) {
        const scrollAmount = facilitiesGrid.offsetWidth * 0.8;

        prevBtn.addEventListener('click', () => {
            facilitiesGrid.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        nextBtn.addEventListener('click', () => {
            facilitiesGrid.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });

        // Hide/show navigation buttons based on scroll position
        facilitiesGrid.addEventListener('scroll', () => {
            const isStart = facilitiesGrid.scrollLeft === 0;
            const isEnd = facilitiesGrid.scrollLeft + facilitiesGrid.offsetWidth >= facilitiesGrid.scrollWidth - 10;

            prevBtn.style.opacity = isStart ? '0.5' : '1';
            nextBtn.style.opacity = isEnd ? '0.5' : '1';
            prevBtn.style.pointerEvents = isStart ? 'none' : 'auto';
            nextBtn.style.pointerEvents = isEnd ? 'none' : 'auto';
        });

        // Initial button state
        prevBtn.style.opacity = '0.5';
        prevBtn.style.pointerEvents = 'none';
    }

    // Mobile menu functionality
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    const mobileMenu = document.querySelector('.mobile-menu');
    const body = document.body;

    function toggleMobileMenu(event) {
        if (event) {
            event.stopPropagation();
            event.preventDefault();
        }
        mobileMenu.classList.toggle('active');
        mobileMenuToggle.classList.toggle('active');
        body.classList.toggle('mobile-menu-open');
    }

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function(event) {
            toggleMobileMenu(event);
        });
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', toggleMobileMenu);
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (mobileMenu.classList.contains('active') && 
            !mobileMenu.contains(event.target) && 
            !mobileMenuToggle.contains(event.target)) {
            toggleMobileMenu();
        }
    });

    // Prevent clicks inside mobile menu from closing it
    mobileMenu.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Close mobile menu on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992 && mobileMenu.classList.contains('active')) {
            toggleMobileMenu();
        }
    });

    // Header scroll behavior
    const header = document.getElementById('site-header');
    const scrollThreshold = 50;

    window.addEventListener('scroll', function() {
        if (window.scrollY > scrollThreshold) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Location Popup Functionality
    const locationPopup = document.querySelector('.location-popup');
    const locationLinks = document.querySelectorAll('.location-link, .sticky-location, .location-link-text');
    const desktopCloseBtn = document.querySelector('.desktop-close');
    const mobileCloseBtn = document.querySelector('.mobile-close-btn');

    // Function to handle popup
    function togglePopup(show = true) {
        if (show) {
            locationPopup.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        } else {
            locationPopup.classList.remove('active');
            document.body.style.overflow = ''; // Restore scrolling
        }
    }

    // Event listeners for opening popup
    locationLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            togglePopup(true);
        });
    });

    // Close popup when clicking close buttons
    if (desktopCloseBtn) {
        desktopCloseBtn.addEventListener('click', () => {
            togglePopup(false);
        });
    }

    if (mobileCloseBtn) {
        mobileCloseBtn.addEventListener('click', () => {
            togglePopup(false);
        });
    }

    // Close popup when clicking outside
    locationPopup.addEventListener('click', (e) => {
        if (e.target === locationPopup) {
            togglePopup(false);
        }
    });

    // Close popup with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && locationPopup.classList.contains('active')) {
            togglePopup(false);
        }
    });

    // Language Menu Functionality
    const langMenuItems = document.querySelectorAll('.lang-selector .language-menu > li > a');
    
    langMenuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const parentLi = this.parentElement;
            
            // Close all other open menus
            document.querySelectorAll('.lang-selector .language-menu > li').forEach(li => {
                if (li !== parentLi) {
                    li.classList.remove('menu-open');
                }
            });
            
            // Toggle current menu
            parentLi.classList.toggle('menu-open');
            
            // Close menu when clicking outside
            const closeMenu = (event) => {
                if (!parentLi.contains(event.target)) {
                    parentLi.classList.remove('menu-open');
                    document.removeEventListener('click', closeMenu);
                }
            };
            
            // Add click outside listener
            setTimeout(() => {
                document.addEventListener('click', closeMenu);
            }, 0);
        });
    });

    // About Slider
    const aboutSwiper = new Swiper('.about-swiper', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 80,
        loop: true,
        loopedSlides: 6,
        speed: 1000,
        grabCursor: true,
        touchRatio: 1,
        touchAngle: 45,
        allowTouchMove: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1.2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 'auto',
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 'auto',
                spaceBetween: 50,
            }
        },
        on: {
            init: function() {
                // Add click handlers for slides
                const slides = document.querySelectorAll('.about-swiper .swiper-slide');
                slides.forEach((slide) => {
                    slide.addEventListener('click', function(e) {
                        if (!this.classList.contains('swiper-slide-active')) {
                            const isNext = this.classList.contains('swiper-slide-next');
                            if (isNext) {
                                aboutSwiper.slideNext();
                            } else if (this.classList.contains('swiper-slide-prev')) {
                                aboutSwiper.slidePrev();
                            }
                        }
                    });
                });
            },
            slideChange: function () {
                // Update active description
                document.querySelectorAll('.slide-description').forEach(desc => {
                    desc.classList.remove('active');
                });
                const realIndex = this.realIndex; // Removed modulo operation to handle all slides
                document.querySelector(`.slide-description[data-slide="${realIndex}"]`).classList.add('active');
            }
        }
    });

    // Reviews Popup Functionality
    const reviewsPopup = document.querySelector('.reviews-popup');
    const readReviewsBtn = document.querySelector('.read-reviews-btn');
    const closeReviewsBtn = reviewsPopup?.querySelector('.close-popup');

    function toggleReviewsPopup(show = true) {
        if (!reviewsPopup) return;
        
        if (show) {
            reviewsPopup.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
            // Small delay to ensure the display:flex is applied before the transform
            setTimeout(() => {
                reviewsPopup.style.opacity = '1';
            }, 10);
        } else {
            reviewsPopup.style.opacity = '0';
            reviewsPopup.querySelector('.reviews-popup-content').style.transform = 'translateY(100%)';
            setTimeout(() => {
                reviewsPopup.classList.remove('active');
                document.body.style.overflow = ''; // Restore scrolling
                // Reset transform for next opening
                reviewsPopup.querySelector('.reviews-popup-content').style.transform = '';
            }, 300); // Match the transition duration
        }
    }

    if (readReviewsBtn) {
        readReviewsBtn.addEventListener('click', (e) => {
            e.preventDefault();
            toggleReviewsPopup(true);
        });
    }

    if (closeReviewsBtn) {
        closeReviewsBtn.addEventListener('click', () => {
            toggleReviewsPopup(false);
        });
    }

    if (reviewsPopup) {
        // Close popup when clicking outside
        reviewsPopup.addEventListener('click', (e) => {
            if (e.target === reviewsPopup) {
                toggleReviewsPopup(false);
            }
        });

        // Close popup with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && reviewsPopup.classList.contains('active')) {
                toggleReviewsPopup(false);
            }
        });

        // Reviews filtering functionality
        const travelerTypeFilter = reviewsPopup.querySelector('.traveler-type-filter');
        const reviewItems = reviewsPopup.querySelectorAll('.review-item');

        if (travelerTypeFilter) {
            travelerTypeFilter.addEventListener('change', function() {
                const selectedType = this.value;
                
                reviewItems.forEach(item => {
                    if (selectedType === 'all' || item.dataset.travelerType === selectedType) {
                        item.style.display = '';
                        // Fade in animation
                        item.style.opacity = '0';
                        setTimeout(() => {
                            item.style.opacity = '1';
                        }, 10);
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }
    }

    // Room Gallery Slider
    if (document.querySelector('.gallery-slider')) {
        const gallerySlider = new Swiper('.gallery-slider', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 20,
            loop: true,
            speed: 800,
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 2.5,
                    spaceBetween: 40,
                }
            },
            on: {
                init: function() {
                    const slider = this;
                    const slides = slider.slides.length;
                    
                    // Special handling for 2 images
                    if (slides === 2) {
                        slider.params.slidesPerView = 2;
                        slider.params.centeredSlides = false;
                        slider.params.loop = false;
                        slider.update();
                    }
                }
            }
        });
    }

    // Room Amenities Accordion
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const plusIcon = this.querySelector('.plus-icon');
            
            // Close all other accordion items
            document.querySelectorAll('.accordion-content').forEach(item => {
                if (item !== content) {
                    item.classList.remove('active');
                    item.previousElementSibling.querySelector('.plus-icon').textContent = '+';
                }
            });
            
            // Toggle current accordion item
            content.classList.toggle('active');
            plusIcon.textContent = content.classList.contains('active') ? '−' : '+';
        });
    });

    // Amenities Dropdown
    const amenitiesTitles = document.querySelectorAll('.amenities-title');
    
    amenitiesTitles.forEach(title => {
        title.addEventListener('click', function() {
            const list = this.nextElementSibling;
            const isActive = this.classList.contains('active');
            
            // Close all other dropdowns
            amenitiesTitles.forEach(otherTitle => {
                if (otherTitle !== this) {
                    otherTitle.classList.remove('active');
                    otherTitle.nextElementSibling.classList.remove('active');
                }
            });
            
            // Toggle current dropdown
            this.classList.toggle('active');
            list.classList.toggle('active');
            
            // Ensure proper height for animation
            if (!isActive) {
                list.style.maxHeight = list.scrollHeight + "px";
            } else {
                list.style.maxHeight = null;
            }
        });
    });

    // Jobs Functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const jobItems = document.querySelectorAll('.job-item');
    const filterCount = document.querySelector('.filter-count');
    const resetBtn = document.querySelector('.reset-filters');
    const jobPopup = document.querySelector('.job-popup');
    const closeJobPopupBtn = jobPopup?.querySelector('.close-popup');
    const infoBtns = document.querySelectorAll('.info-btn');
    
    let activeFilters = {
        category: [],
        type: []
    };

    function updateJobs() {
        const hasActiveFilters = activeFilters.category.length > 0 || activeFilters.type.length > 0;
        
        jobItems.forEach(job => {
            const categories = job.dataset.categories.split(',');
            const types = job.dataset.types.split(',');
            
            const matchesCategory = activeFilters.category.length === 0 || 
                                  activeFilters.category.some(cat => categories.includes(cat));
            const matchesType = activeFilters.type.length === 0 || 
                              activeFilters.type.some(type => types.includes(type));
            
            job.style.display = (!hasActiveFilters || (matchesCategory && matchesType)) ? '' : 'none';
        });

        const totalActiveFilters = activeFilters.category.length + activeFilters.type.length;
        filterCount.textContent = totalActiveFilters;
    }

    if (filterBtns.length) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const filterType = btn.dataset.filter;
                const value = btn.dataset.value;
                
                btn.classList.toggle('active');
                
                if (btn.classList.contains('active')) {
                    activeFilters[filterType].push(value);
                } else {
                    activeFilters[filterType] = activeFilters[filterType].filter(v => v !== value);
                }
                
                updateJobs();
            });
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            filterBtns.forEach(btn => btn.classList.remove('active'));
            activeFilters.category = [];
            activeFilters.type = [];
            updateJobs();
        });
    }

    // Job Popup Functionality
    function toggleJobPopup(show = true) {
        if (!jobPopup) return;
        
        if (show) {
            jobPopup.classList.add('active');
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                jobPopup.style.opacity = '1';
            }, 10);
        } else {
            jobPopup.style.opacity = '0';
            jobPopup.querySelector('.reviews-popup-content').style.transform = 'translateY(100%)';
            setTimeout(() => {
                jobPopup.classList.remove('active');
                document.body.style.overflow = '';
                jobPopup.querySelector('.reviews-popup-content').style.transform = '';
            }, 300);
        }
    }

    if (infoBtns.length) {
        infoBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const jobTitle = this.dataset.jobTitle;
                const jobDescription = this.dataset.jobDescription;
                
                jobPopup.querySelector('.popup-title').textContent = jobTitle;
                jobPopup.querySelector('.job-description').innerHTML = jobDescription || 'No job description available.';
                toggleJobPopup(true);
            });
        });
    }

    if (closeJobPopupBtn) {
        closeJobPopupBtn.addEventListener('click', () => {
            toggleJobPopup(false);
        });
    }

    if (jobPopup) {
        jobPopup.addEventListener('click', (e) => {
            if (e.target === jobPopup) {
                toggleJobPopup(false);
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && jobPopup.classList.contains('active')) {
                toggleJobPopup(false);
            }
        });
    }
});

// Casino Services
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.casino-services__header');
    const video = document.querySelector('.casino-services__media');
    
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Initial state
    header.style.opacity = '0';
    header.style.transform = 'translateY(40px)';
    header.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

    video.style.opacity = '0';
    video.style.transform = 'translateY(40px)';
    video.style.transition = 'opacity 0.6s ease 0.3s, transform 0.6s ease 0.3s';

    // Observe elements
    observer.observe(header);
    observer.observe(video);
});

// Jobs Grid
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const resetBtn = document.querySelector('.reset-filters');
    const filterCount = document.querySelector('.filter-count');
    const modal = document.getElementById('jobModal');
    const modalClose = modal.querySelector('.modal-close');
    const modalJobTitle = document.getElementById('modalJobTitle');
    const modalJobDescription = document.getElementById('modalJobDescription');
    
    let activeFilters = new Set();
    
    // Filter functionality
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            if (this.classList.contains('active')) {
                this.classList.remove('active');
                activeFilters.delete(filter);
            } else {
                this.classList.add('active');
                activeFilters.add(filter);
            }
            
            filterCount.textContent = activeFilters.size;
            filterJobs();
        });
    });
    
    // Reset filters
    resetBtn.addEventListener('click', function() {
        filterBtns.forEach(btn => btn.classList.remove('active'));
        activeFilters.clear();
        filterCount.textContent = '0';
        filterJobs();
    });
    
    function filterJobs() {
        const rows = document.querySelectorAll('.table-row');
        
        if (activeFilters.size === 0) {
            rows.forEach(row => row.style.display = '');
            return;
        }
        
        rows.forEach(row => {
            const hasMatchingFilter = Array.from(activeFilters).some(filter => 
                row.classList.contains(filter)
            );
            row.style.display = hasMatchingFilter ? '' : 'none';
        });
    }
    
    // Modal functionality
    document.querySelectorAll('.info-btn').forEach(button => {
        button.addEventListener('click', async function() {
            const jobId = this.getAttribute('data-job-id');
            const jobTitle = this.getAttribute('data-job-title');
            
            // Fetch job description
            try {
                const response = await fetch(`/wp-json/wp/v2/job/${jobId}`);
                const jobData = await response.json();
                
                modalJobTitle.textContent = jobTitle;
                modalJobDescription.innerHTML = jobData.content.rendered;
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            } catch (error) {
                console.error('Error fetching job description:', error);
            }
        });
    });
    
    modalClose.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
});

// Job Modal
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const jobItems = document.querySelectorAll('.job-item');
    const filterCount = document.querySelector('.filter-count');
    const resetBtn = document.querySelector('.reset-filters');
    
    let activeFilters = {
        category: [],
        type: []
    };

    function updateJobs() {
        const hasActiveFilters = activeFilters.category.length > 0 || activeFilters.type.length > 0;
        
        jobItems.forEach(job => {
            const categories = job.dataset.categories.split(',');
            const types = job.dataset.types.split(',');
            
            const matchesCategory = activeFilters.category.length === 0 || 
                                  activeFilters.category.some(cat => categories.includes(cat));
            const matchesType = activeFilters.type.length === 0 || 
                              activeFilters.type.some(type => types.includes(type));
            
            job.style.display = (!hasActiveFilters || (matchesCategory && matchesType)) ? '' : 'none';
        });

        const totalActiveFilters = activeFilters.category.length + activeFilters.type.length;
        filterCount.textContent = totalActiveFilters;
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filterType = btn.dataset.filter;
            const value = btn.dataset.value;
            
            btn.classList.toggle('active');
            
            if (btn.classList.contains('active')) {
                activeFilters[filterType].push(value);
            } else {
                activeFilters[filterType] = activeFilters[filterType].filter(v => v !== value);
            }
            
            updateJobs();
        });
    });

    resetBtn.addEventListener('click', () => {
        filterBtns.forEach(btn => btn.classList.remove('active'));
        activeFilters.category = [];
        activeFilters.type = [];
        updateJobs();
    });
});