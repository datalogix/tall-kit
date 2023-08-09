export default ({ loadable }) => ({
  ...loadable(),

  setup () {
    this.clear()
  },

  click (event) {
    this.startAndComplete(
      (this.$refs.root ? this.$refs.root : this.$el).target ||
      (event && event.ctrlKey) ||
      (event && event.metaKey)
    )
  }
})
