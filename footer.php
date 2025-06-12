<footer id="site-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Left Column -->
            <div class="footer-left">
                <div class="footer-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/new-logo.webp" alt="<?php bloginfo('name'); ?>">
                </div>
                <div class="footer-contact">
                    <p class="address">Rruga Aleksandër Moisiu 9405, Vlora • Albania</p>
                    <p href="tel:+355696041000" class="phone">P +355 69 604 1000</p>
                    <p href="tel:+35533410000" class="phone">P +355 33 41 0000</p>
                    <p class="general-info">Reservation & General Info: <a href="mailto:info@marinabay.al">info@marinabay.al</a></p>
                    <a href="#" class="factsheet">Factsheet</a>
                    <span style="margin: 0 10px;">|</span>
                    <a href="/terms-conditions" class="factsheet">Terms and Conditions</a>
                </div>
            </div>

            <!-- Right Column -->
            <div class="footer-right">
                <!-- Navigation Links -->
                <div class="footer-nav">
                    <div class="footer-nav-column">
                        <a href="/contact">Contact</a>
                        <a href="/about">About Us</a>
                    </div>
                    <div class="footer-nav-column">
                        <a href="/gallery">Gallery</a>
                        <a href="/amenities-activities">Amenities & Activities</a>
                    </div>
                    <div class="footer-nav-column">
                        <a href="/rooms-suites">Rooms & Suites</a>
                        <a href="/book">Book Now</a>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="footer-social">
                    <a href="https://www.facebook.com/marinabayresortcasino" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/marinabayresort_casino" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@marinabayresort_casino" class="social-link"><i class="fab fa-tiktok"></i></a>
                </div>

                <!-- Brand Logos -->
                <div class="footer-brands">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/footer/forbeslogo.png" alt="ORASCOM Hotels Management">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/footer/Vir_Logo_Preferred_Int_Rev_RGB.png" alt="GHM">
                </div>
            </div>
        </div>

        <!-- Copyright Text -->
        <div class="footer-copyright">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
