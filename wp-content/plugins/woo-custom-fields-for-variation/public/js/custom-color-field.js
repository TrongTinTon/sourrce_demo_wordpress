this.jscolor.presets.default = {
	palette: [
		'#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26', '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
		'#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d', '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
	],

	//paletteCols: 12,
	hideOnPaletteClick: false,
	width: 271,
	//height: 151,
	//position: 'right',
	//previewPosition: 'right',
	//backgroundColor: 'rgba(51,51,51,1)', controlBorderColor: 'rgba(153,153,153,1)', buttonColor: 'rgba(240,240,240,1)',
}



function updateBackground(el, selector) {
	document.querySelector(selector).style.background = el.jscolor.toRGBAString()
}
function updateValue(el, selector) {
	jQuery(selector).prop('value',el.jscolor.toString()).change()
}

   
document.querySelectorAll('.color-input-label').forEach(function(label){
	label.addEventListener('mousedown', function(event) {
	    event.stopPropagation(); // Ngăn chặn sự kiện click trên SVG
		    var inputEle = document.getElementById(this.getAttribute('data-input'))
		    inputEle.jscolor.show()
		    console.log(inputEle)
		    // parentElement.jscolor.show(); // Gọi sự kiện click trên thẻ cha
	});
})



// triggers 'onInput' and 'onChange' on all color pickers when they are ready
jscolor.trigger('input change');


