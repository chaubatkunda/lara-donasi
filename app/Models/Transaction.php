<?php

namespace App\Models;

use App\Services\HashUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, HashUuid, SoftDeletes;

    protected $guarded = ['id'];

    // public function nominal(): Attribute
    // {
    //     return new Attribute(
    //         // get: fn ($value) => rupiah($value),
    //         set: fn ($value) => rupiah($value, true),
    //     );
    // }
    /**
     * Get the campaign that owns the Transaction
     *
     * @return BelongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '-'
        ]);
    }
}
