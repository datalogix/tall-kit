export default ({ loadComponentAssets }) => ({
  splide: null,

  async setup (options = {}) {
    await loadComponentAssets('splide')

    this.splide = new window.Splide(this.$refs.root ? this.$refs.root : this.$el, options).mount()
  }
})
