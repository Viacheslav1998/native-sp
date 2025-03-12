<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>тут плейсхолдер</title>
  <link rel="icon" type="image/png" href="<?= base_url('favicon/favicon-96x96.png') ?>">
  <link rel="icon" type="image/svg+xml" href="<?= base_url('favicon/favicon.svg') ?>">
  <link rel="shortcut icon" href="<?= base_url('favicon/favicon.ico') ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('favicon/apple-touch-icon.png') ?>">
  <link rel="stylesheet" href="<?= base_url('root/static/main.css') ?>">
  <script type="module" src="<?= base_url('/root/static/main.js') ?>"></script>
  <script defer src="<?= base_url('/root/custom/custom.js') ?>"></script>
</head>
<body>
  <div class="container bg-primary">

  <h1 class="text-primary">Привет, Bootstrap!</h1>
    <?php require_once __DIR__ . "../../parts/header.php"; ?>

      <h2>а тут какой то контент</h2>

    <?php require_once __DIR__ .  "../../parts/footer.php"; ?>
  </div>
</body>
</html>