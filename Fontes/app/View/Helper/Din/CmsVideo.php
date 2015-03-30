<?php 

	App::uses('CmsWrapper', 'View/Helper/Din');

	class CmsVideo extends CmsWrapper {
		public function __construct(array $video, View $view) {
			parent::__construct($video, $view);
		}
		
		public function getPath() {
			$file = preg_replace('/\..+$/', '.flv',$this->arquivo);
			return $this->_view->CmsTemplate->raizSite() . 'files' . '/' . 'video' . '/' . 'flv' . '/' . $file;
		}
		
		public function htmlVideo(array $options = array()) {
			
			if (!isset($options['id'])) $options['id'] = 'flv-player';
			//$incScripts = $this->Html->script($this->_view->CmsTemplate->raizSite() . 'js/jquery-1.10.1.min.js',array('inline' => false));
			//$incScripts .= $this->Html->script($this->_view->CmsTemplate->raizSite() . 'js/swfobject.js',array('inline' => false));


			$uniqueName = uniqid();

			$playerPath = $this->_view->CmsTemplate->raizSite() . 'swf' . '/' . 'flv-player.swf?v=6';
			$bigHtml =<<<EOD
				
							<script type="text/javascript">

							$(document).ready(function() {
								var flashvars_{$uniqueName} = {video: '{$this->getPath()}'};
								var params_{$uniqueName} = {wmode: "transparent", scale: "noScale", menu: "false", allowFullScreen: "true"};
								var attributes_{$uniqueName} = { id: "{$options['id']}", name: "{$options['id']}", swLiveConnect: "true" };
								
								swfobject.embedSWF("{$playerPath}", "{$options['id']}", "420", "280", "10.0.0", "expressInstall.swf", flashvars_{$uniqueName}, params_{$uniqueName}, attributes_{$uniqueName});
							
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
							<li><a href="#" id="reproduzir">Reproduzir v&iacute;deo</a></li>
							<li><a href="#" id="pausar">Pausar v&iacute;deo</a></li>
							<li><a href="#" id="diminuirVolume">Diminuir volume</a></li>
							<li><a href="#" id="AumentarVolume">Aumentar volume</a></li>
						</ul>
					</div>		
EOD;


	return $bigHtml;

		}
	}
