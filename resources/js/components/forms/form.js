export default ({ loadable }) => ({
  ...loadable(),

  confirm: null,

  setup (confirm) {
    this.confirm = confirm
  },

  prepareSubmit (event) {
    if (!this.confirm || window.confirm(this.confirm)) {
      return this.start()
    }

    return event.preventDefault()
  }
})
