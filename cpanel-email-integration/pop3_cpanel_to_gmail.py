import poplib
import smtplib
from email.parser import BytesParser

CPANEL_EMAIL = "contact@yourdomain.com"
CPANEL_PASSWORD = "your-cpanel-password"
GMAIL_USER = "your-email@gmail.com"
GMAIL_PASSWORD = "your-app-password"

# Connect to CPanel POP3 Mailbox
# POP3 (Post Office Protocol version 3) is a standard email retrieval protocol used to fetch emails from a mail server to a local device.
# SMTP (Simple Mail Transfer Protocol) is a standard protocol used for sending emails across the internet. 
# It defines how email messages are transmitted from email clients (like Outlook, Gmail, or Python scripts) to mail servers and between mail servers.
pop_conn = poplib.POP3_SSL("mail.yourdomain.com")
pop_conn.user(CPANEL_EMAIL)
pop_conn.pass_(CPANEL_PASSWORD)

# Fetch latest email
num_messages = len(pop_conn.list()[1])
if num_messages > 0:
    _, msg_data, _ = pop_conn.retr(num_messages)
    msg = BytesParser().parsebytes(b"\n".join(msg_data))
    pop_conn.quit()

    # Forward to Gmail via SMTP
    with smtplib.SMTP("smtp.gmail.com", 587) as server:
        server.starttls()
        server.login(GMAIL_USER, GMAIL_PASSWORD)
        server.sendmail(CPANEL_EMAIL, GMAIL_USER, msg.as_string())

print("✅ Email forwarded from CPanel to Gmail")
