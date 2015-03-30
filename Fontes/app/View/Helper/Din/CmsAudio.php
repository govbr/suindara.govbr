<?php 

	App::uses('CmsWrapper', 'View/Helper/Din');

	class CmsAudio extends CmsWrapper {
		public function __construct(array $audio, View $view) {
			parent::__construct($audio, $view);
		}
		
		public function getPath() {
			$file = preg_replace('/\..+$/', '.mp3',$this->arquivo);
			return $this->_view->CmsTemplate->raizSite() . 'files' . '/' . 'audio' . '/' . 'mp3' . '/' . $file;
		}
		
		public function htmlAudio(array $options = array()) {
			if (!isset($options['id'])) $options['id'] = 'mp3-player';
			$playerPath = $this->_view->CmsTemplate->raizSite()  . 'swf' . '/' . 'mp3-player.swf?v=2';
			$express = $this->_view->CmsTemplate->raizSite()  . 'swf' . '/' . 'expressInstall.swf?v=2';

			$uniqueName = uniqid();

			$bigHtml =<<<EOD
				
			<script type="text/javascript">
				$(document).ready(function() {
					var flashvars_{$uniqueName} = {audio: "{$this->getPath()}"};
					var params_{$uniqueName} = {wmode: "transparent", scale: "noScale", menu: "false", allowFullScreen: "true"};
					var attributes_{$uniqueName} = { id: "{$options['id']}", name: "{$options['id']}", swLiveConnect: "true" };
					
					function stopOnInit(event){
						//console.log(event);
						if (event && event.ref.PercentLoaded && event.ref.PercentLoaded() == 100) {
							thisMovie_{$uniqueName}("{$options['id']}").TGotoFrame('controleJavascript', 2);	
						} else {
							setTimeout(function() {stopOnInit(event)}, 50);
						}

					}

					swfobject.embedSWF("{$playerPath}", "{$options['id']}", "420", "280", "10.0.0", "expressInstall.swf", 
										flashvars_{$uniqueName}, 
										params_{$uniqueName}, 
										attributes_{$uniqueName}, function (e) {
											if (e.success) {
												stopOnInit(e);
											}
										});
				
					// -- controle -- //
					
					//var movieName = "{$options['id']}";
					function thisMovie_{$uniqueName}(movieName) {
					  if (navigator.appName.indexOf ("Microsoft") !=-1) {
					    return window[movieName]
					  } else {
					    return document[movieName]
					  }
					}
					
			
					$("#controle-{$options['id']} #reproduzir").click(function() {
						thisMovie_{$uniqueName}("{$options['id']}").TGotoFrame('controleJavascript', 1);
						return false
					});
					
					$("#controle-{$options['id']} #pausar").click(function() {
						thisMovie_{$uniqueName}("{$options['id']}").TGotoFrame('controleJavascript', 2);
						return false
					});
					
					$("#controle-{$options['id']} #diminuirVolume").click(function() {
						thisMovie_{$uniqueName}("{$options['id']}").TGotoFrame('controleJavascript', 3);
						return false
					});
					
					$("#controle-{$options['id']} #AumentarVolume").click(function() {
						thisMovie_{$uniqueName}("{$options['id']}").TGotoFrame('controleJavascript', 4);
						return false
					});


					
				});
			
			</script>
			
		<div>
			{$this->_view->Html->tag('div', '', $options)}</div>
			<ul id="controle-{$options['id']}">
				<li><a href="#" id="reproduzir">Reproduzir &aacute;udio</a></li>
				<li><a href="#" id="pausar">Pausar &aacute;udio</a></li>
				<li><a href="#" id="diminuirVolume">Desligar som</a></li>
				<li><a href="#" id="AumentarVolume">Ligar som</a></li>
			</ul>
		</div>

									
EOD;


	return $bigHtml;

		}
	}
