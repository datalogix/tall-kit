export default ({ loadable }) => ({
  ...loadable(),

  url: null,
  options: null,
  response: null,

  setup (url, autoload = true, options = {
    method: 'get',
    headers: { Accept: 'application/json' },
    responseType: 'json'
  }) {
    this.clear()

    this.url = url
    this.options = options
    this.response = null

    if (autoload) {
      this.load()
    }
  },

  async load (url = null, options = {}, silent = false) {
    const _url = url || this.url
    const _options = { ...this.options, ...options }

    if (!_url) {
      return
    }

    if (!silent) {
      this.start()
    }

    try {
      const response = await window.fetch(_url, _options)

      this.response = _options.responseType
        ? await response[_options.responseType]()
        : response

      this.complete()
    } catch (e) {
      this.fail(e)
    }
  },

  reload () {
    return this.load()
  },

  update (url = null, options = {}) {
    return this.load(url, options, true)
  }
})
