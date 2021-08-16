export default ({ dispatch, cookieable, timeout }) => ({
  ...cookieable(),

  name: null,
  expires: null,

  setup (name, expires) {
    this.name = name
    this.expires = expires

    this.setCookieName(this.name)
    this.open()
  },

  open () {
    if (!this.getCookie()) {
      timeout(() => dispatch(`${this.name}-modal-open`))
    }
  },

  close () {
    this.setCookie(true, this.expires)

    dispatch(`${this.name}-modal-close`)
  }
})
