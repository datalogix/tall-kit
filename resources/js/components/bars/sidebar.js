export default ({ toggleable, screen, storagable }) => ({
  ...toggleable(),
  ...storagable(),

  name: null,
  breakpoint: null,

  setup (name, breakpoint) {
    this.name = name
    this.breakpoint = breakpoint
    this.setStorageName(this.name)

    this.check()

    this.$watch('lastOpenned', (value) => {
      this.setLocalStorage(value)
    })
  },

  check () {
    try {
      if (!screen(this.breakpoint)) {
        return this.close(false)
      }

      const value = this.getLocalStorage()

      return value === 'true' || value === null || value === undefined
        ? this.open(false)
        : this.close(false)
    } catch {
      //
    }
  }
})
