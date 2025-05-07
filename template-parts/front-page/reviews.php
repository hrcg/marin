<?php
/**
 * Reviews Section Template Part
 */

$ratings = marina_bay_get_platform_ratings();

if ($ratings) :
?>
<section class="reviews-section">
    <div class="container">
        <div class="reviews-wrapper">
            <!-- Main Rating -->
            <div class="main-rating">
                <div class="rating-score">
                    <span class="score"><?php echo number_format($ratings['main_rating'], 1); ?></span>
                    <span class="max-score">/5</span>
                </div>
                <div class="rating-info">
                    <div class="rating-label">
                        Exceptional 
                        <span class="info-icon">
                            i
                            <div class="reviews-source-popup">
                                <h4>Reviews by Source</h4>
                                <div class="source-list">
                                    <?php if (!empty($ratings['google_reviews_link'])) : ?>
                                        <a href="<?php echo esc_url($ratings['google_reviews_link']); ?>" target="_blank" rel="noopener noreferrer" class="source-item-link">
                                    <?php endif; ?>
                                    <div class="source-item">
                                        <span class="source-name">Google</span>
                                        <div class="source-stats">
                                            <span class="source-rating"><?php echo number_format($ratings['google_rating'], 1); ?>/5</span>
                                            <span class="source-count"><?php echo number_format($ratings['google_reviews_count']); ?> reviews</span>
                                        </div>
                                    </div>
                                    <?php if (!empty($ratings['google_reviews_link'])) : ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($ratings['tripadvisor_reviews_link'])) : ?>
                                        <a href="<?php echo esc_url($ratings['tripadvisor_reviews_link']); ?>" target="_blank" rel="noopener noreferrer" class="source-item-link">
                                    <?php endif; ?>
                                    <div class="source-item">
                                        <span class="source-name">TripAdvisor</span>
                                        <div class="source-stats">
                                            <span class="source-rating"><?php echo number_format($ratings['tripadvisor_rating'], 1); ?>/5</span>
                                            <span class="source-count"><?php echo number_format($ratings['tripadvisor_reviews_count']); ?> reviews</span>
                                        </div>
                                    </div>
                                    <?php if (!empty($ratings['tripadvisor_reviews_link'])) : ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($ratings['booking_reviews_link'])) : ?>
                                        <a href="<?php echo esc_url($ratings['booking_reviews_link']); ?>" target="_blank" rel="noopener noreferrer" class="source-item-link">
                                    <?php endif; ?>
                                    <div class="source-item">
                                        <span class="source-name">Booking.com</span>
                                        <div class="source-stats">
                                            <span class="source-rating"><?php echo number_format($ratings['booking_rating'], 1); ?>/10</span>
                                            <span class="source-count"><?php echo number_format($ratings['booking_reviews_count']); ?> reviews</span>
                                        </div>
                                    </div>
                                    <?php if (!empty($ratings['booking_reviews_link'])) : ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($ratings['expedia_reviews_link'])) : ?>
                                        <a href="<?php echo esc_url($ratings['expedia_reviews_link']); ?>" target="_blank" rel="noopener noreferrer" class="source-item-link">
                                    <?php endif; ?>
                                    <div class="source-item">
                                        <span class="source-name">Expedia</span>
                                        <div class="source-stats">
                                            <span class="source-rating"><?php echo number_format($ratings['expedia_rating'], 1); ?>/10</span>
                                            <span class="source-count"><?php echo number_format($ratings['expedia_reviews_count']); ?> reviews</span>
                                        </div>
                                    </div>
                                    <?php if (!empty($ratings['expedia_reviews_link'])) : ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="review-count">based on <?php echo number_format($ratings['total_reviews']); ?> verified reviews</div>
                </div>
            </div>

            <!-- Divider -->
            <div class="rating-divider"></div>

            <!-- Platforms Ratings -->
            <div class="platform-ratings">
                <div class="top-hotel">
                    <span>Premier Luxury Resort & Casino in Albania</span>
                </div>
                <div class="rating-divider"></div>
                <div class="platform-list">
                    <div class="rating-item">
                        <span class="platform-name">Google</span>
                        <div class="platform-score"><?php echo number_format($ratings['google_rating'], 1); ?><span class="max-score">/5</span></div>
                    </div>
                    <div class="rating-item">
                        <span class="platform-name">TripAdvisor</span>
                        <div class="platform-score"><?php echo number_format($ratings['tripadvisor_rating'], 1); ?><span class="max-score">/5</span></div>
                    </div>
                    <div class="rating-item">
                        <span class="platform-name">Booking.com</span>
                        <div class="platform-score"><?php echo number_format($ratings['booking_rating'], 1); ?><span class="max-score">/10</span></div>
                    </div>
                    <div class="rating-item">
                        <span class="platform-name">Expedia</span>
                        <div class="platform-score"><?php echo number_format($ratings['expedia_rating'], 1); ?><span class="max-score">/10</span></div>
                    </div>
                </div>
            </div>

            <div class="reviews-action">
                <a href="#" class="read-reviews-btn">Read Guest Reviews</a>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Popup -->
