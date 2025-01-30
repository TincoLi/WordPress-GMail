<?php
// Enable CORS if needed (for AJAX requests)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// ✅ 1. Get Form Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // ✅ 2. Validate Required Fields
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    // ✅ 3. Send Data to Google Sheets (Webhooks)
    $google_sheets_url = "https://script.google.com/macros/s/YOUR_GOOGLE_SCRIPT_URL/exec";
    $data = [
        "name" => $name,
        "email" => $email,
        "message" => $message
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/json",
            "method" => "POST",
            "content" => json_encode($data)
        ]
    ];
    $context = stream_context_create($options);
    file_get_contents($google_sheets_url, false, $context);

    // ✅ 4. Send Email Notification
    $subject = "Thank You for Contacting Us";
    $body = "Hello $name, \n\nWe received your message:\n\n$message\n\nWe will get back to you soon.";
    $headers = "From: contact@yourdomain.com"; // CPanel Email

    wp_mail($email, $subject, $body, $headers);

    echo json_encode(["status" => "success", "message" => "Form submitted successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
