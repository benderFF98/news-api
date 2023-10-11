<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function handle(): void
    {
        $users = User::where('receive_newsletter', true)->get();
        $articles = Article::whereDate('created_at', '=', now())
            ->orWhereDate('created_at', '=', now()->subDays(1))
            ->get();

        foreach ($users as $user) {
            // Send newsletter to each user
            \Mail::to($user->email)->send(new \App\Mail\NewsletterMail($articles));
        }
    }
}
