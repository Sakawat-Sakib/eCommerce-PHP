// CART QTY CHANGE //
	
const plusSym = document.querySelectorAll('.plus');	
const minusSym = document.querySelectorAll('.minus');
const cartQty = document.querySelectorAll('.cart_qty');
const subTotal = document.getElementById('sub_total');
const deliveryFee = document.getElementById('delivery_fee');
const vat = document.getElementById('vat');
const finalPay = document.getElementById('final_total_price');

const totalPrices = document.querySelectorAll('.cart_pro_total_price');
const mrps = document.querySelectorAll('.cart_pro_price');
	
	//initially all product Qty set to 1
	cartQty.forEach((cartQ,i)=>{
		cartQ.value = 1;
	})

	//initially all product total price set for 1 qty
	totalPrices.forEach((everyTotalPrice,i)=>{
		everyTotalPrice.innerHTML = parseInt(mrps[i].innerHTML) * parseInt(1);
	})
	
	//initially set subtotal & total
	let total = 0;
	totalPrices.forEach((onePrice)=>{
		total = parseInt(onePrice.innerText) + parseInt(total);
	})
	subTotal.innerText = total;
	vat.innerText = total*0.02;
	finalPay.innerText = parseInt(subTotal.innerText) + parseInt(deliveryFee.innerText) + parseInt(vat.innerText);

	//change in total price section
	function changeInTotalPrice(){
		
		let total = 0;
		totalPrices.forEach((onePrice)=>{
			total = parseInt(onePrice.innerText) + parseInt(total);
		})
		subTotal.innerText = total;	
		vat.innerText = total*0.02;
		finalPay.innerText = parseInt(subTotal.innerText) + parseInt(deliveryFee.innerText) + parseInt(vat.innerText);
	}

//increament OR decreament by input
cartQty.forEach((cartQ,i)=>{
		cartQ.addEventListener('input',()=>{

			if(cartQ.value == ''){
				totalPrices[i].innerHTML = 0;
			}else{
				totalPrices[i].innerHTML = parseInt(mrps[i].innerHTML) * parseInt(cartQ.value);
			}

			changeInTotalPrice()
			
		})
	})	


//Increament By +
plusSym.forEach((plusSingle,i)=>{

	plusSingle.addEventListener('click',()=>{

		if(cartQty[i].value == ''){
			cartQty[i].value = 1;
		}else{
			cartQty[i].value = parseInt(cartQty[i].value) + parseInt(1);
		}

		totalPrices[i].innerHTML = parseInt(mrps[i].innerHTML) * parseInt(cartQty[i].value);

		changeInTotalPrice()
	});
})

//Decreament By -
minusSym.forEach((minusSingle,i)=>{

	minusSingle.addEventListener('click',()=>{
		if(cartQty[i].value == ''){
			cartQty[i].value = 1;
		}else{
			cartQty[i].value = parseInt(cartQty[i].value) - parseInt(1);
		
			if(cartQty[i].value < 1){
				cartQty[i].value = 1;
			}
		}
		

		totalPrices[i].innerHTML = parseInt(mrps[i].innerHTML) * parseInt(cartQty[i].value);

		changeInTotalPrice()
	});
})

// CART QTY CHANGE  END// 

//======================================================================//
	//CODE FOR RESTRICT USER TO INCREASE OR DECREASE NUMBER IN INPUT FIELD WITH MOUSE WHEEL
document.addEventListener("wheel", function(event){
    if(document.activeElement.type === "number"){
        document.activeElement.blur();
    }
});
//======================================================================//