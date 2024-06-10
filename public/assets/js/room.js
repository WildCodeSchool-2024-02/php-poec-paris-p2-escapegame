
document.addEventListener('DOMContentLoaded', (event) => {
   const button = document.getElementById('myButton');
   button.addEventListener('click', () => {
       const text = document.getElementById('redirection');
       button.classList.toggle('hidden');
       text.classList.toggle('hidden');
       text.classList.toggle('visible');
   });
});
if ( dynamicId === 1) {
    const text = document.getElementById('redirection');
    text.addEventListener('click', () => {
        var newDynamicId = dynamicId + 1;
        window.location = `http://localhost:8000/room?id=${newDynamicId}`;
    });
    } else if ( dynamicId === 2) {
    const body = document.getElementById('body');
    body.classList.add('image2');
    const text = document.getElementById('redirection');
    text.addEventListener('click', () => {
        var newDynamicId = dynamicId + 1;
        window.location = `http://localhost:8000/room?id=${newDynamicId}`;
    });
    } else if ( dynamicId === 3) {
    const body = document.getElementById('body');
    body.classList.add('image3');
    const text = document.getElementById('redirection');
    text.addEventListener('click', () => {
        var newDynamicId = dynamicId + 1;
        window.location = `http://localhost:8000/outro`;
    });
}
