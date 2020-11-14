<div class="ml-4 mt-4">
    @if($show == true)
    <div class="row row-cols-1 row-cols-md-3 mx-auto">
        @foreach($projects as $project)
        <div class="col mb-2">
            <div class="card text-white bg-primary" style="width: 18rem;">
                <div class="card-body">
                    <a href="{{ $project->id }}">
                        <img src="{{ $project->photo_file_name }}" class="card-img-top" alt="...">
                    </a>
                    <h5 class="card-title mt-2">
                        <a href="{{ $project->id }}" class="text-white">{{ $project->title }}</a></h5>
                    <p class="card-text">
                        {!! \Str::limit($project->rendered_body, 100) !!}
                    </p>
                    <svg class="bi" width="14" height="14" fill="currentColor">
                        <use xlink:href="/bootstrap-icons.svg#tags-fill" />
                    </svg>
                    @foreach($project->tags as $tag)
                    <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>@if(!$loop->last),@endif
                    @endforeach
                </div>
            </div>
        </div> @endforeach
        <!-- end the cards -->
    </div>

    <div class="container">
        <div class="row">
            <div class="mx-auto">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
    @endif
</div>