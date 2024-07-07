//SLIDER START//
const btns = document.querySelectorAll('.radio_btn');
const slides = document.querySelectorAll('.slides');

function activeStatus(i){

	btns.forEach((btn)=>{
		btn.classList.remove('active');
	})

	slides.forEach((slide)=>{
		slide.classList.remove('active');
	})
	
	btns[i].classList.add('active');
	slides[i].classList.add('active');
}

btns.forEach((btn,i)=>{
	btn.addEventListener('click',()=>{
		activeStatus(i);
	})
})


//slider Auto//
let i=0;

function autoSliding(){

	btns.forEach((btn)=>{
		btn.classList.remove('active');
	})

	slides.forEach((slide)=>{
		slide.classList.remove('active');
	})

	btns[i].classList.add('active');
	slides[i].classList.add('active');

	i++;

	if(i==btns.length){
		i=0;
	}

	setTimeout(()=>{

		autoSliding();

	},4000)

}


 autoSliding();

 