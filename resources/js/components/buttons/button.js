export default ({ loadable }) => ({
  ...loadable(),

  click () {
    this.start()

    const el = this.$refs.root ? this.$refs.root : this.$el

    if (el.target) {
      this.$nextTick(() => this.complete())
    }
  }
})
