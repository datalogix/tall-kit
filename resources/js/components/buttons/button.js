export default ({ loadable }) => ({
  ...loadable(),

  click (event) {
    this.start()

    const el = this.$refs.root ? this.$refs.root : this.$el

    if (el.target || (event && event.ctrlKey)) {
      this.$nextTick(() => this.complete())
    }
  }
})
