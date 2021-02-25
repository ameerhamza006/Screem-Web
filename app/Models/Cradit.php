<?php

namespace App\Models;

use App\Util\FileHandling;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cradit extends Model
{
    use FileHandling;
    use HasFactory;

    public const TYPE_CREDIT = 'Credit';
    public const TYPE_DEBIT = 'Debit';

    public function getImageAttribute($value)
    {
        return $this->getObject($value);
    }

    public function getOriginalImageAttribute()
    {
        return $this->attributes['image'];
    }

    public function getType(): string
    {
        return ($this->credit === self::TYPE_CREDIT) ? self::TYPE_CREDIT : self::TYPE_DEBIT;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
