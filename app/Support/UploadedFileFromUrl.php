<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Http\UploadedFile;

class UploadedFileFromUrl extends UploadedFile
{
    public static function fromUrl(
        string $url,
        string $originalName,
        ?string $mimeType = null,
        ?int $error = null,
        bool $test = false,
    ): self {
        if (! $stream = @fopen($url, 'rb')) {
            throw new \RuntimeException($url);
        }

        $file = tempnam(sys_get_temp_dir(), 'uploaded-file-');

        file_put_contents($file, $stream);

        return new self(
            $file,
            $originalName,
            $mimeType,
            $error,
            $test,
        );
    }
}
