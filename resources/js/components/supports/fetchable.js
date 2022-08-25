export default ({ loadable }) => ({
  ...loadable(),

  url: null,
  data: null,
  options: null,

  setup (url = null, data = {}, autoload = true, options = {
    method: 'get',
    headers: { Accept: 'application/json' },
    responseType: 'json'
  }) {
    this.clear()

    this.url = url
    this.data = data
    this.options = options

    if (this.url && autoload) {
      this.load()
    }

    if (!this.url && this.data) {
      this.complete()
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

      if (!response.ok) {
        throw new Error(response.statusText)
      }

      this.data = _options.responseType
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
