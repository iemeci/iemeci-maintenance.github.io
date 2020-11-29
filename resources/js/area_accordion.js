const area_accordion = function() {
  const level1Text = document.getElementsByClassName('js-accordion-label');

  for (let i = 0; i < level1Text.length; i++) {
    level1Text[i].addEventListener('click', function(e) {
      const nextElem = e.target.nextElementSibling;
      const labelClassName = 'js-label-open'
      const contentClassName = 'js-content-open'
      if(nextElem.classList.contains(contentClassName)) {
        e.target.classList.remove(labelClassName)
        nextElem.classList.remove(contentClassName)
      } else {
        e.target.classList.add(labelClassName)
        nextElem.classList.add(contentClassName)
      }
      // alert
      // e.target.nextSibling.classList.add('hoge')
    })
  }
}

export default () => {
  return area_accordion();
}
