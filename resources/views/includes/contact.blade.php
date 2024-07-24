<div id="contact" class="tm-page-content">
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <div class="tm-black-bg tm-contact-text-container">
        <h2 class="tm-text-primary">Contact Wave</h2>
        <p>Wave Cafe Template has a video background. You can use this layout for your websites. Please contact Tooplate's Facebook page. Tell your friends about our website.</p>
    </div>

    <div class="tm-black-bg tm-contact-form-container tm-align-right">
        <form action="{{ route('contact.send') }}" method="POST" id="contact-form">
            @csrf
            <div class="tm-form-group">
                <input type="text" name="name" class="tm-form-control" placeholder="Name" required />
            </div>
            <div class="tm-form-group">
                <input type="email" name="email" class="tm-form-control" placeholder="Email" required />
            </div>
            <div class="tm-form-group tm-mb-30">
                <textarea rows="6" name="message" class="tm-form-control" placeholder="Message" required></textarea>
            </div>
            <div>
                <button type="submit" class="tm-btn-primary tm-align-right">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>