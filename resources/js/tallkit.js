import AssetsManager from '@/managers/assets'
import ComponentsManager from '@/managers/components'
import components from '@/components'
import { dispatch } from '@/utils'

class TALLKit {
  constructor (options = {}, assets = {}) {
    this.ready = false
    this.options = options
    this.assets = new AssetsManager(assets)
    this.components = new ComponentsManager(components)
    this.preventReloads()
  }

  preventReloads () {
    if (window.Alpine || this.options.inject.alpine) {
      this.assets.loaded.push('alpine')
    }
  }

  async init () {
    if (this.ready) {
      return Promise.resolve()
    }

    this.ready = true

    if (typeof this.options.load_type === 'string') {
      await this.assets.init(this.options.load_type)
    }

    dispatch('tallkit:load')
  }

  asset (name) {
    return this.assets.get(name)
  }

  component (name) {
    return this.components.get(name)
  }
}

if (!window.TALLKit) {
  window.TALLKit = TALLKit
}

dispatch('tallkit:available')

export default TALLKit
