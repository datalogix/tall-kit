export default ({ loadable, loadImg, timeout, dispatch }) => ({
  ...loadable(),

  setup () {
    this.load(this.$refs.output.src)
  },

  change (event) {
    if (!event.target.files.length) {
      return
    }

    this.load(URL.createObjectURL(event.target.files[0]))
  },

  edit () {
    this.$refs.input.click()
  },

  destroy (message) {
    if (!message || window.confirm(message)) {
      this.start()
      timeout(() => this.clear(), 100)
    }
  },

  load (src) {
    this.clear()

    if (!src) {
      return
    }

    this.start()

    loadImg(src, this.$refs.output)
      .then(() => {
        timeout(() => this.complete(), 100)
      })
      .catch((e) => {
        timeout(() => this.fail(e), 100)
      })
  }
})
