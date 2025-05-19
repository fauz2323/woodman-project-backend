<?php

namespace App\Services;

use Ramsey\Uuid\Uuid;

final class FileServices
{
    function saveFile($file) {
        $name =Uuid::uuid4()->toString();
        $extension = $file->getClientOriginalExtension();
        $fileName = $name . '.' . $extension;
        $file->storeAs('files', $fileName ,'public');
        $filePath = 'files/' . $fileName;
        return $filePath;
    }
}
