import * as utils from '@/utils'

class Components {
  constructor (items = {}) {
    this.items = {}

    for (const item in items) {
      this.register(item, items[item])
    }
  }

  register (name, content = {}, overwrite = true) {
    if (overwrite || !this.has(name)) {
      this.items[name] = typeof content === 'function' ? content(utils) : content
    }
  }

  unregister (name) {
    if (this.has(name)) {
      delete this.items[name]
    }
  }

  has (name) {
    return Object.prototype.hasOwnProperty.call(this.items, name)
  }

  get (name) {
    return this.has(name) ? this.items[name] : {}
  }
}

export default Components
