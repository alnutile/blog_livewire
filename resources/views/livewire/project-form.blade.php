<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <form class="col-8" wire:submit.prevent="save">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" wire:model="title" id="title" aria-describedby="title" placeholder="Post Title">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" wire:model="tags" class="form-control" id="tags" aria-describedby="tags" placeholder="foo,bar,baz">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" wire:model="body" id="body" rows="100"></textarea>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>