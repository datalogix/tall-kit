export default ({ toggleable, screen, storagable }) => ({
  ...toggleable(),
  ...storagable(),

  breakpoint: null,

  setup (name, breakpoint) {
    this.setStorageName(name)
    this.breakpoint = breakpoint

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
