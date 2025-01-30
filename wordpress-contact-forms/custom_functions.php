// include in WordPress
<?php
// ✅ 1. Register a Custom Shortcode for Contact Form
function custom_contact_form() {
    ob_start();
    ?>
    <form id="custom-contact-form">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Message:</label>
        <textarea name="message" required></textarea>
        <button type="submit">Submit</button>
    </form>
    <div id="form-response"></div>

    <script>
        document.getElementById("custom-contact-form").onsubmit = function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            fetch("<?php echo get_template_directory_uri(); ?>/form_handler.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("form-response").innerText = data.message;
            });
        };
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('contact_form', 'custom_contact_form');

// ✅ 2. Modify WordPress Email Headers for Better Deliverability
add_filter('wp_mail_from', function() { return 'contact@yourdomain.com'; });
add_filter('wp_mail_from_name', function() { return 'Your Website'; });

?>
