<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <form class="col-8">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Post Title">
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" class="form-control" id="tags" aria-describedby="tags" placeholder="foo,bar,baz">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" rows="100"></textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active">
                <label class="form-check-label" for="active">Active</label>
            </div>
            <div class="form-group">
                <label for="schedule">Schedule</label>
                <input type="text" class="form-control" id="schedule" aria-describedby="schedule" placeholder="12/03/2020">
                <small id="schedulehelp" class="form-text text-muted">Only works if not active, then it will be made active on the date</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>