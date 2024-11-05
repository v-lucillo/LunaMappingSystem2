const dropdowns_categ = document.querySelectorAll('.dropdown_categ');
dropdowns.forEach(dropdown => {
    const select_categ = dropdown.querySelector('.select_categ');
    const caret_categ = dropdown.querySelector('.caret_categ');
    const menu_categ = dropdown.querySelector('.menu_categ');
    const options_categ = dropdown.querySelectorAll('.menu_categ li');
    const selected_categ = dropdown.querySelector('.selected_categ');

    select.addEventListener('click', () =>{
        select_categ.classList.toggle('select-clicked_categ');
        caret_categ.classList.toggle('caret-rotate_categ');
        menu_categ.classList.toggle('menu-open_categ');

    });
    options.forEach(option=>{
        option.addEventListener('click', ()=>{
            selected_categ.innerText = option.innerText;
            select_categ.classList.remove('select-clicked_categ');
            caret_categ.classList.remove('caret-rotate_categ');
            menu_categ.classList.remove('menu-open_categ');
            options_categ.forEach(option =>{
                option.classList.remove('active');

            });
            option.classList.add('active');
        });
    });
});