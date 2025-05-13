export default ({ dispatchInputEvent, loadComponentAssets, loadable }) => ({
  ...loadable(),

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/trix@1/dist/trix.min.css',
        'https://cdn.jsdelivr.net/npm/trix@1/dist/trix.min.js',
    ];
    */

  async setup () {
    this.start()

    await loadComponentAssets('trix')

    this.complete(100)
  },

  change ($event) {
    const id = $event.target.getAttribute('input')
    const input = document.getElementById(id)

    dispatchInputEvent(input)
  }
})
