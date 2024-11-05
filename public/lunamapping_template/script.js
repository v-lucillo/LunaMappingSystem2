// Barangays
const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.select');
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li');
    const selected = dropdown.querySelector('.selected');

    select.addEventListener('click', () =>{
        select.classList.toggle('select-clicked');
        caret.classList.toggle('caret-rotate');
        menu.classList.toggle('menu-open');

    });
    options.forEach(option=>{
        option.addEventListener('click', ()=>{
            selected.innerText = option.innerText;
            select.classList.remove('select-clicked');
            caret.classList.remove('caret-rotate');
            menu.classList.remove('menu-open');
            options.forEach(option =>{
                option.classList.remove('active');

            });
            option.classList.add('active');
        });
    });
});


// Categories

const dropdowns_categ = document.querySelectorAll('.dropdown_categ');
dropdowns_categ.forEach(dropdown => {
    const select_categ = dropdown.querySelector('.select_categ');
    const caret_categ = dropdown.querySelector('.caret_categ');
    const menu_categ = dropdown.querySelector('.menu_categ');
    const options_categ = dropdown.querySelectorAll('.menu_categ li');
    const selected_categ = dropdown.querySelector('.selected_categ');

    select_categ.addEventListener('click', () =>{
        select_categ.classList.toggle('select-clicked_categ');
        caret_categ.classList.toggle('caret-rotate_categ');
        menu_categ.classList.toggle('menu-open_categ');

    });
    options_categ.forEach(option=>{
        option.addEventListener('click', ()=>{
            selected_categ.innerText = option.innerText;
            select_categ.classList.remove('select-clicked_categ');
            caret_categ.classList.remove('caret-rotate_categ');
            menu_categ.classList.remove('menu-open_categ');
            options.forEach(option =>{
                option.classList.remove('active_categ');

            });
            option.classList.add('active_categ');
        });
    });
});

// Agricultural

const dropdowns_agri = document.querySelectorAll('.dropdown_agri');
dropdowns_agri.forEach(dropdown => {
    const select_agri = dropdown.querySelector('.select_agri');
    const caret_agri = dropdown.querySelector('.caret_agri');
    const menu_agri = dropdown.querySelector('.menu_agri');
    const options_agri = dropdown.querySelectorAll('.menu_agri li');
    const selected_agri = dropdown.querySelector('.selected_agri');

    select_agri.addEventListener('click', () =>{
        select_agri.classList.toggle('select-clicked_agri');
        caret_agri.classList.toggle('caret-rotate_agri');
        menu_agri.classList.toggle('menu-open_agri');

    });
    options_agri.forEach(option=>{
        option.addEventListener('click', ()=>{
            selected_agri.innerText = option.innerText;
            select_agri.classList.remove('select-clicked_agri');
            caret_agri.classList.remove('caret-rotate_agri');
            menu_agri.classList.remove('menu-open_agri');
            options.forEach(option =>{
                option.classList.remove('active_agri');

            });
            option.classList.add('active_agri');
        });
    });
});

// add

const add_dropdowns_agri = document.querySelectorAll('.add_dropdown_agri');
add_dropdowns_agri.forEach(dropdown => {
    const add_select_agri = dropdown.querySelector('.add_select_agri');
    const add_caret_agri = dropdown.querySelector('.add_caret_agri');
    const add_menu_agri = dropdown.querySelector('.add_menu_agri');
    const add_options_agri = dropdown.querySelectorAll('.add_menu_agri li');
    const add_selected_agri = dropdown.querySelector('.add_selected_agri');

    add_select_agri.addEventListener('click', () =>{
        add_select_agri.classList.toggle('add_select-clicked_agri');
        add_caret_agri.classList.toggle('add_caret-rotate_agri');
        add_menu_agri.classList.toggle('add_menu-open_agri');

    });
    add_options_agri.forEach(option=>{
        option.addEventListener('click', ()=>{
            add_selected_agri.innerText = option.innerText;
            add_select_agri.classList.remove('add_select-clicked_agri');
            add_caret_agri.classList.remove('add_caret-rotate_agri');
            add_menu_agri.classList.remove('add_menu-open_agri');
            options.forEach(option =>{
                option.classList.remove('add_active_agri');

            });
            option.classList.add('add_active_agri');
        });
    });
});