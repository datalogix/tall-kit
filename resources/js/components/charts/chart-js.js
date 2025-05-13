export default ({ loadComponentAssets, timeout }) => ({
  chart: null,

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('chart-js')

    if (this.chart) {
      this.chart.destroy()
    }

    this.chart = new window.Chart(this.$refs.canvas, options)
  },

  update (event) {
    const props = Object.assign(...(event.detail ? [event.detail] : arguments))

    Object.keys(props).forEach((key) => {
      this.chart[key] = props[key]
    })

    this.chart.update()
  }
})
