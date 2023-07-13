const items = document.querySelectorAll('.edit__booking_items');

items.forEach(item => {
    item.addEventListener('click', (event) => {
        
        items.forEach(item => {
            hiddenBlock(item);
        });
        target = event.target;
        console.log(item);
        console.log(target);
        showBlock(item);
    })
});

function showBlock(item) {
    console.log('выполнение функции');
    const title = item.querySelector('.edit__booking_title');
    title.classList.add('decoration');
    console.log(title);

    const block = item.querySelector('.edit__booking_item');
    block.classList.remove('hidden');
    console.log(block);
}

function hiddenBlock(item) {
    const title = item.querySelector('.edit__booking_title');
    title.classList.remove('decoration');

    const block = item.querySelector('.edit__booking_item');
    block.classList.add('hidden');
}