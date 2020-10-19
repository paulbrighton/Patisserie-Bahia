import $ from 'jquery'
import stripTags from './helpers/strip-tags'

wp.customize('blogname', (value) => {
  value.bind((to) => {
    $('.c-header__blogname').html(to)
  })
})

wp.customize('_themename_display_author_info', (value) => {
  value.bind((to) => {
    console.log(to)
    if (to) {
      $('.c-post__author').show()
    } else {
      $('.c-post__author').hide()
    }
  })
})

wp.customize('_themename_site_info', (value) => {
  value.bind((to) => {
    $('.c-site-info__text').html(stripTags(to, '<a>'))
  })
})

wp.customize('_themename_built_by_info', (value) => {
  value.bind((to) => {
    $('.c-built-by-info__text').html(stripTags(to, '<a>'))
  })
})
