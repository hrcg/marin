<?php
/**
 * Events FAQ Section Template
 */
?>

<?php
    $faqs = get_field('events_faqs');
    // Assuming the left column content is static as per the screenshot
?>
<section class="events-faqs-section">
    <div class="container">
        <div class="faq-layout-container">
            <div class="faq-left-column">
                <div class="faq-section-subtitle-container">
                    <span class="line"></span>
                    <h4 class="faq-section-subtitle">PYETJE TË SHPESHTA</h4>
                    <span class="line"></span>
                </div>
                <h2 class="faq-main-title">Keni Pyetje?</h2>
                
                <div class="faq-contact-prompt">
                    <h5 class="faq-prompt-heading">NUK JENI TË QARTË?</h5>
                    <p>Nuk mund të gjeni përgjigjen që kërkoni? Ju lutemi kontaktoni me shërbimin tonë të klientëve.</p>
                    <a href="#" class="btn btn-contact-faq">Na Kontaktoni</a> <?php // Replace # with actual contact page link ?>
                </div>
            </div>

            <div class="faq-right-column">
                <?php if ($faqs && !empty($faqs)) : ?>
                    <div class="faqs-content">
                        <?php foreach ($faqs as $index => $faq) : ?>
                            <div class="faq-item">
                                <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-answer-<?php echo esc_attr($index); ?>">
                                    <?php echo esc_html($faq['question']); ?>
                                    <span class="faq-icon">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </button>
                                <div class="faq-answer" id="faq-answer-<?php echo esc_attr($index); ?>" hidden>
                                    <div class="faq-answer-content">
                                        <?php echo wp_kses_post(wpautop($faq['answer'])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No FAQs available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>