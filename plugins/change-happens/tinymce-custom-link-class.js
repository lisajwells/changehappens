(function() {
  tinymce.PluginManager.add( 'custom_link_class', function( editor, url ) {
    // Add Button to Visual Editor Toolbar
    editor.addButton('custom_link_class', {
      title: 'Insert Button Link',
      text: 'Subscribe',
      image: url + '/AWeber_CH_Header-150x150.png',
      cmd: 'custom_link_class',
    });

  }); // end PluginManager
})();
