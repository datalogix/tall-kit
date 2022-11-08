export default ({ loadable, loadImg }) => ({
  ...loadable(),

  setup () {
    this.loadImage(this.$refs.image ? this.$refs.image.src : null)
  },

  loadImage (src) {
    this.start()

    if (!src) {
      return this.fail('Image not found')
    }

    loadImg(src)
      .then(() => this.complete())
      .catch((e) => this.fail(e))
  }
})
