function sendEmail() {
  var email = "customer@example.com";
  var subject = "Thank You for Contacting Us!";
  var body = "Hello, we received your message. We will get back soon.";

  GmailApp.sendEmail(email, subject, body);
}
