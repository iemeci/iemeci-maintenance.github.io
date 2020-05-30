// require('./bootstrap');
import get_location from "./get_location";

const btn = document.querySelector('.js-submit-location');
const btn2 = document.querySelector('.js-copy');

btn.addEventListener('click', async (event)=> {
    event.preventDefault();
    const loc = await get_location();
    document.querySelector('input[name="lat"]').value = loc.lat;
    document.querySelector('input[name="lng"]').value = loc.lng;
    document.forms.submit_location.submit();
});

btn2.addEventListener('click', (event) =>{
    event.preventDefault();
    navigator.clipboard.writeText(event.currentTarget.dataset.title);
});
