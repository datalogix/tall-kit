export default ({ loadable, loadImg }) => ({
  ...loadable(),

  setup () {
    if (!this.$refs.image) {
      return
    }

    this.start()

    loadImg(this.$refs.image.src)
      .then(() => this.complete())
      .catch((e) => this.fail(e))
  }
})
