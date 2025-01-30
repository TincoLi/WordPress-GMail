add_action('phpmailer_init', 'setup_cpanel_smtp');

function setup_cpanel_smtp($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'mail.yourdomain.com'; // CPanel SMTP Server
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = 'contact@yourdomain.com';
    $phpmailer->Password = 'your-cpanel-password';
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->Port = 465;
}
