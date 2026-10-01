<?php

// Mengarahkan jalur penyimpanan ke /tmp karena Vercel bersifat read-only
$_env_storage = '/tmp/storage';

if (!is_dir($_env_storage)) {
    mkdir($_env_storage, 0777, true);
    mkdir($_env_storage . '/framework', 0777, true);
    mkdir($_env_storage . '/framework/views', 0777, true);
    mkdir($_env_storage . '/framework/cache', 0777, true);
    mkdir($_env_storage . '/framework/sessions', 0777, true);
    mkdir($_env_storage . '/logs', 0777, true);
}

// Set Environment untuk jalur storage
putenv("APP_STORAGE={$_env_storage}");

require __DIR__ . '/../public/index.php';