<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProjects extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $projects = Project::with('tags')->latest()->paginate(10);
        return view(
            'livewire.show-projects',
            compact('projects')
        );
    }
}
