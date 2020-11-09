<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProjects extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['searching'];

    public $show = true;

    public function searching()
    {
        $this->show = false;
    }

    public function mount()
    {
        $search = request()->get("search");
        if ($search) {
            $this->searching();
        }
    }

    public function render()
    {
        $projects = Project::with('tags')->latest()->paginate(10);

        return view(
            'livewire.show-projects',
            compact('projects')
        );
    }
}
