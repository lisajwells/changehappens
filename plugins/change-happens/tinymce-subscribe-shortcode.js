(function() {
  tinymce.PluginManager.add( 'subscribe_to_blog', function( editor, url ) {

    // Add Button to Visual Editor Toolbar
    editor.addButton('subscribe_to_blog', {
      title: 'Subscribe to Blog link',
      // text: 'Subscribe',
      image: url + '/AWeber_CH_Header-150x150.png',
      // cmd: 'subscribe_to_blog_cmd',
      onclick: function( e ) {
        editor.insertContent( '<p>[subscribe-to-blog]</p>');
      }

    }); // end addButton

    // Add Command when Button Clicked
    // editor.addCommand('subscribe_to_blog_cmd', function() {



      // alert('Button clicked!');
    // });

  }); // end PluginManager
})();

