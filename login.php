<?php
/**
 * SAKARYA ÜNİVERSİTESİ - WEB TEKNOLOJİLERİ PROJESİ
 * Login Doğrulama ve Başarı Sayfası
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Güvenlik: htmlspecialchars ile XSS koruması
    $email = htmlspecialchars($_POST['email']);
    $sifre = htmlspecialchars($_POST['password']);

    // ÖDEV ŞARTI: Bilgilerin doğruluğunu karşılaştır
    $ogrenciNo = "b251210070";
    $dogru_mail = $ogrenciNo . "@sakarya.edu.tr";
    $dogru_sifre = $ogrenciNo;

    echo '<!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Mesajı // Rüveyda Tuzcu</title>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;800&family=JetBrains+Mono:wght@700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>
            /* Sayfayı dikeyde tam ortalamak için özel ayar */
            body { 
                background: #010103 !important; 
                display: flex; 
                align-items: center; 
                justify-content: center; 
                height: 100vh; 
                margin: 0; 
            }
            .response-card { 
                background: rgba(255, 255, 255, 0.05); 
                backdrop-filter: blur(20px); 
                border: 1px solid var(--border); 
                padding: 60px; 
                border-radius: 40px; 
                text-align: center; 
                max-width: 550px; 
                width: 90%;
            }
            .loader-cyber { 
                border: 3px solid transparent; 
                border-top: 3px solid var(--accent); 
                border-radius: 50%; 
                width: 40px; 
                height: 40px; 
                animation: spin 1s linear infinite; 
                margin: 25px auto; 
            }
            @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        </style>
    </head>
    <body>
        <div id="particles-js"></div>
        <div class="response-card">';

    if ($email === $dogru_mail && $sifre === $dogru_sifre) {
        
        // BAŞARILI GİRİŞ
        echo '<h1 class="text-cyan fw-bold mb-4" style="text-shadow: 0 0 15px var(--cyan);">HOŞGELDİNİZ ' . $ogrenciNo . '</h1>';
        echo '<p class="fs-5">Kimlik doğrulama işlemi başarıyla tamamlandı.</p>';
        echo '<p class="small text-muted mt-3">Sistem ana sayfasına yönlendiriliyorsunuz...</p>';
        echo '<div class="loader-cyber"></div>';
        
        // 3 saniye sonra index.html'e yönlendir
        header("Refresh: 3; url=index.html");

    } else {
        
        // HATALI GİRİŞ
        echo '<h1 class="text-danger fw-bold mb-4" style="text-shadow: 0 0 15px #ff4d4d;">ERİŞİM REDDEDİLDİ</h1>';
        echo '<p class="fs-5">Hatalı e-posta veya şifre girdiniz.</p>';
        echo '<p class="small text-muted mt-3">Giriş sayfasına geri dönülüyor...</p>';
        echo '<div class="loader-cyber" style="border-top-color: #ff4d4d;"></div>';
        
        // 3 saniye sonra login.html'e geri gönder
        header("Refresh: 3; url=login.html");
    }

    echo '</div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS(\'particles-js\', {
            particles: {
                number: { value: 40 },
                color: { value: \'#bc13fe\' },
                opacity: { value: 0.2 },
                line_linked: { enable: true, color: \'#bc13fe\', opacity: 0.1 },
                move: { speed: 1 }
            }
        });
    </script>
    </body></html>';

} else {
    header("Location: login.html");
    exit();
}
?>
