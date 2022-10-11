export default ({ toggleable, timeout, onLivewireEvent }) => ({
  ...toggleable(),

  setup (event, milliseconds) {
    if (event) {
      return onLivewireEvent(event, () => {
        this.open()

        timeout(() => this.close(), milliseconds)
      })
    }

    this.open()

    if (milliseconds) {
      timeout(() => this.close(), milliseconds)
    }
  }
})
