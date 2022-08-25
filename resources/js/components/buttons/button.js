export default ({ loadable }) => ({
  ...loadable(),

  click (event) {
    this.startAndComplete((this.$refs.root ? this.$refs.root : this.$el).target || (event && event.ctrlKey))
  }
})
