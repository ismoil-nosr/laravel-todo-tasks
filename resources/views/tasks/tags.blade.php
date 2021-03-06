@php
    $tags = $tags ?? collect();
@endphp

@if ($tags->isNotEmpty())
    @foreach ($tags as $tag)
        <a href="/tasks/tags/{{ $tag->getRouteKey() }}" class="badge badge-secondary">{{ $tag->name }}</a>
    @endforeach
@endif