export default ({ loadComponentAssets }) => ({
  fullCalendar: null,

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.css',
        'https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.js',
        'https://cdn.jsdelivr.net/npm/fullcalendar@5/locales-all.min.js',
    ];
    */

  async setup (options) {
    await loadComponentAssets('full-calendar')

    this.fullCalendar = new window.FullCalendar.Calendar(this.$refs.root ? this.$refs.root : this.$el, options)
    this.fullCalendar.render()
  }
})
