<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "البريد الإلكتروني غير صالح.";
        exit;
    }

    $to = "your-email@example.com"; // استبدل ببريدك الإلكتروني
    $subject = "رسالة جديدة من $name";
    $body = "اسم المرسل: $name\nالبريد الإلكتروني: $email\n\nالرسالة:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank-you.html"); // إعادة التوجيه إلى صفحة شكر
        exit;
    } else {
        echo "حدث خطأ أثناء إرسال الرسالة.";
    }
}
?>