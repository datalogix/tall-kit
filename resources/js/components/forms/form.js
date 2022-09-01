export default ({ loadable }) => ({
  ...loadable(),

  confirm: null,

  setup (confirm) {
    this.confirm = confirm
  },

  prepareSubmit (event) {
    const el = this.$refs.root ? this.$refs.root : this.$el

    if (el.getAttribute('wire:id')) {
      return event.preventDefault()
    }

    if (!this.confirm || window.confirm(this.conm)) {
      return this.startAndComplete(el.target || (event && event.ctrlKey))
    }

    return event.preventDefault()
  }
})
