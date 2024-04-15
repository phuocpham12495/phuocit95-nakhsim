<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// class Job {
//     public static function all() {
//         return [
//             [
//                 "id" => 1,
//                 "title" => "Software Developer",
//                 "company" => "Capgemini"
//             ],
//             [
//                 "id" => 2,
//                 "title" => "Software Developer",
//                 "company" => "Sutrix Solutions"
//             ],
//             [
//                 "id" => 3,
//                 "title" => "Software Developer",
//                 "company" => "Hitachi Vantara"
//             ],
//         ];
//     }

//     public static function find(int $id): array {
//         $job = Arr::first(static::all(), fn($job) => $job["id"] == $id);
//         if (!$job) {
//             abort(404);
//         }
//         return $job;
//     }
// }

class Job extends Model {
    protected $table = "job_listings";
    // protected $fillable = ["title", "company", "co_worker_id"];
    protected $guarded = [];

    use HasFactory;

    public function coWorker() {
        return $this->belongsTo(\App\Models\CoWorker::class);
    }

    public function tags() {
        return $this->belongsToMany(\App\Models\Tag::class, foreignPivotKey: "job_listing_id");
    }
}
