<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini güvenli bir şekilde alalım
    $ad = htmlspecialchars($_POST['ad'] ?? '-');
    $email = htmlspecialchars($_POST['email'] ?? '-');
    $tel = htmlspecialchars($_POST['tel'] ?? '-');
    $mesaj = htmlspecialchars($_POST['mesaj'] ?? '-');

    echo '<!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>İletişim Onay // Rüveyda Tuzcu</title>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;800&family=JetBrains+Mono:wght@400;700;800&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>
            .btn-cyber {
                padding: 12px 30px;
                background: transparent;
                border: 1px solid var(--accent);
                color: var(--accent);
                font-family: "JetBrains Mono";
                text-transform: uppercase;
                text-decoration: none;
                border-radius: 12px;
                transition: 0.3s;
            }
            .btn-cyber:hover {
                background: var(--accent);
                color: white;
                box-shadow: 0 0 20px var(--accent);
            }
        </style>
    </head>
    <body style="background: #010103;">
        <div id="particles-js"></div>
        <div class="container py-5">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="holo-card text-center" style="padding: 50px;">
                        <h2 class="section-title mb-4">Mesaj Alındı</h2>
                        <p class="text-cyan mb-5" style="font-family: \'JetBrains Mono\';">Gönderdiğiniz bilgiler sistemimize başarıyla ulaştı.</p>
                        
                        <div class="text-start mb-5" style="background: rgba(255,255,255,0.03); padding: 30px; border-radius: 20px; border: 1px solid var(--border);">
                            <p><strong>Ad Soyad:</strong> <span class="text-white">' . $ad . '</span></p>
                            <p><strong>E-posta:</strong> <span class="text-white">' . $email . '</span></p>
                            <p><strong>Telefon:</strong> <span class="text-white">' . $tel . '</span></p>
                            <p><strong>Mesaj:</strong> <br><span class="text-white">' . nl2br($mesaj) . '</span></p>
                        </div>

                        <a href="index.html" class="btn-cyber">Ana Sayfaya Dön</a>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script>
            particlesJS("particles-js", {
                particles: {
                    number: { value: 40 },
                    color: { value: "#bc13fe" },
                    opacity: { value: 0.2 },
                    line_linked: { enable: true, color: "#bc13fe", opacity: 0.1 },
                    move: { speed: 1 }
                }
            });
        </script>
    </body>
    </html>';
} else {
    // Eğer sayfaya doğrudan erişilmeye çalışılırsa ana sayfaya yönlendir
    header("Location: index.html");
    exit();
}
?>