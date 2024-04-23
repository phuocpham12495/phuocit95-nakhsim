<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BibleVerse;

class BibleVerseController extends Controller
{
    public function index() {
        $bibleverses = BibleVerse::paginate(10);
        return view("bibleverse.index", ["bibleverses" => $bibleverses]);
    }

    public function create() {
        return view("bibleverse.create");
    }

    public function store() {
        request()->validate([
            "verse" => ["required"],
            "content" => ["required"]
        ]);

        BibleVerse::create([
            "verse" => request("verse"),
            "content" => request("content")
        ]);

        return redirect("/bibleverses");
    }

    public function show(BibleVerse $bibleverse) {
        return view("bibleverse.show", ["bibleverse" => $bibleverse]);
    }

    public function edit(BibleVerse $bibleverse) {
        return view("bibleverse.edit", ["bibleverse" => $bibleverse]);
    }

    public function update(BibleVerse $bibleverse) {
        //validate
        request()->validate([
            "verse" => ["required"],
            "content" => ["required"]
        ]);

        $bibleverse->update([
            "verse" => request("verse"),
            "content" => request("content")
        ]);

        return redirect("/bibleverses/" . $bibleverse->id);
    }

    public function destroy(BibleVerse $bibleverse) {
        $bibleverse->delete();

        //redirect
        return redirect("/bibleverses");
    }
}
