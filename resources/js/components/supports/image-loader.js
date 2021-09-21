export default ({ loadable, loadImg }) => ({
  ...loadable(),

  setup () {
    this.start()

    if (!this.$refs.image) {
      return this.fail('Image not found')
    }

    loadImg(this.$refs.image.src)
      .then(() => this.complete())
      .catch((e) => this.fail(e))
  }
})
