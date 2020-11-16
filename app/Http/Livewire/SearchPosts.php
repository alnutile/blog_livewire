<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SearchPosts extends Component
{

    public $search = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function render()
    {
        $this->emit("searching");

        return view('livewire.search-posts', [
            'results' => Post::search($this->search)->get()
        ]);
    }
}
