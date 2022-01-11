import navbar from './bars/navbar'
import progressbar from './bars/progressbar'
import sidebar from './bars/sidebar'
import carbon from './datetimes/carbon'
import countdown from './datetimes/countdown'
import easymde from './editors/easymde'
import quill from './editors/quill'
import trix from './editors/trix'
import cleave from './forms/cleave'
import form from './forms/form'
import inputImage from './forms/input-image'
import mask from './forms/mask'
import tagify from './forms/tagify'
import message from './messages/message'
import toggleable from './navigations/toggleable'
import cookieConsent from './overlays/cookie-consent'
import modal from './overlays/modal'
import tooltip from './overlays/tooltip'
import accordionItem from './panels/accordion-item'
import tab from './panels/tab'
import flatpickr from './pickers/flatpickr'
import pickr from './pickers/pickr'
import pikaday from './pickers/pikaday'
import flickity from './sliders/flickity'
import slider from './sliders/slider'
import splide from './sliders/splide'
import swiper from './sliders/swiper'
import imageLoader from './supports/image-loader'
import dropzone from './uploaders/dropzone'
import filepond from './uploaders/filepond'

export default {
  /**
   * Bars.
   */
  navbar,
  progressbar,
  sidebar,

  /**
   * Datetimes.
   */
  carbon,
  countdown,

  /**
   * Editors.
   */
  easymde,
  quill,
  trix,

  /**
   * Forms.
   */
  cleave,
  form,
  'input-image': inputImage,
  mask,
  tagify,

  /**
   * Messages.
   */
  message,

  /**
   * Navigations.
   */
  toggleable,

  /**
   * Overlays.
   */
  'cookie-consent': cookieConsent,
  modal,
  tooltip,

  /**
   * Panels.
   */
  'accordion-item': accordionItem,
  tab,

  /**
   * Pickers.
   */
  flatpickr,
  pickr,
  pikaday,

  /**
   * Sliders.
   */
  flickity,
  slider,
  splide,
  swiper,

  /**
   * Supports.
   */
  'image-loader': imageLoader,

  /**
   * Uploaders.
   */
  dropzone,
  filepond
}
