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
        $mimeType ??= $this->getMimeType($file);
        $headers = ['Content-Type' => ($mimeType ? $mimeType.'; ' : '').'charset=utf-8'];

        if (config('app.debug')) {
            return response()->file($file, $headers);
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

        $headers['Expires'] = $this->httpDate($expires);
        $headers['Cache-Control'] = $cacheControl;
        $headers['Last-Modified'] = $this->httpDate($lastModified);

        return response()->file($file, $headers);
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
