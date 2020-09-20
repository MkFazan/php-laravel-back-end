function inintStorage(){
	if(localStorage.getItem('orders') == null){
		localStorage.setItem('orders', JSON.stringify([]))
	}
}
inintStorage();

class ModalWindow {
	static open = (el) => {
		
		if(document.querySelector('.modal_window')){
			document.querySelector('.modal_window').className += ` active ${el}`
		}
	}
	static close = () => {
		if(document.querySelector('.modal_window')){
			document.querySelector('.modal_window').className = 'fancybox-wrap fancybox-desktop modal_window';
		}
	}
}

class Count  {
	static update(el){
		if(localStorage.getItem('offer_count') != null) {
			const data = +localStorage.getItem('offer_count');
			let newData = data  + +el;
			localStorage.setItem('offer_count', newData)
			Count.show()
		}
	}

	static show(el){
		if(localStorage.getItem('offer_count') == null) {
			localStorage.setItem('offer_count', 0);
			document.querySelector('.cart-m .cart-count').innerText = localStorage.getItem('offer_count');
		}
		else {
			if(document.querySelector('.cart-m .cart-count')){
				document.querySelector('.cart-m .cart-count').innerText = localStorage.getItem('offer_count');
			}
			
		}

		console.log(localStorage.getItem('offer_count'));
		
	}
}

class Offer {
	static add(el) {
		if(localStorage.getItem('orders') != null) {
			const data = JSON.parse(localStorage.getItem('orders'));
			data.push(el);
			localStorage.setItem('orders', JSON.stringify(data))
			Count.update(el.count)
		}
	}
	static get() {
		let data = JSON.parse(localStorage.getItem('orders'));
		console.log(data);
	}
}



function choseImage(el){
	let src = el.querySelector('img').getAttribute('data-src')
	el.closest('.wrapper_gallery').querySelector('.prezent_image').setAttribute('src', src);
}

function statusOrder(modal){
	if(modal == 'show') {
		document.querySelector('#oinfo').classList.add('active');
		document.querySelector('.overinfo').classList.add('active');
	}
	else {
		document.querySelector('#oinfo').classList.remove('active');
		document.querySelector('.overinfo').classList.remove('active');
	}
}


Count.show()
const focusFormReview = (id = null) => {
	if(document.querySelector('.new-review')){
		document.querySelector('.new-review').classList.add('active');
		if(id != null) {
			var fieald = document.createElement("input");
			fieald.setAttribute('type','hidden');
			fieald.setAttribute('id','review_id');
			fieald.setAttribute('value',id);
			document.querySelector('.new-review .newwriteshop').before(fieald);
		}
	}
}

