export default ({ loadComponentAssets }) => ({
  flatpickr: null,

  /*
    TODO: assets
    public static function assets()
    {
        $lang = str_replace('_', '-', app()->getLocale());
        $locale = strtolower(substr($lang, 0, 2));

        return [
            'https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.css',
            'https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.js',
            $locale != 'en' ? 'https://cdn.jsdelivr.net/npm/flatpickr@4/dist/l10n/'.$locale.'.min.js' : '',
        ];
    }
    */

  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('flatpickr')

    this.flatpickr = window.flatpickr(this.$refs.input, options)
  }
})