<div class="reviews-popup">
    <div class="reviews-popup-content">
        <div class="reviews-popup-header">
            <div class="main-rating">
                <div class="rating-score">
                    <span class="score"><?php echo number_format($ratings['main_rating'], 1); ?></span>
                    <span class="max-score">/5</span>
                </div>
                <div class="rating-info">
                    <div class="rating-label">Exceptional <span class="info-icon">i</span></div>
                    <div class="review-count">based on <?php echo number_format($ratings['total_reviews']); ?> verified reviews</div>
                </div>
            </div>
            <button class="close-popup" aria-label="Close reviews popup">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <div class="reviews-filters">
            <div class="filter-group">
                <select class="traveler-type-filter">
                    <option value="all">All guest types</option>
                    <option value="business">Business</option>
                    <option value="couples">Couples</option>
                    <option value="family">Families</option>
                    <option value="friends">Friends</option>
                    <option value="solo">Solo travelers</option>
                </select>
            </div>
            <div class="filter-group">
                <select class="language-filter">
                    <option value="all">All languages</option>
                </select>
            </div>
        </div>
        <div class="reviews-list">
            <div class="review-item" data-traveler-type="family">
                <h3 class="review-title">"Unparalleled Luxury Experience"</h3>
                <p class="review-text">Marina Bay Resort & Casino exceeded all expectations. The attention to detail in every aspect of our stay was remarkable. From the stunning sea views to the world-class casino, everything exuded luxury and sophistication. The staff's dedication to service excellence made our family vacation truly memorable. The resort's amenities, particularly the private beach and gourmet restaurants, were outstanding.</p>
                <div class="review-meta">Posted on <span class="platform">TripAdvisor</span> by <span class="traveler-type">Family with children</span></div>
            </div>
            <div class="review-item" data-traveler-type="couples">
                <h3 class="review-title">"A Paradise of Luxury and Entertainment"</h3>
                <p class="review-text">Our stay at Marina Bay Resort & Casino was nothing short of extraordinary. The seamless blend of luxury accommodation with world-class gaming created an unforgettable experience. The private balcony offered breathtaking views of the Adriatic, while the casino floor provided sophisticated entertainment. The Mandarine Restaurant's culinary offerings were exceptional, and the spa services were divine. This resort truly sets the standard for luxury in Albania.</p>
                <div class="review-meta">Posted on <span class="platform">TripAdvisor</span> by <span class="traveler-type">Couple</span></div>
            </div>
            <div class="review-item" data-traveler-type="business">
                <h3 class="review-title">"Exceptional Business and Leisure Destination"</h3>
                <p class="review-text">Marina Bay Resort & Casino perfectly balances luxury and functionality. The conference facilities are state-of-the-art, while the resort amenities offer the perfect way to unwind after meetings. The professional staff, high-end dining options, and sophisticated casino create an impressive environment for both business and leisure. The attention to detail in service and amenities is remarkable.</p>
                <div class="review-meta">Posted on <span class="platform">TripAdvisor</span> by <span class="traveler-type">Business traveler</span></div>
            </div>
            <div class="review-item" data-traveler-type="friends">
                <h3 class="review-title">"The Ultimate Luxury Getaway"</h3>
                <p class="review-text">Marina Bay Resort & Casino offers an unmatched luxury experience. The casino is world-class, the restaurants are exceptional, and the beachfront location is stunning. Every detail, from the premium room amenities to the attentive service, reflects the highest standards of hospitality. The resort's exclusive atmosphere and range of entertainment options make it perfect for a sophisticated escape.</p>
                <div class="review-meta">Posted on <span class="platform">TripAdvisor</span> by <span class="traveler-type">Group of friends</span></div>
            </div>
            <div class="review-item" data-traveler-type="solo">
                <h3 class="review-title">"A Haven of Sophistication"</h3>
                <p class="review-text">From the moment I arrived at Marina Bay Resort & Casino, I was immersed in luxury. The personal attention from staff, the elegant room design, and the world-class facilities created an exceptional experience. The casino offers an sophisticated gaming environment, while the spa and dining venues provide perfect relaxation. The beachfront setting and stunning architecture make this resort truly unique in Albania.</p>
                <div class="review-meta">Posted on <span class="platform">TripAdvisor</span> by <span class="traveler-type">Solo traveler</span></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?> 