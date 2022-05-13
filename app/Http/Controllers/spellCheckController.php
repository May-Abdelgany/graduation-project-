<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpSpellcheck\Spellchecker\Aspell;
use PhpSpellcheck\Spellchecker\PHPPspell;
use PhpSpellcheck\Utils\CommandLine;

class spellCheckController extends Controller
{
    public  function __construct()
    {
        $this->middleware('auth:api');
    }
    public function check(Request $request){
        if ($request->user()->role == 'teacher') {
            $aspell = Aspell::create();
            // en_US aspell dictionary is available
            $misspellings = $aspell->check('mispell', ['en_US'], ['from_example']);
            foreach ($misspellings as $misspelling) {
                $misspelling->getWord(); // 'mispell'
                $misspelling->getLineNumber(); // '1'
                $misspelling->getOffset(); // '0'
                $misspelling->getSuggestions(); // ['misspell', ...]
                $misspelling->getContext(); // ['from_example']
        }

    }
}
}
