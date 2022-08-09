export default ({ loadComponentAssets }) => ({
  chart: null,

  async setup (options = {}) {
    await loadComponentAssets('frappe-charts')

    this.chart = new window.frappe.Chart(this.$refs.root ? this.$refs.root : this.$el, options)
  },

  update (event) {
    this.chart.update(...(event.detail ? [event.detail] : arguments))
  }
})
