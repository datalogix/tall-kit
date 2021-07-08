export default ({ toggleable }) => ({
  ...toggleable(),

  timeout: null,

  setup (event, milliseconds) {
    if (event) {
      return this.initEvent(event, milliseconds || 3000)
    }

    if (milliseconds) {
      return this.initTimeout(milliseconds)
    }

    this.open()
  },

  initEvent (event, milliseconds) {
    if (!window.Livewire) {
      console.warn('Livewire not found! See https://laravel-livewire.com/docs/installation')
      return
    }

    window.Livewire.on(event, () => {
      this.initTimeout(milliseconds)
    })
  },

  initTimeout (milliseconds) {
    clearTimeout(this.timeout)

    this.open()

    this.timeout = setTimeout(() => {
      this.close()
    }, milliseconds)
  }
})
