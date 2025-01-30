# WordPress-GMail
develop mail service for wordpress website
1. create a wordpress website
https://wordpress.com/view/tinghandcraft.wordpress.com

2. Configuring Gmail SMTP for WordPress
Step 1: Enable Gmail SMTP
Go to Google Cloud Console → Enable Gmail API.
Create OAuth 2.0 Credentials (credentials.json).
Enable App Passwords in Google Account.
Use WP Mail SMTP Plugin in WordPress.
Step 2: Configure WordPress SMTP
Install the WP Mail SMTP plugin.
Set up Gmail SMTP in wp-config.php:

3. Integrate Contact Forms with CPanel Email
Step 1: Install a WordPress Contact Form Plugin
Install Contact Form 7 or WPForms from WordPress Plugins.
Step 2: Configure the Contact Form
Add this shortcode to any WordPress page:
html
[contact-form-7 id="123" title="Contact form"]
In the Contact Form settings, set recipient email to contact@yourdomain.com.
Step 3: Modify PHP Mail Function for CPanel
Edit wp_smtp_integration.php:
✔ Now, WordPress contact forms will send emails via CPanel SMTP.

4.Fetch Emails from CPanel and Forward to Gmail (Python)
Create a Python script to fetch emails from CPanel via POP3 and forward them to Gmail.
Step 1: Install Required Libraries
pip install poplib smtplib email
Step 2: Fetch and Forward Emails
Create fetch_cpanel_emails.py:
