<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class NewsTable extends Component
{
    use WithPagination;

    public int $perPage = 5;
    public string $search = '';

    public function render()
    {
        $articles = Article::search($this->search)->paginate($this->perPage);
        $distinctSources = $articles->pluck('source')->unique();


        return view('livewire.news-table', [
            'articles' => $articles,
            'distinctSources' => $distinctSources,
        ]);
    }
}
