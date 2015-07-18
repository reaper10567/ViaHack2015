var nodemailer = require('nodemailer');
var msg_subject = 'hi';
var msg_text = 'Yoyo your event is up';
var emails = ['suwa_rna@yahoo.com', 'tyler.gerber@viasat.com'];
var transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: 'events.viasat@gmail.com',
        pass: 'Viasat2015'
    }
});
for (i =0; i<emails.length; i++) {

transporter.sendMail({
    from: 'events.viasat@gmail.com',
    to: emails[i],
    subject: msg_subject,
    text: msg_text
});

}
