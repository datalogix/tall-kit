import { defu } from 'defu'

export default ({ loadComponentAssets, getCsrfToken, loadable }) => ({
  ...loadable(),

  filepond: null,

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

    this.complete()
  }
})
