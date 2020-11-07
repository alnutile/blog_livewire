<div>

  <input wire:model="search" type="text" placeholder="Search posts by title...">
  <ul>
    @foreach($posts as $post)
    <li>{{ $post->title }}</li>
    @endforeach

    {{ $posts->links() }}
  </ul>
</div>