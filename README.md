# WordPress-GMail
#  Program Stucture
📂 backend-wordpress-gmail
├── 📂 google-smtp-config
│   ├── gmail_api_setup.py       # Python script to set up Gmail API for SMTP
│   ├── credentials.json         # Google OAuth credentials
│   ├── token.json               # OAuth refresh token
├── 📂 cpanel-email-integration
│   ├── pop3_cpanel_to_gmail.py  # Fetch emails from CPanel and forward to Gmail
│   ├── smtp_cpanel.py           # SMTP configuration for sending emails via CPanel
├── 📂 wordpress-contact-forms
│   ├── wp_smtp_integration.php  # PHP script for WordPress Gmail SMTP setup
│   ├── form_handler.php         # PHP handler for WordPress forms
│   ├── custom_functions.php     # Custom functions for form integration
├── 📂 server-maintenance
│   ├── cron_server_config.sh    # Cron job script for PHP memory & SSL check
│   ├── optimize_sql_cache.sql   # SQL script to clear cache
├── 📂 google-apps-script
│   ├── auto_email.gs            # Google Apps Script for automated emails
│   ├── form_to_sheets.gs        # Google Apps Script to log WordPress forms in Sheets
└── README.md

# Steps of developing mail service for wordpress website
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

4. Fetch Emails from CPanel and Forward to Gmail (Python)
Create a Python script to fetch emails from CPanel via POP3 and forward them to Gmail.
Step 1: Install Required Libraries
pip install poplib smtplib email
Step 2: Fetch and Forward Emails
Create fetch_cpanel_emails.py:
✔ This script fetches emails from CPanel and forwards them to Gmail.

5. Automate Server Maintenance (PHP)
Create a PHP script to optimize PHP memory, dump SQL cache, and check SSL expiry.
Create server_maintenance.php
✔ Runs weekly using a cron job:
crontab -e
0 2 * * 7 /usr/bin/php /var/www/html/server_maintenance.php >> /var/log/php_maintenance.log 2>&1

6. Automate Email Notifications (Google Apps Script)
Use Google Apps Script to send automated responses and log form data.
Step 1: Automate Emails
Create auto_email.gs:
✔ Runs every 10 minutes via a trigger.
Step 2: Log Contact Forms to Google Sheets
Create form_to_sheets.gs:
✔ Logs WordPress form submissions to Google Sheets.
