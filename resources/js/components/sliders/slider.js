const SLIDER_DEFAULT = {
  selected: 0,
  loop: false,
  autoplay: false,
  interval: 10,
  controls: true,
  paginator: true,
  progressbar: false,
  stopOnOver: false
}

export default ({ interval, dispatch }) => ({
  options: SLIDER_DEFAULT,
  slides: [],
  current: null,
  timer: 0,
  i: null,

  setup (options = {}) {
    this.slides = [...this.$refs.slider.children]
    this.options = { ...SLIDER_DEFAULT, ...options }

    this.$watch('current', (value) => {
      this.stop()
      this.move(value)
      this.play()
    })

    this.current = this.options.selected
  },

  length () {
    return this.slides.length
  },

  is (index) {
    return index === this.current
  },

  isFirst () {
    return this.is(0)
  },

  isLast () {
    return this.is(this.length() - 1)
  },

  go (index) {
    if (index >= this.length()) {
      if (!this.options.loop) {
        return this.stop()
      }

      index = 0
    }

    if (index < 0) {
      if (!this.options.loop) {
        return this.stop()
      }

      index = this.length() - 1
    }

    this.current = index

    dispatch('go', this)
  },

  next () {
    this.go(this.current + 1)
  },

  prev () {
    this.go(this.current - 1)
  },

  first () {
    this.go(0)
  },

  last () {
    this.go(this.length() - 1)
  },

  hasPaginator () {
    return this.options.paginator && this.length() > 1
  },

  hasProgressbar () {
    return this.options.progressbar && this.options.autoplay
  },

  play () {
    clearInterval(this.i)

    if (!this.options.autoplay || (this.isLast() && !this.options.loop)) {
      return this.stop()
    }

    this.i = interval(() => {
      this.timer++

      dispatch('progress', this)

      if (this.timer >= (this.options.interval * 10)) {
        this.timer = 0
        this.next()
      }
    }, 100)

    dispatch('play', this)
  },

  pause () {
    clearInterval(this.i)

    dispatch('pause', this)
  },

  stop () {
    clearInterval(this.i)

    this.timer = 0

    dispatch('stop', this)
  },

  move (value) {
    this.$refs.slider.scrollLeft = (this.$refs.slider.scrollWidth / this.length()) * value
  },

  progressbarStyle () {
    return `width: ${(this.isLast() && !this.options.loop) ? 100 : (this.timer * 10 / this.options.interval)}%`
  },

  onMouseEnter () {
    if (this.options.stopOnOver) {
      this.pause()
    }
  },

  onMouseLeave () {
    if (this.options.stopOnOver) {
      this.play()
    }
  },

  prevClass () {
    return {
      hidden: !this.options.controls || this.length() <= 1 || (this.isFirst() && !this.options.loop)
    }
  },

  nextClass () {
    return {
      hidden: !this.options.controls || this.length() <= 1 || (this.isLast() && !this.options.loop)
    }
  }
})
