<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinkVisit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['short_link_id', 'ip_address', 'visited_at'];

    protected $casts = ['visited_at' => 'datetime'];

    public function shortLink(): BelongsTo
    {
        return $this->belongsTo(ShortLink::class);
    }
}
