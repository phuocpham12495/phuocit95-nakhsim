<?php

namespace App\Policies;

use App\Models\BibleVerse;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BibleVersePolicy
{

    public function edit(User $user, BibleVerse $bibleVerse): bool {
        return $bibleVerse->user->is($user);
    }

    public function update(User $user, BibleVerse $bibleVerse): bool {
        return $bibleVerse->user->is($user);
    }

    public function delete(User $user, BibleVerse $bibleVerse): bool {
        return $bibleVerse->user->is($user);
    }
}
