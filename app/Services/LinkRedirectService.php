<?php

namespace App\Services;

use App\Models\LinkVisit;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LinkRedirectService
{
    public function handle(string $shortCode, Request $request): RedirectResponse
    {
        $link = ShortLink::where('short_code', $shortCode)->firstOrFail();

        LinkVisit::create([
            'short_link_id' => $link->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->away($link->original_url);
    }
}
