/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// ;
	// config.uiColor = '#AADC6E';
	config.language = 'en';
	config.skin = 'moono';
	config.basicEntities = false;
	config.entities = false;
	config.entities_greek = false;
	config.entities_latin = false;
	config.htmlEncodeOutput = false;
	config.entities_processNumerical = false;
	config.extraPlugins = 'removeformat';
	config.allowedContent = true;
	config.toolbar = [
		{name: 'head', items: ['Cut', 'Copy', 'PasteForWord', '-', 'Undo', 'Redo', '-', 'Link', 'Unlink', 'Anchor', '-', 'Image', 'Styles','FontSize','Format', '-','Remove Format','Maximize']},'/',
		{ name: 'Basic', items: ['Source', '-', 'Bold', 'Italic', 'Underline', 'RemoveFormat', '-', 'TextColor', 'BGColor' , '-', 'NumberedList', 'BulletedList','Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', ] }
	];
};
