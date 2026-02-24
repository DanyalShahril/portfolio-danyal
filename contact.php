<?php
include 'includes/header.php';
include 'config/db.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize input
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if (!empty($name) && !empty($email) && !empty($message)) {

        $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);

            if ($stmt->execute()) {
                $success = "Message sent successfully!";
            } else {
                $error = "Something went wrong. Please try again.";
            }

            $stmt->close();
        } else {
            $error = "Database prepare failed.";
        }

    } else {
        $error = "All fields are required.";
    }
}
?>

<section class="section">
  <div class="container">
    <h1>Contact Me</h1>

    <?php if ($success): ?>
        <p style="color:lime;"><?php echo $success; ?></p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="" class="contact-form">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <button type="submit" class="btn">Send Message</button>
    </form>

  </div>
</section>

<?php include 'includes/footer.php'; ?>