<!-- resources/views/pages/drink.blade.php -->
@extends('layouts.main')

@section('title', 'Drink Menu')

@section('content')
<div id="drink" class="tm-page-content">
    <!-- Drink Menu Page -->
    <nav class="tm-black-bg tm-drinks-nav">
        <ul>
            @foreach ($categories as $index => $category)
                <li>
                    <a href="#" class="tm-tab-link {{ $index == 0 ? 'active' : '' }}" data-id="{{ $category->category }}">{{ ucfirst($category->category) }}</a>
                </li>
            @endforeach
        </ul>
    </nav>
    <!-- Dynamic Content -->
    @foreach ($categories as $index => $category)
        <div id="{{ $category->category }}" class="tm-tab-content" {{ $index != 0 ? 'style=display:none;' : '' }}>
            <div class="tm-tab-content-inner">
                <h2 class="tm-content-title">{{ ucfirst($category->category) }}</h2>
                <ul class="tm-list">
                    @foreach ($drinks[$category->category] ?? [] as $drink)
                        <li>
                            <h3>{{ $drink->title }}</h3>
                            <p>{{ $drink->content }}. Price: ${{ $drink->price }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.tm-tab-link');
    const contents = document.querySelectorAll('.tm-tab-content');

    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Remove active class from all links
            links.forEach(link => link.classList.remove('active'));
            // Add active class to the clicked link
            this.classList.add('active');

            // Hide all contents
            contents.forEach(content => content.style.display = 'none');
            // Show the content related to the clicked link
            const activeContent = document.getElementById(this.getAttribute('data-id'));
            activeContent.style.display = 'block';
        });
    });
});
</script>
@endsection
