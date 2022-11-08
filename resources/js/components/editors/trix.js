export default ({ dispatchInputEvent, loadComponentAssets, loadable }) => ({
  ...loadable(),

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
