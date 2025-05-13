export default ({ dispatchInputEvent, loadComponentAssets }) => ({
  pikaday: null,

  /*
    TODO: assets
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/pikaday@1/css/pikaday.min.css',
        'https://cdn.jsdelivr.net/npm/pikaday@1/pikaday.min.js',

        'moment' => [
            'https://cdn.jsdelivr.net/npm/moment@2/moment.min.js',
        ],
    ];
    */

  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('moment')
    await loadComponentAssets('pikaday')

    this.pikaday = new window.Pikaday({
      field: this.$refs.input,
      onSelect: () => dispatchInputEvent(this.$refs.input),
      ...options
    })
  }
})
