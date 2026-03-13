<?php
require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\DB;

// Устанавливаем соединение с базой данных
DB::statement("UPDATE users SET is_admin = 1 WHERE id = 4");

echo "Пользователь с id 4 теперь администратор!";
