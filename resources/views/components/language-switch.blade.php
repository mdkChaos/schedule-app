<form action="{{ route('language.switch') }}" method="POST" class="d-inline-block">
    @csrf
    <div class="input-group input-group-sm align-items-center">

        <select name="locale" onchange="this.form.submit()" class="form-select border-0 bg-light">
            <option value="pl" {{ app()->getLocale() == 'pl' ? 'selected' : '' }}>PL</option>
            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
            <option value="uk" {{ app()->getLocale() == 'uk' ? 'selected' : '' }}>UA</option>
        </select>
    </div>
</form>
