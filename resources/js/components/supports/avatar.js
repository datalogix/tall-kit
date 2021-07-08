export default ({ loadable, loadImg }) => ({
  ...loadable(),

  setup () {
    if (this.$refs.image) {
      loadImg(this.$refs.image.src, () => this.complete())

      this.start()
    }
  }
})
