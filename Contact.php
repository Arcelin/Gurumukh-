<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $mail = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $email_from = "no-reply@yourdomain.com";
    $email_subject = "LandMark Appointment";
    $email_body = "Name: $name\nEmail: $mail\nSubject: $subject\nMessage:\n$message";

    $to = "aayushikumari246@gmail.com";

    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $mail\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Mail failed. Configure SMTP.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* ===== GLOBAL ===== */
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        /* ===== CONTAINER ===== */
        .contact-wrapper {
            max-width: 1100px;
            margin: 40px auto;
            display: flex;
            flex-wrap: wrap;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* ===== LEFT INFO ===== */
        .contact-info {
            background: #1e293b;
            color: #fff;
            padding: 40px;
            flex: 1;
        }

        .contact-info h2 {
            margin-bottom: 20px;
            color: #38bdf8;
        }

        .contact-info p {
            line-height: 1.8;
            font-size: 15px;
        }

        .contact-info .address {
            margin-top: 20px;
            font-weight: bold;
        }

        /* ===== FORM AREA ===== */
        .contact-form {
            flex: 1;
            padding: 40px;
        }

        .contact-form h2 {
            margin-bottom: 20px;
            color: #1e293b;
        }

        /* ===== FORM ELEMENTS ===== */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        /* ===== BUTTON ===== */
        button {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 14px 30px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: 0.3s;
        }

        button:hover {
            background: #1e40af;
        }

        /* ===== MESSAGE ===== */
        .error {
            color: red;
            font-size: 14px;
        }

        .loading {
            display: none;
            color: #2563eb;
            margin-top: 10px;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .contact-wrapper {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="contact-wrapper">

        <!-- LEFT SIDE -->
        <div class="contact-info">
            <h2>Get in Touch</h2>
            <p>If you have any queries related to our machines, services or support, feel free to contact us.</p>

            <div class="address">
                📍 Address:<br>
                Plot no 288, Industrial Focal Point,<br>
                Mehta Road, Amritsar - 143001
            </div>
        </div>

        <!-- FORM -->
        <div class="contact-form">
            <h2>Contact Form</h2>

            <form method="POST" onsubmit="return validateForm();">

                <div class="form-group">
                    <label>Your Name *</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-group">
                    <label>Your Email *</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label>Subject *</label>
                    <input type="text" name="subject" id="subject" required>
                </div>

                <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" id="message" rows="5" required></textarea>
                </div>

                <span class="error" id="errorMsg"></span>
                <div class="loading" id="loading">Sending message...</div>

                <br>
                <button type="submit">Send Message</button>
            </form>
        </div>

    </div>

    <script>
        function validateForm() {
            document.getElementById("errorMsg").innerHTML = "";
            document.getElementById("loading").style.display = "block";

            let name = document.getElementById("name").value.trim();
            let email = document.getElementById("email").value.trim();
            let subject = document.getElementById("subject").value.trim();
            let message = document.getElementById("message").value.trim();

            if (name.length < 3) {
                showError("Name must be at least 3 characters.");
                return false;
            }
            if (!email.includes("@")) {
                showError("Please enter a valid email.");
                return false;
            }
            if (subject.length < 3) {
                showError("Subject is too short.");
                return false;
            }
            if (message.length < 5) {
                showError("Message is too short.");
                return false;
            }
            return true;
        }

        function showError(msg) {
            document.getElementById("loading").style.display = "none";
            document.getElementById("errorMsg").innerHTML = msg;
        }
    </script>

</body>

</html>