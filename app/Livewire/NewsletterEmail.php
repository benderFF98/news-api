<?php

namespace App\Livewire;

use Livewire\Component;

class NewsletterEmail extends Component
{
    public function render()
    {
        return view('livewire.newsletter-email',
        [
            'articles' => \App\Models\Article::all(),
        ]);
    }
}
