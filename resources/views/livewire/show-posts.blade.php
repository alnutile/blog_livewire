<div>

        <input wire:model="search" type="text" placeholder="Search posts by title...">

        <h3>Search for? {{ $search }} </h3>
<ul>
  @foreach($posts as $post)
    <li>{{ $post->title }}</li>
  @endforeach 

  {{ $posts->links() }}
</ul>
</div>
