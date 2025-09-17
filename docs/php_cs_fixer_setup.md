# Fixer + pre-push hook

## 1️⃣ Установка PHP-CS-Fixer

Установи через Composer (в dev-зависимости):

```bash
composer require --dev friendsofphp/php-cs-fixer
```

Проверь, что он работает:

```bash
vendor/bin/php-cs-fixer --version
```

> Должен показать версию.

---

## 2️⃣ Создание конфига `.php-cs-fixer.php`

В корне проекта создай файл `.php-cs-fixer.php` со следующим содержимым:

```php
<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__ . '/app', __DIR__ . '/routes', __DIR__ . '/database']); // папки, которые проверяем

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'single_quote' => true,
        'no_unused_imports' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
    ])
    ->setFinder($finder);
```

---

## 3️⃣ Ручной запуск для проверки

Проверить, что всё ок:

```bash
vendor/bin/php-cs-fixer fix --dry-run --diff -v
```

> Покажет, какие файлы нарушают правила.

Исправить всё:

```bash
vendor/bin/php-cs-fixer fix -v
```

---

## 4️⃣ Настройка pre-push hook

Создай хук:

```bash
nano .git/hooks/pre-push
```

Вставь в него:

```sh
#!/bin/sh

echo "🔧 Запускаю PHP-CS-Fixer..."
vendor/bin/php-cs-fixer fix --using-cache=yes -v

if ! git diff --quiet; then
    echo "⚠️ Код был отформатирован. Добавьте изменения и закоммитьте снова!"
    exit 1
fi

echo "✅ Всё чисто, пуш продолжается."
```

Сделай исполняемым:

```bash
chmod +x .git/hooks/pre-push
```

---

## 5️⃣ Тест

Сделай тестовый коммит:

```bash
git commit --allow-empty -m "test cs-fixer"
```

Попробуй пуш:

```bash
git push
```

---

## 6️⃣ (Опционально) Настройка в CI

Чтобы проверка срабатывала даже если кто-то забудет локально:

```yaml
# .github/workflows/php-cs-fixer.yml
name: PHP-CS-Fixer

on: [push, pull_request]

jobs:
  phpcsfixer:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
      - run: composer install
      - run: vendor/bin/php-cs-fixer fix --dry-run --diff -v
```

