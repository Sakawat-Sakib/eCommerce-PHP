
//CHANGE HEADER POSITION TO FIXED//
const headerBottom = document.querySelector('#header_bot');
const togMenu = document.querySelector('#tog_menu');

function changePosition(){
	if(window.scrollY > 120){
		headerBottom.classList.add('pos_fixed');
		togMenu.classList.add('tog_fixed');
	}else{
		headerBottom.classList.remove('pos_fixed');
		togMenu.classList.remove('tog_fixed');
	}
}

window.addEventListener('scroll',changePosition);







//  NAV BAR TOGGLE //
const openMenu = document.querySelector('#open_menu');
const toggleMenu = document.querySelector('.toggle_menu');

open_menu.addEventListener('click',()=>{
	toggleMenu.classList.toggle('menu_show');
});

// RIGHT TOGGLE //
const toggleDiv = document.querySelector('.toggle_right');
const downArrow = document.querySelector('.fa-caret-down');

downArrow.addEventListener('click',()=>{
	toggleDiv.classList.toggle('right_show');
	toggleMenu.classList.remove('menu_show');
});


//RESPOSIVE RELATED JS

const searchIcon = document.querySelector('.single_search');
const crossIcon = document.querySelector('.fa-times');
const searchTop = document.querySelector('.search_top');

searchIcon.addEventListener('click',()=>{
	searchTop.classList.add('active');
	toggleDiv.classList.remove('right_show');
})
crossIcon.addEventListener('click',()=>{
	searchTop.classList.remove('active');
})



//HEART & BAG TOGGLE

const hearts = document.querySelectorAll('.fa-heart');
const bags = document.querySelectorAll('.fa-shopping-bag');


hearts.forEach((heart,i)=>{
	heart.addEventListener('click',()=>{
		hearts[i].classList.toggle('bgred');
	})
})

bags.forEach((bag,i)=>{
	bag.addEventListener('click',()=>{
		bags[i].classList.toggle('bgred');
	})
})


//SENT DATA TO addtowishlist PAGE 

const heartJs = document.querySelectorAll('.heartJs');
const wishCount = document.getElementById('wishCount');

heartJs.forEach((singleHeart,i)=>{
	singleHeart.addEventListener('click',(e)=>{

		e.preventDefault();

		let id = singleHeart.dataset.proid;

		fetch('includes/addtowishlist.inc.php',{

			method:'POST',
			headers:{
					
					'Content-type':'application/json'
			},
			body:JSON.stringify({id:id})

		})
		.then(res => res.json())
		.then((data) =>{
			wishCount.innerText = Object.keys(data).length;
		})
		
		
	})
})



//SENT DATA TO addtocart PAGE 

const cartJs = document.querySelectorAll('.cartJs');
const cartCount = document.getElementById('cartCount');

cartJs.forEach((singleCart,i)=>{
	singleCart.addEventListener('click',(e)=>{

		e.preventDefault();

		let id = singleCart.dataset.proid;

		fetch('includes/addtocart.inc.php',{

			method:'POST',
			headers:{
					
					'Content-type':'application/json'
			},
			body:JSON.stringify({id:id})

		})
		.then(res => res.json())
		.then((data) =>{
			cartCount.innerText = Object.keys(data).length;
		})
		
		
	})
})


//CHANGE TEXT IN ADD TO CART

const addcartBtn = document.getElementById('addcart');

addcartBtn.addEventListener('click',()=>{
	let btnText = addcartBtn.innerText;

	if(btnText == 'ADD TO CART'){
		btnText = 'REMOVE';
	}else{
		btnText = 'ADD TO CART'
	}

	addcartBtn.innerText = btnText;
})





	

		
