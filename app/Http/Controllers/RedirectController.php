<?php

namespace App\Http\Controllers;

use App\Models\LinkVisit;
use App\Models\ShortLink;
use App\Services\LinkRedirectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{

    public function __construct(protected LinkRedirectService $linkRedirectService)
    {
    }

    public function __invoke(string $shortCode, Request $request): RedirectResponse
    {
        return $this->linkRedirectService->handle($shortCode, $request);
    }
}
