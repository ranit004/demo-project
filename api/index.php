<?php

/**
 * Vercel Serverless Entry Point for Laravel
 *
 * Vercel's filesystem is read-only except for /tmp.
 * This script creates the required writable directories in /tmp
 * before handing off to the standard Laravel public/index.php.
 */

// ── 1. Create writable storage directories in /tmp ──────────────────────────
$storagePath = '/tmp/storage';

$dirs = [
    "$storagePath/app/public",
    "$storagePath/framework/cache/data",
    "$storagePath/framework/sessions",
    "$storagePath/framework/views",
    "$storagePath/logs",
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// ── 2. Tell Laravel to use /tmp/storage ─────────────────────────────────────
putenv("APP_STORAGE=$storagePath");
$_ENV['APP_STORAGE']    = $storagePath;
$_SERVER['APP_STORAGE'] = $storagePath;

// ── 3. Boot the application ──────────────────────────────────────────────────
require __DIR__ . '/../public/index.php';
