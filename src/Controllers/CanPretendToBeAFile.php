<?php

namespace TALLKit\Controllers;

use Illuminate\Support\Str;

trait CanPretendToBeAFile
{
    /**
     * Pretend response is file.
     *
     * @param  string  $files
     * @param  string|null  $mimeType
     * @return \Illuminate\Http\Response
     */
    public function pretendResponseIsFile($file, $mimeType = null)
    {
        $mimeType = $mimeType || $this->getMimeType($file);

        if (config('app.debug')) {
            return response()->file($file, [
                'Content-Type' => ($mimeType ? $mimeType.'; ' : '').'charset=utf-8',
            ]);
        }

        $expires = strtotime('+1 year');
        $lastModified = filemtime($file);
        $cacheControl = 'public, max-age=31536000';

        if ($this->matchesCache($lastModified)) {
            return response()->make('', 304, [
                'Expires' => $this->httpDate($expires),
                'Cache-Control' => $cacheControl,
            ]);
        }

        return response()->file($file, [
            'Content-Type' => ($mimeType ? $mimeType.'; ' : '').'charset=utf-8',
            'Expires' => $this->httpDate($expires),
            'Cache-Control' => $cacheControl,
            'Last-Modified' => $this->httpDate($lastModified),
        ]);
    }

    /**
     * Matches cache.
     *
     * @param  int|false  $lastModified
     * @return bool
     */
    protected function matchesCache($lastModified)
    {
        $ifModifiedSince = target_get($_SERVER, 'HTTP_IF_MODIFIED_SINCE', '');

        return @strtotime($ifModifiedSince) === $lastModified;
    }

    /**
     * Http date.
     *
     * @param  int|false  $timestamp
     * @return string
     */
    protected function httpDate($timestamp)
    {
        return sprintf('%s GMT', gmdate('D, d M Y H:i:s', $timestamp));
    }

    /**
     * Get mime type.
     *
     * @param  string  $file
     * @return string|null
     */
    protected function getMimeType($file)
    {
        if (Str::endsWith($file, '.css')) {
            return 'text/css';
        }

        if (Str::endsWith($file, '.js')) {
            return 'application/javascript';
        }
    }
}
