window.onload = function () {

	blanc = document.getElementsByName("9");

	// si "not_finished" est vrai, alors
	// il reste des images à permuter
	let not_finished = true;

	//Compteur de coups
	let compteur = 0;

	


	// traîte le clic sur une image
	function click_on() {
		blanc = document.getElementsByName("9")[0];

		array = Array.from(document.getElementsByTagName("img"));


		indice_blanc = array.indexOf(blanc);
		indice_this = array.indexOf(this);




		if (isMovable(indice_blanc, indice_this)) {

			swap(this, blanc);
			is_finished();
		}
	}


	function isMovable(indice_blanc, indice_this) {
		if (indice_blanc % 3 == 1) {
			return (indice_blanc == indice_this + 3 || indice_blanc == indice_this - 3 || indice_blanc == indice_this - 1);
		}
		else if (indice_blanc % 3 == 0) {
			return (indice_blanc == indice_this + 3 || indice_blanc == indice_this - 3 || indice_blanc == indice_this + 1);
		}
		else {
			return (indice_blanc == indice_this + 3 || indice_blanc == indice_this - 3 || indice_blanc == indice_this + 1 || indice_blanc == indice_this - 1);
		}
	}


	function isSort(array) {
		for (let i = 0; i < array.length - 1; i++) {
			if (array[i] > array[i + 1]) { return false; }
		}
		return true;
	}

	// teste si le puzzle est terminé
	function is_finished() {
		let out = [];
		let array = document.getElementsByTagName("img");

		for (let i = 1; i < array.length; i++) {
			out.push(array[i].name);
		}
		

		if (isSort(out)) {
			let result = document.getElementById("result");
			let blanc = document.getElementsByName("9")[0];
			result.innerHTML = "Bravo vous avez fini en " + compteur + " coups GG.";
			result.style.visibility = "visible";
			blanc.src = blanc.src.slice(0, -5) + "10.jpg";


		}

	}

	function swap(img1, img2) {
		let temp_src = img1.src;
		let temp_name = img1.name;
		img1.src = img2.src;
		img1.name = img2.name;
		img2.src = temp_src;
		img2.name = temp_name;
		compteur += 1;
	}

	let array = document.getElementsByTagName("img");
	for (let i = 1; i < array.length; i++) {
		array[i].onclick = click_on;
	}
};
