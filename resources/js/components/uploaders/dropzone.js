import { defu } from 'defu'

export default ({ loadComponentAssets, getCsrfToken, loadable }) => ({
  ...loadable(),

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
