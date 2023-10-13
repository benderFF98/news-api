<?php

namespace App\Livewire;

use Livewire\Component;

class NewsletterEmail extends Component
{
    public function render()
    {
        $articles = \App\Models\Article::all();
        $groupedArticles = $articles->groupBy('source');

        return view('livewire.newsletter-email',
        [
            'sources' => $groupedArticles
        ]);
    }
}
