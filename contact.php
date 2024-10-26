<?php
// التأكد من أن البيانات وصلت من النموذج عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على بيانات النموذج
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // إعداد معلومات البريد الإلكتروني
    $to = "your-email@example.com";  // استبدل هذا ببريدك الإلكتروني
    $subject = "رسالة جديدة من موقع عرض الكتاب";
    $body = "اسم: $name\n";
    $body .= "بريد إلكتروني: $email\n\n";
    $body .= "رسالة:\n$message";

    $headers = "From: $email";

    // إرسال البريد الإلكتروني
    if (mail($to, $subject, $body, $headers)) {
        echo "تم إرسال رسالتك بنجاح!";
    } else {
        echo "حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.";
    }
} else {
    echo "طلب غير صالح.";
}
?>
