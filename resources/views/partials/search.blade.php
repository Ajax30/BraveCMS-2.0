<form method="GET" action="{{ route('dashboard.articles') }}" id="search_form" class="w-100 py-1 pe-md-2"
    accept-charset="utf-8">
    <div id="group-search" class="input-group">
        <input class="form-control form-control-dark" type="text" name="search" placeholder="Search articles..."
            aria-label="Search">
        <div class="input-group-append">
            <button class="btn" type="submit">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </div>
</form>
