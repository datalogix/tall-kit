export default () => ({
  name: null,

  setup (name) {
    this.name = name
  },

  select (checked = true) {
    if (!this.name) return

    document.getElementsByName(this.name)
      .forEach(e => {
        e.checked = checked
      })
  }
})
