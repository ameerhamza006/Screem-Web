<?php

declare(strict_types=1);

namespace App\Util;

use Illuminate\Support\Facades\Storage;

trait FileHandling
{
    function getObject($object)
    {
        return Storage::disk('uploads')->url($object);
    }

    function uploadObject($path, $file)
    {
        return Storage::disk('uploads')->put($path, $file, 'public');
    }

    function deleteObject($path)
    {
        Storage::disk('uploads')->delete($path);
    }
}
