
<div class="container">
    <div id="drink" class="tm-page-content">
        <nav class="tm-black-bg tm-drinks-nav">
            <ul>
                @foreach($categories as $category)
                <li>
                    <a href="#" class="tm-tab-link {{ $loop->first ? 'active' : '' }}" data-id="category-{{ $category->id }}">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
        </nav>

        @foreach($categories as $category)
        <div id="category-{{ $category->id }}" class="tm-tab-content {{ $loop->first ? 'active' : '' }}">
            <div class="tm-list">
                @foreach($category->beverages as $beverage)
                <div class="tm-list-item">          
                    <img src="{{ asset('assets/img/' . $beverage->image) }}" alt="{{ $beverage->title }}" class="tm-list-item-img">
                    <div class="tm-black-bg tm-list-item-text">
                        <h3 class="tm-list-item-name">{{ $beverage->title }}<span class="tm-list-item-price">${{ $beverage->price }}</span></h3>
                        <p class="tm-list-item-description">{{ $beverage->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tm-tab-link");
    const contents = document.querySelectorAll(".tm-tab-content");

    tabs.forEach(tab => {
        tab.addEventListener("click", function(event) {
            event.preventDefault();
            const id = this.getAttribute("data-id");

            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");

            contents.forEach(content => {
                if (content.id === id) {
                    content.classList.add("active");
                } else {
                    content.classList.remove("active");
                }
            });
        });
    });
});
</script>
