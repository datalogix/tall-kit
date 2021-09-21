export default () => ({
  selected: null,
  tabs: [],

  setup (selected = null) {
    this.parseTabs()
    this.setSelected(selected)
  },

  parseTabs () {
    [...this.$refs.tabs.children]
      .filter(tab => tab.tagName.toLowerCase() === 'div')
      .forEach(tab => {
        const header = tab.querySelectorAll('[data-header]')[0]
        tab.removeChild(header)

        this.addTab(header.innerHTML, tab.outerHTML, tab.hasAttribute('disabled'))
        this.$refs.tabs.removeChild(tab)
      })
  },

  reloadTab (index) {
    if (!window.Alpine.initTree) {
      return
    }

    this.$nextTick(() => {
      window.Alpine.initTree(this.$refs.tabs.children[index].firstChild)
    })
  },

  addTab (header, content, disabled = false, index = null) {
    const tab = {
      header,
      content,
      disabled
    }

    if (index) {
      this.tabs.splice(index, 0, tab)

      return this.reloadTab(index)
    }

    this.reloadTab(this.tabs.push(tab))
  },

  removeTab (index) {
    this.tabs.splice(index, 1)
  },

  setSelected (tab) {
    if (Number.isInteger(parseInt(tab, 0))) {
      return this.setSelected(this.tabs[tab])
    }

    if (typeof tab !== 'object') {
      this.selected = null
      return
    }

    if (!tab.disabled) {
      this.selected = tab
    }
  },

  isSelected (tab) {
    return this.selected && this.selected === tab
  },

  isDisabled (tab) {
    return tab.disabled
  }
})
