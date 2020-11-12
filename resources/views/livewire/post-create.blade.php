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
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active" wire:model="active">
                <label class="form-check-label" for="active">Active</label>
            </div>
            <div class="form-group">
                <label for="schedule">Schedule</label>
                <input type="text" class="form-control" id="schedule" aria-describedby="schedule" wire:model="schedule" placeholder="2020-10-15 09:30:00">
                <small id="schedulehelp" class="form-text text-muted">Only works if not active, then it will be made active on the date.
                    <a href="https://carbon.nesbot.com/docs/#api-setters" target="_blank">Uses Carbon parse</a>

                </small>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>