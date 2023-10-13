<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyNewsletterCommand extends Command
{
    protected $signature = 'send:daily-newsletter';

    protected $description = 'Command description';

    public function handle(): void
    {
        $articles = Article::whereCreatedAt(now()->subDay())->get();
        $groupedArticles = $articles->groupBy('source')->toArray();

        $users = User::whereReceiveNewsletter(true)->get();

        foreach ($users as $user) {
            Mail::to($user)->send(new \App\Mail\NewsletterMail($groupedArticles));
        }
    }
}
