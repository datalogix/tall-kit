export default ({ loadComponentAssets }) => ({

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6/css/all.min.css',
    ];
    */

  async setup () {
    await loadComponentAssets('fortawesome')
  }
})
