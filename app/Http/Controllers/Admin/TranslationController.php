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

        $phrases->load('translations');

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

    public function saveSingle(Request $request)
    {
        $model = $this->translator->getModelInstance();

        $translation = $model->find($request->get('phrase'));
        if (is_null($translation))
        {
            abort(404);
        }

        $translation->status = $request->get('status', 0);

        foreach ($request->get('locale', []) as $locale => $trans) {
            if ($translation->setLocaleTranslation($locale, $trans) !== false) {
                $translation->translated_at = \Carbon\Carbon::now();
                $this->translator->clearCache($translation->key, $locale);
            }
        }

        $translation->save();

        return response()->json(['status' => 10, 'message' => 'Job done.']);
    }

    public function deleteSingle(Request $request)
    {
        $model = $this->translator->getModelInstance();

        $translation = $model->find($request->get('phrase'));
        if (is_null($translation)) {
            abort(404);
        }

        $translation->translations()->delete();
        $translation->delete();

        return response()->json(['status' => 10, 'message' => 'job done']);
    }
}
