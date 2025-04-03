<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RestructureAdminViews extends Command
{
    protected $signature = 'admin:restructure-views 
                            {--force : Overwrite existing files}';

    protected $description = 'Restructure admin views into proper directories';

    public function handle()
    {
        $basePath = resource_path('views/admin');
        
        // 1. Create directories
        $directories = ['users', 'plots', 'applications'];
        foreach ($directories as $dir) {
            $path = "{$basePath}/{$dir}";
            
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
                $this->info("Created directory: {$path}");
            } else {
                $this->line("Directory exists: {$path}");
            }
        }

        // 2. Move index files
        $mappings = [
            'users.blade.php' => 'users/index.blade.php',
            'plots.blade.php' => 'plots/index.blade.php',
            'applications.blade.php' => 'applications/index.blade.php'
        ];

        foreach ($mappings as $old => $new) {
            $oldPath = "{$basePath}/{$old}";
            $newPath = "{$basePath}/{$new}";
            
            if (File::exists($oldPath)) {
                if (File::exists($newPath) && !$this->option('force')) {
                    $this->error("File exists: {$newPath} (use --force to overwrite)");
                    continue;
                }
                
                File::move($oldPath, $newPath);
                $this->info("Moved: {$old} → {$new}");
            } else {
                $this->line("Source file not found: {$oldPath}");
            }
        }

        // 3. Create edit views
        $editViews = [
            'users/edit.blade.php' => "@extends('layouts.admin')\n@section('content')\n<div class=\"container\">\n    <!-- Edit user form -->\n</div>\n@endsection",
            'plots/edit.blade.php' => "@extends('layouts.admin')\n@section('content')\n<div class=\"container\">\n    <!-- Edit plot form -->\n</div>\n@endsection",
            'applications/edit.blade.php' => "@extends('layouts.admin')\n@section('content')\n<div class=\"container\">\n    <!-- Edit application form -->\n</div>\n@endsection"
        ];

        foreach ($editViews as $path => $content) {
            $fullPath = "{$basePath}/{$path}";
            
            if (!File::exists($fullPath)) {
                File::put($fullPath, $content);
                $this->info("Created: {$path}");
            } else {
                $this->line("File exists: {$path}");
            }
        }

        $this->newLine();
        $this->info('✅ Admin view restructuring completed!');
        
        return 0;
    }
}