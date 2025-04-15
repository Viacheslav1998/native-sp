<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'AdminPanel' ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('favicon/favicon-96x96.png') ?>">
  <link rel="icon" type="image/svg+xml" href="<?= base_url('favicon/favicon.svg') ?>">
  <link rel="shortcut icon" href="<?= base_url('favicon/favicon.ico') ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('favicon/apple-touch-icon.png') ?>">
  <link rel="stylesheet" href="<?= base_url('root/static/main.css') ?>">
  <link rel="stylesheet" href="<?= base_url('root/custom/admin.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <script defer type="module" src="<?= base_url('/root/static/main.js') ?>"></script>
  <script defer type="module" src="<?= base_url('/root/custom/admin.js') ?>"></script>
</head>
<body>
  <div class="container">
    <?php require __DIR__ . '../../admin/parts/header.php'; ?>

    <main>
      <?php require $content; ?>
    </main>

    <?php require __DIR__ .  '../../admin/parts/footer.php'; ?>
  </div>
</body>
</html>