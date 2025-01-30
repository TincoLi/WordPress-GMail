add_action('phpmailer_init', 'setup_gmail_smtp');

function setup_gmail_smtp($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = 'your-email@gmail.com';
    $phpmailer->Password = 'your-app-password';
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->Port = 587;
}

add_filter('wp_mail_from', function () { return 'your-email@gmail.com'; });
add_filter('wp_mail_from_name', function () { return 'Your Website'; });
