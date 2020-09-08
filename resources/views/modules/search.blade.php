<div class="template-search-form d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-close-btn" id="closeBtn">
                    <i class="pe-7s-close-circle" aria-hidden="true"></i>
                </div>
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <input type="search" name="q" id="search" placeholder="Search Your Favourite Dish ...">
                    <input type="submit" class="d-none" value="submit">
                </form>
            </div>
        </div>
    </div>
</div>