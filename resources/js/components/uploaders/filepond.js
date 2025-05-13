import { defu } from 'defu'

export default ({ loadComponentAssets, getCsrfToken, loadable }) => ({
  ...loadable(),

  filepond: null,

  /*
    TODO: assets
    public static function assets()
    {
        return [
            'https://cdn.jsdelivr.net/npm/filepond@4/dist/filepond.min.css',
            'https://cdn.jsdelivr.net/npm/filepond@4/dist/filepond.min.js',

            'FilePondPluginFileEncode' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-file-encode@2/dist/filepond-plugin-file-encode.min.js',
            ],

            'FilePondPluginFileMetadata' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-file-metadata@1/dist/filepond-plugin-file-metadata.min.js',
            ],

            'FilePondPluginFilePoster' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-file-poster@2/dist/filepond-plugin-file-poster.min.css',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-file-poster@2/dist/filepond-plugin-file-poster.min.js',
            ],

            'FilePondPluginFileRename' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-file-rename@1/dist/filepond-plugin-file-rename.min.js',
            ],

            'FilePondPluginFileValidateSize' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-size@2/dist/filepond-plugin-file-validate-size.min.js',
            ],

            'FilePondPluginFileValidateType' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-type@1/dist/filepond-plugin-file-validate-type.min.js',
            ],

            'FilePondPluginImageCrop' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-crop@2/dist/filepond-plugin-image-crop.min.js',
            ],

            'FilePondPluginImageEdit' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-edit@1/dist/filepond-plugin-image-edit.min.css',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-edit@1/dist/filepond-plugin-image-edit.min.js',
            ],

            'FilePondPluginImageExifOrientation' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-exif-orientation@1/dist/filepond-plugin-image-exif-orientation.min.js',
            ],

            'FilePondPluginImageFilter' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-filter@1/dist/filepond-plugin-image-filter.min.js',
            ],

            'FilePondPluginImagePreview' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.css',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.min.js',
            ],

            'FilePondPluginImageResize' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-resize@2/dist/filepond-plugin-image-resize.min.js',
            ],

            'FilePondPluginImageTransform' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-transform@3/dist/filepond-plugin-image-transform.min.js',
            ],

            'FilePondPluginImageValidateSize' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-validate-size@1/dist/filepond-plugin-image-validate-size.min.js',
            ],

            'FilePondPluginMediaPreview' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1/dist/filepond-plugin-media-preview.min.css',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1/dist/filepond-plugin-media-preview.min.js',
            ],

            'FilePondPluginGetFile' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-get-file@1/dist/filepond-plugin-get-file.min.css',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-get-file@1/dist/filepond-plugin-get-file.min.js',
            ],

            'FilePondPluginPdfPreview' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-pdf-preview@1/dist/filepond-plugin-pdf-preview.min.css',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-pdf-preview@1/dist/filepond-plugin-pdf-preview.min.js',
            ],

            'FilePondPluginImageOverlay' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-overlay@1/dist/filepond-plugin-image-overlay.min.css',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-image-overlay@1/dist/filepond-plugin-image-overlay.min.js',
            ],

            'FilePondPluginPdfConvert' => [
                'https://cdn.jsdelivr.net/npm/pdfjs-dist@3/build/pdf.min.js',
                'https://cdn.jsdelivr.net/npm/filepond-plugin-pdf-convert@1/dist/filepond-plugin-pdf-convert.min.js',
            ],

            'FilePondPluginCopyPath' => [
                'https://cdn.jsdelivr.net/npm/filepond-plugin-copy-path@1/dist/filepond-plugin-copy-path.min.js',
            ],
        ];
    }
    */

  async setup (options = {}) {
    this.start()

    const plugins = Object.values(options.plugins || [])

    for (const plugin of plugins) {
      await loadComponentAssets(plugin)
    }

    await loadComponentAssets('filepond')

    for (const plugin of plugins) {
      window.FilePond.registerPlugin(window[plugin])
    }

    const defaults = {
      server: {
        withCredentials: true,
        headers: getCsrfToken(true)
      }
    }

    // eslint-disable-next-line new-cap
    this.filepond = new window.FilePond.create(
      this.$refs.filepond,
      defu(options, defaults)
    )

    this.complete(100)
  }
})
