const PAYMENT_FIELDS_DEFAULT = {
  displayCreditCard: true,
  displayCardIcon: true,
  displayCardExpirationDate: false,
  cardTypes: [],
  cardExpirationMaxYears: 10
}

export default ({ loadComponentAssets }) => ({
  options: PAYMENT_FIELDS_DEFAULT,
  card: null,
  cardIcon: null,
  cardType: null,
  cardNumberMask: null,
  cardExpirationDateMask: null,
  cardCVVMask: null,

  async setup (options = {}) {
    await loadComponentAssets('imask')

    this.options = { ...PAYMENT_FIELDS_DEFAULT, ...options }

    this.masks()

    this.change(this.$refs.cardNumber)
  },

  change (event) {
    this.cardType = this.cardNumberMask.masked.currentMask.cardtype

    if (this.options.cardTypes[this.cardType]) {
      this.cardIcon = this.options.cardTypes[this.cardType].icon
    }

    if (!this.card) return

    let expirationDate = this.options.displayCardExpirationDate
      ? this.$refs.cardExpirationDate.value
      : `${this.$refs.cardExpirationMonth.value}/${this.$refs.cardExpirationYear.value}`

    if (expirationDate === '/') {
      expirationDate = null
    }

    this.card.update({
      holderName: this.$refs.cardHolderName.value,
      number: this.$refs.cardNumber.value,
      type: this.cardType,
      expirationDate,
      cvv: this.$refs.cardCVV.value
    })

    this.focus(event)
  },

  focus (event) {
    if (!this.card) return

    this.card.flip(event.target === this.$refs.cardCVV)
  },

  masks () {
    this.cardNumberMask = this.createCardNumberMask(this.$refs.cardNumber)
    this.cardNumberMask.on('accept', event => this.change(event))

    if (this.options.displayCardExpirationDate) {
      this.cardExpirationDateMask = this.createCardExpirationDateMask(this.$refs.cardExpirationDate)
      this.cardExpirationDateMask.on('accept', event => this.change(event))
    }

    this.cardCVVMask = this.createCardCVVMask(this.$refs.cardCVV)
    this.cardCVVMask.on('accept', event => this.change(event))
  },

  createCardNumberMask (element) {
    return new window.IMask(element, {
      mask: Object.values(this.options.cardTypes),
      dispatch (appended, dynamicMasked) {
        const number = (dynamicMasked.value + appended).replace(/\D/g, '')

        for (let i = 0; i < dynamicMasked.compiledMasks.length; i++) {
          if (number.match(new RegExp(dynamicMasked.compiledMasks[i].regex)) != null) {
            return dynamicMasked.compiledMasks[i]
          }
        }
      }
    })
  },

  createCardExpirationDateMask (element) {
    return new window.IMask(element, {
      mask: 'MM{/}YYYY',
      blocks: {
        YYYY: {
          mask: window.IMask.MaskedRange,
          from: new Date().getFullYear(),
          to: new Date().getFullYear() + this.options.cardExpirationMaxYears
        },

        MM: {
          mask: window.IMask.MaskedRange,
          from: 1,
          to: 12
        }
      }
    })
  },

  createCardCVVMask (element) {
    return new window.IMask(element, {
      mask: '0000'
    })
  }
})
