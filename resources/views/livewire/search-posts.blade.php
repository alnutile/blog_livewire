<div class="container-fluid">
    <div class="row">
        <input style="width: 100%;" autofocus wire:model="search" type="text" class="form-control form-control-lg" placeholder="Search Blog Posts">
    </div>

    <div class="row pl-3 pr-3">
        @if(!empty($results))
        <div class="row">
            @foreach($results as $result)
            <div class="card w-50">
                <div class="card-body">
                    <h5 class="card-title">{{ $result->title }}</h5>
                    <p class="card-text">{!! \Str::limit(strip_tags($result->rendered_body), 100) !!}</p>
                    <p>
                        Tags:
                        @foreach($result->tags as $tag)
                        <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>@if(!$loop->last),@endif
                        @endforeach
                    </p>
                    <a href="/posts/{{ $result->id }}" class="card-link">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>