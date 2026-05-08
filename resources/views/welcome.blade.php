@extends('layouts.app')

@section('content')

  {{-- ── HERO ─────────────────────────────────────────────────────── --}}
  <section class="gl-hero">

    <div class="gl-mosaic" aria-hidden="true">
      @foreach ($photos->take(9) as $photo)
        <div class="gl-mosaic-cell" style="background-image: url('{{ $photo->getFirstMediaUrl() }}')"></div>
      @endforeach
    </div>

    <div class="gl-hero-overlay"></div>

    <div class="gl-hero-content">
      <span class="gl-hero-eyebrow">Gallery</span>
      <h1 class="gl-hero-headline">Every frame<br>tells a story.</h1>
      <p class="gl-hero-sub">A curated collection of exceptional photography.</p>
      <a href="#gallery" class="gl-hero-cta">Explore the collection</a>
    </div>

  </section>

  {{-- ── GALLERY ──────────────────────────────────────────────────── --}}
  <section class="gl-gallery" id="gallery">

    <div class="gl-controls">
      <form method="GET" action="{{ route('welcome') }}" class="gl-controls-form">
        <div class="gl-search-wrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="gl-search-icon" aria-hidden="true">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
          <input
            type="text"
            name="name"
            placeholder="Search photographs…"
            class="gl-search-input"
            value="{{ request('name') }}"
            onkeydown="if(event.keyCode==13)this.form.submit()"
          >
        </div>

        <select name="category_id" class="gl-select" onchange="this.form.submit()">
          <option value="">All categories</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected($category->id == request('category_id'))>{{ $category->name }}</option>
          @endforeach
        </select>
      </form>
    </div>

    <div class="gl-grid">
      @forelse ($photos as $photo)
        <div class="gl-item">
          <a data-fslightbox="gallery" href="{{ $photo->getFirstMediaUrl() }}" class="gl-item-link">
            <img src="{{ $photo->getFirstMediaUrl() }}" alt="{{ $photo->name }}" class="gl-item-img" loading="lazy">
            <div class="gl-item-hover">
              <span class="gl-item-name">{{ $photo->name }}</span>
              <span class="gl-item-meta">
                @if ($photo->category){{ $photo->category->name }} · @endif{{ $photo->user?->name }}
              </span>
            </div>
            @if ($photo->category)
              <span class="gl-item-badge">{{ $photo->category->name }}</span>
            @endif
          </a>
        </div>
      @empty
        <div class="gl-empty">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
            <circle cx="9" cy="9" r="2"></circle>
            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
          </svg>
          <p class="gl-empty-title">No photographs found.</p>
          <p class="gl-empty-sub">Try adjusting your search or filter.</p>
        </div>
      @endforelse
    </div>

    <div class="gl-pagination">
      {{ $photos->links() }}
    </div>

  </section>

@endsection
