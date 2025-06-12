<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class CacheScripts extends Command
{
    /**
     * php artisan make:command CacheScripts
     * php artisan cache:scripts
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:scripts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Combine and cache JS scripts into one file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $scripts = [
            // External CDN scripts
            // Bootstrap5 Sb-template CDN link
            'https://use.fontawesome.com/releases/v6.3.0/js/all.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js',
            'https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js',
            // Jquery Min Js
            'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
            // Jquery Autocomplete Link
            'https://code.jquery.com/ui/1.13.2/jquery-ui.js',
            // Ajax-Chart-Js 2.8.0 CDN Link
            'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js',
            'https://cdn.jsdelivr.net/npm/chart.js',
            // chart scrolling
            'https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns',
            'https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.1',
            // Chart-Pie Js 3D CDN Link
            'https://www.gstatic.com/charts/loader.js',
            // Summar-Note
            'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js',
            // Local assets Bootstrap5 Sb-template asset
            // Side-bar Script
            public_path('backend_asset/main_asset/js/sidebar-script-min.js'),
            // Main min js Script
            public_path('backend_asset/main_asset/js/all-min.js'),
            // Chart Demo js
            public_path('backend_asset/main_asset/demo/expenses-chart-line.js'),
            public_path('backend_asset/main_asset/demo/chart-bar-demo.js'),
            public_path('backend_asset/main_asset/demo/table-chart-demo.js'),
        ];

        $combinedJs = '';

        foreach ($scripts as $script) {
            $this->info("Processing: $script");

            try {
                if (filter_var($script, FILTER_VALIDATE_URL)) {
                    $response = Http::get($script);
                    if ($response->ok()) {
                        $combinedJs .= "/* Source: $script */\n" . $response->body() . "\n\n";
                    }
                } elseif (file_exists($script)) {
                    $combinedJs .= "/* File: $script */\n" . file_get_contents($script) . "\n\n";
                }
            } catch (\Exception $e) {
                $this->error("Failed to process: $script - " . $e->getMessage());
            }
        }

        // Manually save to public/cache/app.js
        $path = public_path('cache/app.js');
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        file_put_contents($path, $combinedJs);

        if (file_exists($path)) {
            $this->info('app.js cached successfully at: public/cache/app.js');
        } else {
            $this->error('Failed to create app.js');
        }
        
        //return 0;
    }
}
