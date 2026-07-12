<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    /** @use HasFactory<\Database\Factories\TodoFactory> */
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'todos';
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function uncheck(): self
    {
        $this->is_checked = false;
        $this->checked_at = null;
        return $this;
    }

    public function check(): self
    {
        $this->is_checked = true;
        $this->checked_at = Carbon::now()->toDateTimeString();
        return $this;
    }
}
