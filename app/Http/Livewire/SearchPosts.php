<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SearchPosts extends Component
{

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $this->emit("searching");

        return view('livewire.search-posts', [
            'results' => Post::search($this->search)->get()
        ]);
    }
}
