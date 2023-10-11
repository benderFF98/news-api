<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class ClearOldNewsCommand extends Command
{
    protected $signature = 'clear:old-news';

    protected $description = 'This command clear the old articles from the database';

    public function handle(): void
    {
        Article::whereDate('created_at', '<', now()->subDays(7))->delete();
    }
}
