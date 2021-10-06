export default ({ loadComponentAssets }) => ({
  filepond: null,

  async setup (options = {}) {
    const plugins = options.plugins || []

    for (const plugin of plugins) {
      await loadComponentAssets(plugin)
    }

    await loadComponentAssets('filepond')

    for (const plugin of plugins) {
      window.FilePond.registerPlugin(window[plugin])
    }

    // eslint-disable-next-line new-cap
    this.filepond = new window.FilePond.create(this.$refs.filepond, options)
  }
})
