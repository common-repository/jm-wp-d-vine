(function() {
		tinymce.PluginManager.add('_wpdv_mce_button', function( editor, url ) {
			editor.addButton( '_wpdv_mce_button', {
				icon: 'icon dashicons-before dashicons-video-alt2',
				type: 'button',
				text: false,
				tooltip: 'D-Vine shortcode',
				
				onclick: function() {
								
					editor.windowManager.open( {
	
						title: 'Vine URL',
						body: [
								
							{
								type: 'textbox',
								name: 'urlValue',
								label: editor.getLang('wpdv_tinymce_plugin.url_input'),
								value: ''
							},

						],
						onsubmit: function( e ) {
							editor.insertContent( '[vine url="' + e.data.urlValue + '"]');
						}
					});
				}
			});
		});
	})();