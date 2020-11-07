<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $posts = new Post();

        return view('livewire.show-posts', ['posts' => $posts->where("title", "LIKE", '%' . $this->search . '%')->paginate(20)]);
    }
}
