export default ({ loadComponentAssets }) => ({
  async setup () {
    await loadComponentAssets('fortawesome')
  }
})
