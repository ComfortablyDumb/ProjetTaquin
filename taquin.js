window.onload = function () {

	// pour distinguer les premiers clics
	// des seconds clics
	let first_click = true;

	// pour stocker la première image cliquée
	let first_image;

	// si "not_finished" est vrai, alors
	// il reste des images à permuter
	let not_finished = true;

	// traîte le clic sur une image
	function click_on() {
		if (first_click) {
			first_click = false;
			first_image = this;

		}
		else {
			swap(first_image, this);
			first_click = true;
			is_finished();
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
			result.style.visibility = "visible";

		}

		




	}

	function swap(img1, img2) {
		let temp_src = img1.src;
		let temp_name = img1.name;
		img1.src = img2.src;
		img1.name = img2.name;
		img2.src = temp_src;
		img2.name = temp_name;
	}


	let array = document.getElementsByTagName("img");
	for (let i = 1; i < array.length; i++) {
		array[i].onclick = click_on;
	}
	// ici, il faut relier la fonction "clic_on" à l'évènement "onclick"
	// sur toutes les images contenues dans l'élément d'id "puzzle"

};
