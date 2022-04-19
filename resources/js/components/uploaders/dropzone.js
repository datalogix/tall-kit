import { defu } from 'defu'

export default ({ loadComponentAssets, getCsrfToken }) => ({
  dropzone: null,

  async setup (options = {}) {
    await loadComponentAssets('dropzone')

    const defaults = {
      url: '/',
      withCredentials: true,
      headers: getCsrfToken(true)
    }

    this.dropzone = new window.Dropzone(
      this.$refs.dropzone,
      defu(options, defaults)
    )
  }
})
