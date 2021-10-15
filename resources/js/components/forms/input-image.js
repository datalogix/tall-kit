export default ({ loadable, loadImg, timeout }) => ({
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
      timeout(() => {
        this.$refs.input.value = ''
        this.clear()
      }, 100)
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
        URL.revokeObjectURL(src)
        timeout(() => this.complete(), 100)
      })
      .catch((e) => {
        timeout(() => this.fail(e), 100)
      })
  }
})
