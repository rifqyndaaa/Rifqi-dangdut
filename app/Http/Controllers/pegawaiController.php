?php
// Data dummy pegawai
$name = "rifqi yanda";
$my_age = 18;
$hobbies = ["BELAJAR", "Bersepeda", "Memasak"];
$tgl_harus_wisuda = new DateTime("2025-12-31");
$today = new DateTime();
$time_to_study_left = $today->diff($tgl_harus_wisuda)->days * ($tgl_harus_wisuda > $today ? 1 : -1);
$current_semester = 7;
$info = "Segera selesaikan skripsi!";
$future_goal = "Menjadi Dosen";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <div class="card-header bg-primary text-white text-center mb-4">
            <h2 class="mb-0"><i class="bi bi-person-badge me-2"></i>Data Pegawai</h2>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-person me-2"></i>Nama:</strong> <?= $name ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-calendar-heart me-2"></i>Umur:</strong> <?= $my_age ?> tahun</span>
                </li>
                <li class="list-group-item">
                    <strong><i class="bi bi-heart me-2"></i>Hobi:</strong>
                    <ul class="mt-2 mb-0 ps-3">
                        <?php if (!empty($hobbies)): foreach($hobbies as $hobi): ?>
                            <li><?= $hobi ?></li>
                        <?php endforeach; else: ?>
                            <li>Tidak ada hobi tercatat.</li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-calendar-check me-2"></i>Tanggal Harus Wisuda:</strong>
                        <?= $tgl_harus_wisuda->format('d F Y') ?>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-clock me-2"></i>Sisa Hari Menuju Wisuda:</strong></span>
                    <span class="badge <?= ($time_to_study_left < 0) ? 'bg-danger' : 'bg-success' ?>">
                        <?= abs($time_to_study_left) ?> hari
                        <?= ($time_to_study_left < 0) ? '(Terlambat!)' : '(Masih Ada Waktu)' ?>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-book me-2"></i>Semester Saat Ini:</strong> <?= $current_semester ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-info-circle me-2"></i>Info:</strong></span>
                    <span class="text-danger fw-bold"><?= $info ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><i class="bi bi-star me-2"></i>Cita-cita:</strong> <?= $future_goal ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
