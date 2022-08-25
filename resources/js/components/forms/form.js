export default ({ loadable }) => ({
  ...loadable(),

  confirm: null,

  setup (confirm) {
    this.confirm = confirm
  },

  prepareSubmit (event) {
    if (!this.confirm || window.confirm(this.confirm)) {
      return this.startAndComplete((this.$refs.root ? this.$refs.root : this.$el).target || (event && event.ctrlKey))
    }

    return event.preventDefault()
  }
})
