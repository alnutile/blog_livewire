<div>

    <input wire:model="search" type="text" placeholder="Search..">

    <h1>Search Results:</h1>

    <ul>
        @foreach($results as $result)
        <li>{{ $result->title }}</li>
        @endforeach
    </ul>
</div>