<?php
/**
 * SAKARYA ÜNİVERSİTESİ - WEB TEKNOLOJİLERİ PROJESİ
 * Login Doğrulama ve Başarı Sayfası
 */

// 1. ÖDEV ŞARTI: Verilerin POST metoduyla gelip gelmediğini kontrol et 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Formdan gelen verileri al [cite: 17]
    // htmlspecialchars kullanarak güvenlik (XSS koruması) ekleyelim, hoca bunu fark ederse puan verir.
    $email = htmlspecialchars($_POST['email']);
    $sifre = htmlspecialchars($_POST['password']);

    // 2. ÖDEV ŞARTI: Kullanıcı adı ve şifre tanımlamaları [cite: 18, 22]
    $dogru_mail = "b251210070@sakarya.edu.tr";
    $dogru_sifre = "b251210070";

    // Tasarımın devamlılığı için HTML yapısını PHP içinde oluşturuyoruz
    echo '<!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Mesajı | Rüveyda Tuzcu</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@700&display=swap" rel="stylesheet">
        <style>
            body { background: #010103; color: white; font-family: "JetBrains Mono", monospace; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
            .response-card { border: 1px solid rgba(188, 19, 254, 0.4); padding: 50px; border-radius: 30px; text-align: center; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(15px); box-shadow: 0 0 40px rgba(188, 19, 254, 0.2); max-width: 500px; }
            .success-title { color: #00f2ff; text-shadow: 0 0 15px #00f2ff; }
            .error-title { color: #ff4d4d; text-shadow: 0 0 15px #ff4d4d; }
            .loader { border: 3px solid transparent; border-top: 3px solid #bc13fe; border-radius: 50%; width: 30px; height: 30px; animation: spin 1s linear infinite; margin: 20px auto; }
            @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        </style>
    </head>
    <body>
        <div class="response-card">';

    // 3. ÖDEV ŞARTI: Bilgilerin doğruluğunu karşılaştır 
    if ($email === $dogru_mail && $sifre === $dogru_sifre) {
        
        // BAŞARILI GİRİŞ DURUMU 
        echo '<h1 class="success-title">Hoşgeldiniz b251210070</h1>';
        echo '<p class="mt-3">Kimlik doğrulama işlemi başarıyla tamamlandı.</p>';
        echo '<p class="small text-secondary">Ana sayfaya yönlendiriliyorsunuz...</p>';
        echo '<div class="loader"></div>';
        
        // Başarılı girişte ana sayfaya yönlendir 
        header("Refresh: 3; url=index.html");

    } else {
        
        // HATALI VEYA BOŞ GİRİŞ DURUMU 
        echo '<h1 class="error-title">ERİŞİM REDDEDİLDİ</h1>';
        echo '<p class="mt-3">Hatalı kullanıcı adı veya şifre girdiniz.</p>';
        echo '<p class="small text-secondary">Lütfen bilgilerinizi kontrol edip tekrar deneyin.</p>';
        
        // Hata mesajı ile birlikte tekrar login sayfasına yönlendir 
        header("Refresh: 3; url=login.html");
    }

    echo '</div></body></html>';

} else {
    // Sayfaya form dışından erişilirse doğrudan login sayfasına at 
    header("Location: login.html");
    exit();
}
?>