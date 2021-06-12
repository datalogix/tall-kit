export default ({ dispatchInputEvent, loadComponentAssets }) => ({
  async init () {
    await loadComponentAssets('trix')
  },

  change ($event) {
    const id = $event.target.getAttribute('input')
    const input = document.getElementById(id)

    dispatchInputEvent(input)
  }
})
