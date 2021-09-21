export default ({ dispatch, cookieable, timeout }) => ({
  ...cookieable(),

  setup (name, expires = null) {
    this.setCookieName(name)
    this.setCookieExpires(expires)
    this.open()
  },

  open () {
    if (this.getCookie()) {
      return
    }

    timeout(() => dispatch(`${this.getCookieName()}-modal-open`, this))
  },

  close () {
    this.setCookie(true)

    dispatch(`${this.getCookieName()}-modal-close`, this)
  }
})
