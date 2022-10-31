export default ({ loadComponentAssets }) => ({
  fullCalendar: null,

  async setup (options) {
    await loadComponentAssets('full-calendar')
    await loadComponentAssets('full-calendar-locales')

    this.fullCalendar = new window.FullCalendar.Calendar(this.$refs.root ? this.$refs.root : this.$el, options)
    this.fullCalendar.render()
  }
})
