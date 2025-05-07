<?php
/**
 * Rooms Section Template
 */
?>

<section class="rooms-section">
    <div class="container">
        <div class="rooms-categories">
            <ul class="category-list">
                <li class="category-item">
                    <a href="#" class="category-link active" data-category="all">
                        VIEW ALL <span class="count">(0)</span>
                    </a>
                </li>
                <li class="category-item">
                    <a href="#" class="category-link" data-category="deluxe">
                        DELUXE ROOMS & SUITES <span class="count">(0)</span>
                    </a>
                </li>
                <li class="category-item">
                    <a href="#" class="category-link" data-category="family">
                        FAMILY SUITES <span class="count">(0)</span>
                    </a>
                </li>
                <li class="category-item">
                    <a href="#" class="category-link" data-category="junior">
                        JUNIOR SUITES <span class="count">(0)</span>
                    </a>
                </li>
                <li class="category-item">
                    <a href="#" class="category-link" data-category="superior">
                        SUPERIOR ROOMS & SUITES <span class="count">(0)</span>
                    </a>
                </li>
            </ul>
            
        <div class="rooms-header desktop-only">
            <div class="view-toggle">
                <button class="toggle-btn grid-view active" data-view="grid">
                    <i class="fas fa-th-large"></i>
                    <span>Grid View</span>
                </button>
                <button class="toggle-btn list-view" data-view="list">
                    <i class="fas fa-list"></i>
                    <span>List View</span>
                </button>
            </div>
        </div>
        </div>
        

        <!-- Category Descriptions -->
        <div class="category-descriptions">
            <div class="category-description" data-category="deluxe">
                <h2 class="category-title">DELUXE ROOMS & SUITES</h2>
                <p class="category-text">Experience refined luxury in our Deluxe accommodations, featuring elegant Full View and Suite options. Each room is thoughtfully designed with premium amenities and sophisticated décor, offering the perfect blend of comfort and style.</p>
            </div>
            <div class="category-description" data-category="family">
                <h2 class="category-title">FAMILY SUITES</h2>
                <p class="category-text">Our spacious Family Suites are designed for memorable family stays, offering generous living spaces and thoughtful amenities. Choose from our Family Junior Suite, Family Junior Suite Deluxe, or Family Suite options to best suit your needs.</p>
            </div>
            <div class="category-description" data-category="junior">
                <h2 class="category-title">JUNIOR SUITES</h2>
                <p class="category-text">Discover elevated comfort in our Junior Suites collection, including classic Junior Suites and exclusive Junior Suite Deluxe options. These sophisticated spaces offer enhanced amenities and elegant living areas for a truly refined stay.</p>
            </div>
            <div class="category-description" data-category="superior">
                <h2 class="category-title">SUPERIOR ROOMS & SUITES</h2>
                <p class="category-text">Our Superior collection offers unparalleled luxury with stunning Sea Views, Pool Views, and exclusive Pool and Sea View combinations. These premium accommodations provide the ultimate resort experience with exceptional panoramic vistas.</p>
            </div>
        </div>

        <div class="rooms-grid view-grid">
            <!-- Deluxe Rooms & Suites -->
            <div class="room-item" data-category="deluxe">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/ML0A2303e.webp" alt="DELUXE FULL VIEW at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/ML0A2315e.webp" alt="DELUXE FULL VIEW at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">DELUXE FULL VIEW</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed or twin beds</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>32 m² (344 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 1 child</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/rooms/deluxe-full-view/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <div class="room-item" data-category="deluxe">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/bath-deluxe.webp" alt="Deluxe Suite at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/ML0A4051e.webp" alt="Deluxe Suite at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">Deluxe Suite</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed + living area</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>45 m² (484 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 2 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/deluxe-suite/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <!-- Family Suites -->
            <div class="room-item" data-category="family">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fjsd2.webp" alt="FAMILY JUNIOR SUITE DELUXE at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fjsd1.webp" alt="FAMILY JUNIOR SUITE DELUXE at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">FAMILY JUNIOR SUITE DELUXE</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed + 2 sofa beds</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>58 m² (624 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 3 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/family-junior-suite-deluxe/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <div class="room-item" data-category="family">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fjss1.webp" alt="FAMILY JUNIOR SUITE STANDARD at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fjss2.webp" alt="FAMILY JUNIOR SUITE STANDARD at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">FAMILY JUNIOR SUITE STANDARD</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed + 2 sofa beds</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>52 m² (560 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 2 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/family-junior-suite-standard/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <div class="room-item" data-category="family">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fsd1.webp" alt="FAMILY SUITE DELUXE at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fsd2.webp" alt="FAMILY SUITE DELUXE at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">FAMILY SUITE DELUXE</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>2 bedrooms + living room</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>75 m² (807 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>4 adults, 2 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/family-suite-deluxe/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <div class="room-item" data-category="family">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fss1.webp" alt="FAMILY SUITE STANDARD at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/fss2.webp" alt="FAMILY SUITE STANDARD at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">FAMILY SUITE STANDARD</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>2 bedrooms (1 king + 2 twin beds)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>65 m² (700 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>4 adults or 2 adults, 3 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/family-suite-standard/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <!-- Junior Suites -->
            <div class="room-item" data-category="junior">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/js.webp" alt="Junior Suite at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/js2.webp" alt="Junior Suite at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">Junior Suite</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed + living area</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>42 m² (452 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 1 child</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/junior-suite/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <div class="room-item" data-category="junior">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/jsd.webp" alt="Junior Suite Deluxe at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/jsd2.webp" alt="Junior Suite Deluxe at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">Junior Suite Deluxe</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed + living area</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>48 m² (517 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>3 adults or 2 adults, 2 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/junior-suite-deluxe/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <!-- Pool View -->
            <div class="room-item" data-category="superior">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/pool.webp" alt="Pool View at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/pool2.webp" alt="Pool View at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">Pool View</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed or twin beds</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>35 m² (377 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 1 child</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/pool-view/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <!-- Suite Standard -->
            <div class="room-item" data-category="deluxe">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/ss.webp" alt="SUITE STANDARD at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/ss2.webp" alt="SUITE STANDARD at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">SUITE STANDARD</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed + living area</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>45 m² (484 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>3 adults or 2 adults, 2 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/suite-standard/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <!-- Super Suite -->
            <div class="room-item" data-category="deluxe">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/super.webp" alt="Super Suite at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/super2.webp" alt="Super Suite at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">Super Suite</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>2 bedrooms + living room</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>85 m² (915 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>4 adults, 2 children</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/super-suite/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <!-- Superior Rooms -->
            <div class="room-item" data-category="superior">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/back.webp" alt="Superior Back View at Marina Bay Resort">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/back2.webp" alt="Superior Back View at Marina Bay Resort">
                                </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">Superior Back View</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed or twin beds</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>35 m² (377 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 1 child</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/superior-back-view/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <div class="room-item" data-category="superior">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/superior-pool.webp" alt="Superior Pool and Sea View at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/superior-pool2.webp" alt="Superior Pool and Sea View at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">Superior Pool and Sea View</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed or twin beds</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>38 m² (409 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 1 child</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/superior-pool-and-sea-view/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>

            <div class="room-item" data-category="superior">
                <div class="room-image">
                    <div class="swiper room-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/superior-sea.webp" alt="SUPERIOR ROOM SEA VIEW at Marina Bay Resort">
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/rooms/rooms-section/superior-sea2.webp" alt="SUPERIOR ROOM SEA VIEW at Marina Bay Resort">
                            </div>
                        </div>
                        <div class="swiper-controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination fraction"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="room-content">
                    <h3 class="room-title">SUPERIOR ROOM SEA VIEW</h3>
                    <div class="room-details">
                        <div class="detail-item">
                            <i class="fas fa-bed"></i>
                            <span>King bed or twin beds</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-vector-square"></i>
                            <span>35 m² (377 sq.ft.)</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>2 adults, 1 child</span>
                        </div>
                    </div>
                    <div class="room-actions">
                        <a href="#" class="btn btn-primary">CHECK RATES</a>
                        <a href="/superior-room-sea-view/" class="btn btn-secondary">DETAILS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // View Toggle Functionality (Desktop only)
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    const roomsGrid = document.querySelector('.rooms-grid');
    const categoryList = document.querySelector('.category-list');
    const roomsCategories = document.querySelector('.rooms-categories');

    // Function to check scroll position and update gradient
    function updateGradient() {
        const isAtEnd = categoryList.scrollLeft + categoryList.clientWidth >= categoryList.scrollWidth - 10; // -10 for small buffer
        roomsCategories.classList.toggle('at-end', isAtEnd);
    }

    // Add scroll event listener
    categoryList.addEventListener('scroll', updateGradient);

    // Call once on load
    updateGradient();

    // Category Filter Functionality
    const categoryLinks = document.querySelectorAll('.category-link');
    const roomItems = document.querySelectorAll('.room-item');
    const categoryDescriptions = document.querySelectorAll('.category-description');

    // Count rooms in each category
    function updateRoomCounts() {
        const counts = {
            all: roomItems.length,
            deluxe: 0,
            family: 0,
            junior: 0,
            superior: 0
        };

        roomItems.forEach(room => {
            const category = room.dataset.category;
            if (counts.hasOwnProperty(category)) {
                counts[category]++;
            }
        });

        // Update the count in each category link
        categoryLinks.forEach(link => {
            const category = link.dataset.category;
            const countSpan = link.querySelector('.count');
            if (countSpan && counts.hasOwnProperty(category)) {
                countSpan.textContent = `(${counts[category]})`;
            }
        });
    }

    // Set initial view based on screen size
    function setInitialView() {
        if (window.innerWidth <= 991) {
            roomsGrid.className = 'rooms-grid view-list';
        } else {
            roomsGrid.className = 'rooms-grid view-grid';
        }
    }

    // Filter rooms based on category
    function filterRooms(category) {
        // Hide all descriptions first
        categoryDescriptions.forEach(desc => {
            desc.classList.remove('active');
        });

        // Show description for selected category
        if (category !== 'all') {
            const description = document.querySelector(`.category-description[data-category="${category}"]`);
            if (description) {
                description.classList.add('active');
            }
        }

        // Filter rooms
        roomItems.forEach(room => {
            if (category === 'all' || room.dataset.category === category) {
                room.style.display = '';
                room.style.opacity = '1';
            } else {
                room.style.display = 'none';
                room.style.opacity = '0';
            }
        });

        // Update gradient after filtering
        setTimeout(updateGradient, 100);
    }

    // Category click handler
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            categoryLinks.forEach(l => l.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Filter rooms
            filterRooms(this.dataset.category);
        });
    });

    // Set initial view on load
    setInitialView();

    // Update room counts on load
    updateRoomCounts();

    // Update view on resize
    window.addEventListener('resize', () => {
        setInitialView();
        updateGradient();
    });

    // Toggle functionality for desktop
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (window.innerWidth > 991) {
                const view = this.dataset.view;
                
                // Remove active class from all buttons
                toggleBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Update grid view class
                roomsGrid.className = 'rooms-grid view-' + view;
            }
        });
    });

    // Initialize all room swipers
    const roomSwipers = document.querySelectorAll('.room-swiper');
    roomSwipers.forEach((swiperElement, index) => {
        new Swiper(swiperElement, {
            loop: true,
            navigation: {
                nextEl: swiperElement.querySelector('.swiper-button-next'),
                prevEl: swiperElement.querySelector('.swiper-button-prev'),
            },
            pagination: {
                el: swiperElement.querySelector('.swiper-pagination'),
                type: 'fraction',
                formatFractionCurrent: function (number) {
                    return number;
                },
                formatFractionTotal: function (number) {
                    return number;
                },
            },
        });
    });
});
</script> 