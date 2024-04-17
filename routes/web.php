<?php

use Illuminate\Support\Facades\Route;
use App\Models\BibleVerse;

Route::get("/", function () {
    return view("home");
});

Route::get("/about", function () {
    // return  ["foo" => "bar"];
    return view("about");
});

Route::get("/contact", function () {
    return view("contact");
});

Route::get("/bibleverse", function () {
    $bibleverses = BibleVerse::paginate(10);
    return view("bibleverse", [
        "person" => [
            "bibleverses" => $bibleverses
        ]
    ]);
});

Route::get("/bibleverse/create", function () {
    // return view("bibleverses/create");
    return view("bibleverse.create");
});

Route::get("/bibleverse/{id}", function ($id) {
    $bibleverse = BibleVerse::find($id);
    return view("bibleverse.index", ["bibleverse" => $bibleverse]);
});

Route::get("/bibleverse/{id}/edit", function ($id) {
    $bibleverse = BibleVerse::find($id);
    return view("bibleverse.edit", ["bibleverse" => $bibleverse]);
});

Route::patch("/bibleverse/{id}", function ($id) {
    //validate
    request()->validate([
        "verse" => ["required"],
        "content" => ["required"]
    ]);


    $bibleverse = BibleVerse::findOrFail($id); //in case manual update an unexisted id

    // $bibleverse->verse = request("verse");
    // $bibleverse->content = request("content");
    // $bibleverse->save();

    $bibleverse->update([
        "verse" => request("verse"),
        "content" => request("content")
    ]);

    return redirect("/bibleverse/" . $bibleverse->id);
});

Route::delete("/bibleverse/{id}", function ($id) {
    // Job::findOrFail($id)->delete();
    $bibleverse = BibleVerse::findOrFail($id);
    $bibleverse->delete();

    //redirect
    return redirect("/bibleverse");
});

Route::post('/bibleverse', function () {
    request()->validate([
        "verse" => ["required"],
        "content" => ["required"]
    ]);

    // dd(request()->all());
    BibleVerse::create([
        "verse" => request("verse"),
        "content" => request("content")
    ]);

    return redirect("/bibleverse");
});
