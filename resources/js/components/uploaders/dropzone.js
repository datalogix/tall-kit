import { defu } from 'defu'

export default ({ loadComponentAssets, getCsrfToken, loadable }) => ({
  ...loadable(),

  /*
    TODO: assets
    public static function assets()
    {
        return [
            'https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone.css',
            'https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.2/dist/dropzone-min.js',
        ];
    }
    */

  dropzone: null,

  async setup (options = {}) {
    this.start()

    await loadComponentAssets('dropzone')

    const defaults = {
      withCredentials: true,
      headers: getCsrfToken(true)
    }

    this.dropzone = new window.Dropzone(
      this.$refs.dropzone,
      defu(options, defaults)
    )

    this.complete(100)
  }
})
