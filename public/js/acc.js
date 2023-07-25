const currentlocation = location.href;
const menuitem = document.querySelectorAll('@nav_list ul  a');
const menulength = menuitem.length;
for (let i = 0; i < menulength; i++) {
    if (menuitem[i].href === currentlocation) {
        menuitem[i].className = "active";
    }

}