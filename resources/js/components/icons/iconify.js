export default ({ loadComponentAssets }) => ({
  async setup () {
    /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/iconify-icon@1/dist/iconify-icon.min.js',
    ];
    */

    await loadComponentAssets('iconify')
  }
})
