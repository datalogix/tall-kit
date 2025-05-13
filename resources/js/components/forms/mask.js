export default ({ loadComponentAssets }) => ({
  imask: null,

  /*
  'imask' => [
    'https://cdn.jsdelivr.net/npm/imask@6/dist/imask.min.js',
],

  */
  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('imask')

    this.imask = window.IMask(this.$refs.element, options)
  }
})
