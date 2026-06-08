<?php
// Adjust path to db.php if it resides inside an 'admin' folder
require_once 'admin/db.php';

try {
    // Fetch the 4 most recent projects
    $stmt = $pdo->query("SELECT id, name, address, city, img1 FROM projects ORDER BY id DESC LIMIT 4");
    $recent_projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $recent_projects = [];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GLORIA CONS | Lucrări de fațadă</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/home.css" />
    
  </head>

  <body>
    <header>
      <div class="brand-bar">
        <a href="index.php" class="brand">
          <div class="brand-logo">
            <img
              src="https://www.fmt.se/wp-content/uploads/2023/02/logo-placeholder-image.png"
              alt="GLORIA CONS logo" />
          </div>
          <div class="brand-name">GLORIA CONS</div>
        </a>
        <div class="lang-toggle mobile-lang-toggle">EN</div>
      </div>

      <div class="nav-wrapper">
        <nav class="navbar">
          <a href="services.html">Servicii</a>
          <a href="projects.php">Proiecte</a>
          <a href="#about">Despre noi</a>
          <a href="#contact">Contacte</a>
        </nav>
        <div class="lang-toggle">EN</div>
      </div>
    </header>

    <main>
      <section class="hero-section">
        <div class="hero-content">
          <div class="hero-title">Fațada contează.</div>
          <div class="hero-subtitle">
            Executăm lucrări de fațadă de calitate pentru orice tip de clădire.
          </div>
          <a href="projects.php" class="hero-mobile-btn">Proiecte finalizate</a>
        </div>

        <a href="projects.php" class="logo-wrapper">
          <div class="logo-text">Proiecte finalizate</div>
          <div class="hero-logo">
            <img
              src="https://www.fmt.se/wp-content/uploads/2023/02/logo-placeholder-image.png"
              alt="GLORIA CONS logo" />
          </div>
        </a>
      </section>

      <section class="services-section">
        <div class="big-title services-title">Ce oferim?</div>

        <div class="service">
          <div class="service-title">Lucrări de finisare exterioară</div>

          <div class="service-description">
            Oferim servicii complete de finisare exterioară și termoizolare a
            clădirilor, utilizând materiale moderne și tehnici profesionale
            pentru eficiență energetică, protecție și un aspect estetic durabil.
            Executăm lucrări cu polistiren expandat și vată minerală bazaltică,
            adaptate fiecăuir tip de construcție.
          </div>

          <a href="services.html" class="button">
            <div class="button-small">Află mai mult</div>
            <div class="button-icon">
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </a>
        </div>
      </section>

<section class="projects-section">
  <div class="projects-container">
    <div class="projects-header">
      <h2 class="big-title">Proiecte recente</h2>
      <a href="projects.php" class="button button-large" style="text-decoration: none;">
        <div class="button-small">Vezi toate proiectele</div>
      </a>
    </div>

    <div class="projects-grid">
      <?php if (!empty($recent_projects)): ?>
        <?php foreach ($recent_projects as $project): ?>
          <a href="project-single.php?id=<?= $project['id'] ?>" class="project-card">
            <div class="project-image">
              <img
                src="resources/gallery/<?= htmlspecialchars($project['img1']) ?>"
                alt="<?= htmlspecialchars($project['name']) ?>" />
            </div>
            <div class="project-info">
              <h3 class="project-title"><?= htmlspecialchars($project['name']) ?></h3>
              <p class="project-address">
                <i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($project['address']) ?>, <?= htmlspecialchars($project['city']) ?>
              </p>
              <div class="button-card">
                <span>Vezi proiectul</span>
                <i class="fa-solid fa-arrow-right"></i>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nu există proiecte recente de afișat.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

      <section id="about" class="about-section">
        <div class="about-image-wrapper">
          <img
            src="resources/about_us.jpg"
            alt="GLORIA CONS - About Us"
            class="about-img" />
        </div>

        <div class="about-info">
          <h2 class="big-title about-title">Despre noi</h2>

          <p class="big-description">
            <strong>GLORIA CONS</strong> este o companie specializată în
            finisaje exterioare și termoizolarea profesională a blocurilor de
            locuințe și a clădirilor rezidențiale. De peste 15 ani, oferim
            soluții durabile și sigure, realizate cu atenție la detalii și
            materiale de calitate premium.
          </p>

          <p class="big-description">
            Portofoliul nostru include peste X proiecte finalizate cu succes,
            fiecare realizat cu accent pe calitate impecabilă, respectarea
            termenelor și satisfacția clienților.
          </p>

          <p class="big-description">
            Lucrăm exclusiv cu specialiști calificați și utilizăm tehnologii
            moderne de izolare termică pentru a asigura eficiență energetică și
            rezistență îndelungată în fața factorilor externi și a condițiilor
            meteorologice.
          </p>

          <div class="partner-badge">
            <span class="partner-text"
              >Partener oficial pentru materiale premium:</span
            >
            <div class="partner-logo">
              <a
                href="https://baumit.md/"
                target="_blank"
                rel="noopener noreferrer">
                <img src="resources/logo_baumit.png" alt="Baumit Logo" />
              </a>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" class="contact-section">
        <div class="contact-container">
          <h2 class="big-title contact-title">Contacte</h2>

          <p class="contact-subtitle">
            <strong>Ai un proiect în minte?</strong> Contactează-ne pentru o
            colaborare de încredere.
          </p>

          <div class="contact-cards">
            <a href="tel:+37300000000" class="contact-card phone-card">
              <div class="contact-icon">
                <i class="fa-solid fa-phone-volume"></i>
              </div>
              <div class="contact-details">
                <span>Telefon</span>
                <strong>+373 XX XX-XX-XX</strong>
              </div>
            </a>

            <a
              href="mailto:gloria-cons@mail.ru"
              class="contact-card email-card">
              <div class="contact-icon">
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="contact-details">
                <span>E-mail</span>
                <strong>gloria-cons@mail.ru</strong>
              </div>
            </a>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="footer-top-row">
        <a href="index.php" class="footer-brand">
          <div class="footer-logo">
            <img
              src="https://www.fmt.se/wp-content/uploads/2023/02/logo-placeholder-image.png"
              alt="GLORIA CONS logo" />
          </div>
          <div class="footer-brand-text">
            <div class="footer-brand-name">GLORIA CONS</div>
            <div class="footer-tagline">Finisaje Durabile & Termoizolare</div>
          </div>
        </a>

        <div class="footer-contact-inline">
          <a href="tel:+37300000000" class="footer-contact-item">
            <i class="fa-solid fa-phone-volume"></i>
            <span>+373 XX XX-XX-XX</span>
          </a>
          <a href="mailto:gloria-cons@mail.ru" class="footer-contact-item">
            <i class="fa-solid fa-envelope"></i>
            <span>gloria-cons@mail.ru</span>
          </a>
        </div>
      </div>

      <div class="footer-middle-row">
        <ul class="footer-links-center">
          <li><a href="services.html">Servicii</a></li>
          <li><a href="projects.php">Proiecte</a></li>
          <li><a href="#about">Despre noi</a></li>
          <li><a href="#contact">Contacte</a></li>
        </ul>
      </div>

      <div class="footer-divider"></div>

      <div class="footer-bottom">
        <p class="footer-copyright">
          &copy; 2026 GLORIA CONS. Toate drepturile rezervate.
        </p>
      </div>
    </footer>
  </body>
</html>