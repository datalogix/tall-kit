export default ({ loadable, loadImg, timeout }) => ({
  ...loadable(),

  setup () {
    if (this.$refs.output) {
      this.load(this.$refs.output.src)
    }
  },

  change (event) {
    if (!event.target.files.length) {
      return
    }

    this.load(URL.createObjectURL(event.target.files[0]))
  },

  edit () {
    if (this.$refs.input) {
      this.$refs.input.click()
    }
  },

  remove (message) {
    if (!message || window.confirm(message)) {
      this.start()

      timeout(() => {
        if (this.$refs.input) {
          this.$refs.input.value = ''
        }

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
        this.complete(100)
      })
      .catch((e) => {
        this.fail(e, 100)
      })
  }
})
