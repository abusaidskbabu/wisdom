tinymce.init({
      selector: 'textarea',
      plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor"
	],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | sizeselect | fontselect |  fontsizeselect | imageupload",
	setup: function(editor) {
		var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
		$(editor.getElement()).parent().append(inp);

		inp.on("change",function(){
			var input = inp.get(0);
			var file = input.files[0];
			var fr = new FileReader();
			fr.onload = function() {
				var img = new Image();
				img.src = fr.result;
				editor.insertContent('<img src="'+img.src+'"/>');
				inp.val('');
			}
			fr.readAsDataURL(file);
		});

		editor.addButton( 'imageupload', {
			text:"IMAGE",
			icon: false,
			onclick: function(e) {
				inp.trigger('click');
			}
		});
	},
	content_css: ['https://fonts.googleapis.com/css?family=Montserrat:400,700'],
	toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",

    /* style */
	style_formats: [
		{title: "Headers", items: [
			{title: "Header 1", format: "h1"},
			{title: "Header 2", format: "h2"},
			{title: "Header 3", format: "h3"},
			{title: "Header 4", format: "h4"},
			{title: "Header 5", format: "h5"},
			{title: "Header 6", format: "h6"}
		]},
		{title: "Inline", items: [
			{title: "Bold", icon: "bold", format: "bold"},
			{title: "Italic", icon: "italic", format: "italic"},
			{title: "Underline", icon: "underline", format: "underline"},
			{title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
			{title: "Superscript", icon: "superscript", format: "superscript"},
			{title: "Subscript", icon: "subscript", format: "subscript"},
			{title: "Code", icon: "code", format: "code"}
		]},
		{title: "Blocks", items: [
			{title: "Paragraph", format: "p"},
			{title: "Blockquote", format: "blockquote"},
			{title: "Div", format: "div"},
			{title: "Pre", format: "pre"}
		]},
		{title: "Alignment", items: [
			{title: "Left", icon: "alignleft", format: "alignleft"},
			{title: "Center", icon: "aligncenter", format: "aligncenter"},
			{title: "Right", icon: "alignright", format: "alignright"},
			{title: "Justify", icon: "alignjustify", format: "alignjustify"}
		]}
	]
    });