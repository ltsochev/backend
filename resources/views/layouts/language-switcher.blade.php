<div class="change-language">
    <button id="language-dropdown" class="btn change-language-btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog"></i>
        <div class="flag-icon">
            <div class="flag flag-{{app()->getLocale()}}"></div>
        </div>
    </button>
    <div class="dropdown-menu" aria-labelledby="language-dropdown">
        <h6 class="dropdown-header">Choose a language</h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item @if(app()->getLocale() == 'en') active @endif" href="<?= App\Support\url_query(request()->fullUrl(), ['lang' => 'en']); ?>">English</a>
        <a class="dropdown-item @if(app()->getLocale() == 'bg') active @endif" href="<?= App\Support\url_query(request()->fullUrl(), ['lang' => 'bg']); ?>">Bulgarian</a>
    </div>
</div>
