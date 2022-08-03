export default ({ loadable, timeout }) => ({
  ...loadable(),

  click (event) {
    this.start()

    const el = this.$refs.root ? this.$refs.root : this.$el

    if (el.target || (event && event.ctrlKey)) {
      timeout(() => this.complete())
    }
  }
})
