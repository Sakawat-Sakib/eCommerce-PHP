//DROP MENU 

const dropBtn = document.getElementById('drop_btn')
const menu = document.getElementById('drop_menu')

dropBtn.addEventListener('click',()=>{
	menu.classList.toggle('drop')
})