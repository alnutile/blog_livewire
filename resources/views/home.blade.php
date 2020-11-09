@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        @include("misc.banner")
    </div>
    <div class="row">
        <livewire:search-posts />
    </div>
    <div class="row">
        <livewire:show-projects />
    </div>
</div>
</div>
@endsection