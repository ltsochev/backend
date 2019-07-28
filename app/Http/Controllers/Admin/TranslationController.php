<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Translation\Translator;
use function App\Support\seo;

class TranslationController extends Controller
{
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function getIndex(Request $request)
    {
        seo()->setTitle('LTsochev - Translation system');

        $phrases = $this->translator->all();

        return view('admin.translation.all')->with(compact('phrases'));
    }

    public function exportAll()
    {
        seo()->setTitle('LTsochev - Export system');

        foreach(['en', 'bg'] as $locale)
        {
            $this->translator->export($locale);
        }

        return 'дън';
    }
}
