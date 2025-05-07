<?php
/**
 * About Entry Section Template
 */
?>
<nav class="amenities-nav">
    <div class="container">
        <ul class="amenities-links">
            <li><a href="#the-hotel">THE HOTEL</a></li>
            <li><a href="#gallery">GALLERY</a></li>
            <li><a href="#join">JOIN THE MARINA BAY EXPERIENCE</a></li>
        </ul>
    </div>
</nav>

<section class="entry-text" id="the-hotel">
    <div class="container">
    <h1 class="entry-heading">Marina Bay Resort & Casino</h1>
        <p class="entry-description">
        In a world of constant motion, Marina Bay stands as an exclusive sanctuary where luxury meets tranquility—a rare destination where sophisticated pleasures and serene moments coexist in perfect harmony.
        </p><br>
        <p class="entry-description">
        Nestled in a pristine bay just 10 minutes from Vlora city center, our 20,000m² seaside paradise represents the pinnacle of Albanian hospitality. Here, contemporary elegance merges seamlessly with breathtaking natural beauty, creating an atmosphere of unparalleled refinement.
        </p><br>
        <p class="entry-description">
        From our world-class casino and exceptional dining venues to our luxurious accommodations and private beaches, every aspect of Marina Bay has been meticulously crafted to exceed the expectations of our most discerning guests. Whether you seek the thrill of gaming, the pleasure of fine dining, or simply a moment of peaceful reflection by the Adriatic Sea, Marina Bay offers an escape into a world of pure luxury.
        </p>
    </div>
</section>

<section class="gallery-section" id="gallery">
    <div class="container">
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/about/g1.webp" alt="Marina Bay Resort View" class="gallery-image">
            </div>
            <div class="gallery-item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/about/g2.webp" alt="Marina Bay Resort Interior" class="gallery-image">
            </div>
        </div>
    </div>
</section>

<section class="join-section" id="join">
    <div class="container">
        <div class="join-content">
            <div class="join-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/about/join.webp" alt="Join Marina Bay Experience" class="join-img">
            </div>
            <div class="join-text">
                <h2 class="join-title">JOIN THE MARINA BAY EXPERIENCE</h2>
                <p class="join-description">Experience luxury like never before at Marina Bay Resort & Casino. Join us for an unforgettable stay where every moment is crafted to perfection.</p>
                <a href="/book" class="join-link">BOOK YOUR STAY</a>
            </div>
        </div>
    </div>
</section>