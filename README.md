# Pardot Fields for Ninja Forms

This plugin adds two fields, "Pardot Cookie" and "Pardot Spam".

In order for it to detect a Pardot visitor cookie, it is recommended that the official [Pardot WordPress plugin](https://wordpress.org/plugins/pardot/) is installed and configured. You can also just add the Pardot tracking code manually if you prefer.

At this time, this plugin does not send the form data to Pardot on submission. You will need the [Webhooks extension for Ninja Forms](https://ninjaforms.com/extensions/webhooks/) in order to actually send the data to a Pardot Form Handler.

To send the form data, add a Webhook action to your form that has both the "Pardot Cookie" and "Pardot Spam" fields. Use the Form Handler URL as the _Remote URL_ and "Post" as the _Remote Method_. Add the fields that your Form Handler is expecting, along with these two extra fields:

1. `pardot_extra_field`: Pardot Spam field value
2. `visitor_id`: Pardot Cookie field value
