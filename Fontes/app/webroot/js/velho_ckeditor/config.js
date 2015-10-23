/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] }
	];

	config.removeButtons = 'Copy,Paste,Undo,Anchor,Redo,Underline,Strike,Subscript,Superscript,Unlink,' + 
						   'NumberedList,Indent,BulletedList,Outdent,About,Save,Templates,NewPage,Preview,' +
						   'Print,Cut,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,RemoveFormat,'+
						   'Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Blockquote,'+
						   'JustifyLeft,BidiLtr,CreateDiv,JustifyCenter,BidiRtl,Language,JustifyRight,'+
						   'JustifyBlock,Image,Styles,TextColor,Maximize,ShowBlocks,BGColor,Flash,Table,'+
						   'Format,HorizontalRule,Smiley,Font,SpecialChar,PageBreak,FontSize,Iframe';
						// Link

    config.allowedContent =
    'h1 h2 h3 p blockquote strong em;' +
    'a[!href];' +
    'img(left,right)[!src,alt,width,height];';
};
