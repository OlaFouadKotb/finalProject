<div id="drink" class="tm-page-content">
    <nav class="tm-black-bg tm-drinks-nav">
        <ul>
            <li><a href="#" class="tm-tab-link active" data-id="cold">Iced Coffee</a></li>
            <li><a href="#" class="tm-tab-link" data-id="hot">Hot Coffee</a></li>
            <li><a href="#" class="tm-tab-link" data-id="juice">Fruit Juice</a></li>
        </ul>
    </nav>

    <div id="cold" class="tm-tab-content active">
        <div class="tm-list">
            @foreach($icedC as $coffee)
            <div class="tm-list-item">
                <img src="{{ asset('assets/img/' . $coffee->image) }}" alt="{{ $coffee->title }}" class="tm-list-item-img">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{ $coffee->title }}<span class="tm-list-item-price">${{ number_format($coffee->price, 2) }}</span></h3>
                    <p class="tm-list-item-description">{{ $coffee->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="hot" class="tm-tab-content">
        <div class="tm-list">
            @foreach($hotCoffees as $coffee)
            <div class="tm-list-item">
                <img src="{{ asset('assets/img/' . $coffee->image) }}" alt="{{ $coffee->title }}" class="tm-list-item-img">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{ $coffee->title }}<span class="tm-list-item-price">${{ number_format($coffee->price, 2) }}</span></h3>
                    <p class="tm-list-item-description">{{ $coffee->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="juice" class="tm-tab-content">
        <div class="tm-list">
            @foreach($juices as $juice)
            <div class="tm-list-item">
                <img src="{{ asset('assets/img/' . $juice->image) }}" alt="{{ $juice->title }}" class="tm-list-item-img">
                <div class="tm-black-bg tm-list-item-text">
                    <h3 class="tm-list-item-name">{{ $juice->title }}<span class="tm-list-item-price">${{ number_format($juice->price, 2) }}</span></h3>
                    <p class="tm-list-item-description">{{ $juice->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
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