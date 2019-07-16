<div class="change-language">
    <button id="language-dropdown" class="btn change-language-btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog"></i>
        <div class="flag-icon">
            <div class="flag flag-en"></div>
        </div>
    </button>
    <div class="dropdown-menu" aria-labelledby="language-dropdown">
        <h6 class="dropdown-header">Choose a language</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item <?= app()->getLocale() == 'en' ? 'active' : ''; ?>" href="<?= App\Support\url_query(request()->fullUrl(), ['lang' => 'en']); ?>">English</a>
        <a class="dropdown-item <?= app()->getLocale() == 'bg' ? 'active' : ''; ?>" href="<?= App\Support\url_query(request()->fullUrl(), ['lang' => 'bg']); ?>">Bulgarian</a>
    </div>
</div>
