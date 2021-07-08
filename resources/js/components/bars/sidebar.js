export default ({ toggleable }) => ({
  ...toggleable(),

  name: null,
  breakpoint: null,

  setup (name, breakpoint) {
    this.name = name
    this.breakpoint = parseInt(breakpoint)

    this.check()
    this.watchValueToLocalStorage()
  },

  events: {
    '@resize.window' () {
      this.check()
    }
  },

  check () {
    if (!this.breakpoint) return

    if (window.innerWidth < this.breakpoint) {
      return this.close(false)
    }

    return this.handleOnLocalStorage()
  },

  handleOnLocalStorage () {
    if (!window.localStorage || !this.name) {
      return this.open(false)
    }

    const storage = window.localStorage.getItem(this.name)

    if (storage === null || storage === 'true') {
      return this.open(false)
    }

    return this.close(false)
  },

  watchValueToLocalStorage () {
    if (!window.localStorage || !this.name) return

    this.$watch('lastOpenned', (value) => {
      window.localStorage.setItem(this.name, value)
    })
  }
})
