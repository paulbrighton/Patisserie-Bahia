import $ from 'jquery'

$(function () {
  var isOpen = 0
  $('.openbtn').click(function () {
    if (isOpen === 0) {
      openNav()
    } else {
      closeNav()
    }
  })
  $('.closebtn').click(function () {
    closeNav()
  })

  function openNav () {
    document.getElementById('myNav').style.width = '100%'
    isOpen = 1
  }

  function closeNav () {
    document.getElementById('myNav').style.width = '0%'
    isOpen = 0
  }
})
