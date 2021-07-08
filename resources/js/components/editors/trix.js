export default ({ dispatchInputEvent, loadComponentAssets }) => ({
  async setup () {
    await loadComponentAssets('trix')
  },

  change ($event) {
    const id = $event.target.getAttribute('input')
    const input = document.getElementById(id)

    dispatchInputEvent(input)
  }
})
