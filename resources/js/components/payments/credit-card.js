
const CREDIT_CARD_DEFAULT = {
  openned: true,
  types: [],
  holderName: null,
  number: null,
  type: null,
  expirationDate: null,
  cvv: null
}

export default ({ toggleable }) => ({
  ...toggleable(),

  options: CREDIT_CARD_DEFAULT,

  setup (options = {}) {
    this.card = this.$data
    this.options = { ...CREDIT_CARD_DEFAULT, ...options }
    this.openned = this.options.openned
  },

  get typeOptions () {
    return this.options.types[this.options.type]
      ? this.options.types[this.options.type]
      : this.options.types.unknown
  },

  update (options = {}) {
    this.options = { ...this.options, ...options }
  },

  style () {
    return this.isOpened()
      ? 'transform-style: preserve-3d;'
      : 'transform-style: preserve-3d; transform: rotateY(180deg);'
  },

  flip (isBack = false) {
    if (isBack) {
      this.close()
    } else {
      this.open()
    }
  }
})
