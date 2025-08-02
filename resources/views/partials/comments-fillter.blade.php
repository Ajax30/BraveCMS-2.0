<form class="d-flex align-items-center" method="get" action="{{ route('dashboard.comments') }}">
    <label for="commentsFilter" class="form-label mb-0 me-1">Filter</label>
    <select class="form-select form-select-sm" id="commentsFilter" name="filter" onchange="this.form.submit()">
        @foreach ($filters as $filter)
            <option value="{{ $filter->value }}"
                {{ (string) $active_filter === (string) $filter->value ? 'selected' : '' }}>{{ $filter->label }}
            </option>
        @endforeach
    </select>
</form>
