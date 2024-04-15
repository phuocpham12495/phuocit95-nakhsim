<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

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

Route::get("/me", function () {
    //$jobs = Job::all();
    // $jobs = Job::with("coWorker")->get();
    $jobs = Job::with("coWorker")->paginate(5);
    // $jobs = Job::with("coWorker")->simplePaginate(3);
    // $jobs = Job::with("coWorker")->cursorPaginate(3);
    // dd($job[0]->title);
    return view("me", [
        "person" => [
            "name" => "A sample name",
            "university" => "A sample university",
            "jobs" => $jobs
        ]
    ]);
});

Route::get("/me/jobs/create", function () {
    // return view("job/create");
    return view("job.create");
});

Route::get("/me/jobs/{id}", function ($id) {
    // $job = \Illuminate\Support\Arr::first($jobs, function($job) use ($id) {
    //     return $job["id"] == $id;
    // });

    $job = Job::find($id);
    return view("job.index", ["job" => $job]);
});

Route::get("/me/jobs/{id}/edit", function ($id) {
    $job = Job::find($id);
    return view("job.edit", ["job" => $job]);
});

Route::patch("/me/jobs/{id}", function ($id) {
    //validate
    request()->validate([
        "title" => ["required", "min:3"],
        "company" => ["required"]
    ]);
    //authorize

    //update the job
    $job = Job::findOrFail($id); //in case manual update an unexisted id

    // $job->title = request("title");
    // $job->company = request("company");
    // $job->save();

    $job->update([
        "title" => request("title"),
        "company" => request("company")
    ]);

    //persist
    //redirect to the job page
    return redirect("/me/jobs/" . $job->id);
});

Route::delete("/me/jobs/{id}", function ($id) {
    //authorize
    //delete the job
    // Job::findOrFail($id)->delete();
    $job = Job::findOrFail($id);
    $job->delete();

    //redirect
    return redirect("/me");
});

Route::post('/me/jobs', function () {
    request()->validate([
        "title" => ["required", "min:3"],
        "company" => ["required"]
    ]);

    // dd(request()->all());
    Job::create([
        "title" => request("title"),
        "company" => request("company"),
        "co_worker_id" => 1
    ]);

    return redirect("/me");
});
