function displaymenuitems() {
    let menuItems = document.getElementsByClassName('menuitems')[0];
    if (menuItems.style.display === 'block') {
        menuItems.style.display = 'none';
    } else {
        menuItems.style.display = 'block';
    }
}
