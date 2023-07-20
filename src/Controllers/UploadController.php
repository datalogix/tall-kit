<?php

namespace TALLKit\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use TALLKit\Requests\UploadRequest;

class UploadController
{
    /**
     * Store.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UploadRequest $request)
    {
        $files = Collection::make($request->allFiles());

        if ($files->isEmpty()) {
            return response()->json([], 422);
        }

        $disk = $request->get('disk', config('tallkit.options.upload.disk'));
        $folder = trim(config('tallkit.options.upload.folder').'/'.$request->get('folder', ''), '/');

        $uploads = $files->map(function ($file) use ($folder, $disk) {
            $originalName = $file->getClientOriginalName();
            $extension = $file->clientExtension();
            $path = $file->store($folder, compact('disk'));
            $name = basename($path);
            $url = Storage::url($path);
            $location = $url;
            $fullUrl = asset($url);

            return compact('originalName', 'name', 'extension', 'path', 'url', 'fullUrl', 'location');
        });

        if ($uploads->count() > 1) {
            return response()->json($uploads);
        }

        return response()->json($uploads->first());
    }

    /**
     * Destroy.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        if ($path = target_get(json_decode($request->getContent(), true), ['path', 'uri', 'url', 'file'])) {
            Storage::delete($path);
        }

        return response()->json([], 204);
    }
}
