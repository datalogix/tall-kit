import navbar from './bars/navbar'
import progressbar from './bars/progressbar'
import sidebar from './bars/sidebar'
import userSidebar from './bars/user-sidebar'
import button from './buttons/button'
import carbon from './datetimes/carbon'
import countdown from './datetimes/countdown'
import easymde from './editors/easymde'
import quill from './editors/quill'
import trix from './editors/trix'
import tinymce from './editors/tinymce'
import checkboxList from './forms/checkbox-list'
import cleave from './forms/cleave'
import form from './forms/form'
import inputImage from './forms/input-image'
import many from './forms/many'
import mask from './forms/mask'
import tagify from './forms/tagify'
import message from './messages/message'
import cookieConsent from './overlays/cookie-consent'
import modal from './overlays/modal'
import toggleable from './overlays/toggleable'
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
  'user-sidebar': userSidebar,

  /**
   * Buttons.
   */
  button,

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
  tinymce,

  /**
   * Forms.
   */
  'checkbox-list': checkboxList,
  cleave,
  form,
  'input-image': inputImage,
  many,
  mask,
  tagify,

  /**
   * Messages.
   */
  message,

  /**
   * Overlays.
   */
  'cookie-consent': cookieConsent,
  modal,
  toggleable,
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
