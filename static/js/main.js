(function () {
	'use strict';
	const navIcon = document.querySelector('#nav-icon');
	const nav = document.querySelector('#nav-links');
	const navLinks = document.querySelectorAll('#nav-links li a');

	// Toggle Navbar
	try{
		navIcon.addEventListener("click", () => {
			nav.classList.toggle('nav-active');

			// Animate Links
			navLinks.forEach((link, index) => {
				if (link.style.animation) {
					link.style.animation = '';
				} else {
					link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.4}s`;
				}
			});
		});
	} catch (err) {}
})();
(function () {
	let inputs = document.querySelectorAll("input, textarea");
	inputs.forEach(input => {
		input.addEventListener("focus", () => {
			input.setAttribute("data-placeholder", input.placeholder);
			input.placeholder = '';
		});
		input.addEventListener("focusout", () => {
			input.placeholder = input.getAttribute("data-placeholder");
			input.setAttribute("data-placeholder", "");
		});
	});
})();
(function () {
	if (typeof(document.querySelector("#credit-card")) != 'undefined' && document.querySelector("#credit-card") != null) {
		setInterval(() => {
			if (document.querySelector("#credit-card").checked) {
				document.querySelector(".creditcard").style.display = "block";
			} else {
				document.querySelector(".creditcard").style.display = "none";
			}
		}, 100);
	}
})();
function SizeSelect(selected, removefrom1, removefrom2) {
	document.querySelector(selected).classList.add("checked");
	document.querySelector(removefrom1).classList.remove("checked");
	document.querySelector(removefrom2).classList.remove("checked");
}
function ChangePrice(price, input, text) {
	console.log(price);
	document.querySelector(input).value = price;
	document.querySelector(text).innerHTML = price;
}