window.onload = function () {

	// pour distinguer les premiers clics
	// des seconds clics
	let first_click = true;

	// pour stocker la première image cliquée
	let first_image;

	// si "not_finished" est vrai, alors
	// il reste des images à permuter
	let not_finished = true;

	function changer(img1 , img2){
		let temp_name = img1.name;
		let temp_src = img1.src;

		img1.name = img2.name;
		img1.src = img2.src;

		img2.name =  temp_name;
		img2.src = temp_src;
	}

	// traîte le clic sur une image
	function click_on() {
		if(is_finished()){
			if (first_click == true){
				first_image = this;
				first_click = false;
			}
			else{
                let img2 = this;
                changer(first_image , img2);               
				first_click = true;
			}
		}
	}

	// teste si le puzzle est terminé
	function is_finished() {
		let minimg = document.getElementsByTagName('img');
		let array = [];
		for (let i = 1 ; i<minimg.length ;i++){
			array[i] = minimg[i];
		}
		let imgreussi = minimg.sort();

		for(let j =0 ; j<minimg.length ;j++){
			if(imgreussi[j] == array[j]){
				not_finished = true;
			}
			else{
				not_finished = false;
			}
        }
        return not_finished;
	}

	// ici, il faut relier la fonction "clic_on" à l'évènement "onclick"
	// sur toutes les images contenues dans l'élément d'id "puzzle"
	let minimg = document.getElementsByTagName('img');
	for (let i = 1 ; i<minimg.length ;i++){
		minimg[i].onclick = click_on;
	}
};