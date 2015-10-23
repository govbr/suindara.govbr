<?php 
 /*
 * @copyright Copyright (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * This file is part of CMS Suindara.
 *
 * CMS Suindara is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * The CMS Suindara is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with CMS Suindara.  If not, see the oficial website 
 * <http://www.gnu.org/licenses/> or the Brazilian Public Software
 * Portal <www.softwarepublico.gov.br>
 *
 * *********************
 *
 * Direitos Autorais Reservados (c) 2014 BRASIL. (http://www.softwarepublico.gov.br/)
 *
 * Este arquivo é parte do programa CMS Suindara.
 *
 * CMS Suindara é um software livre; você pode redistribui-lo e/ou
 * modifica-lo dentro dos termos da Licença Pública Geral GNU como
 * publicada pela Fundação do Software Livre (FSF); na versão 2 da
 * Licença, ou qualquer versão posterior
 *
 * O CMS Suindara é distribuido na esperança que possa ser útil,
 * porém, SEM NENHUMA GARANTIA; nem mesmo a garantia implicita de 
 * ADEQUAÇÃO a qualquer  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
 * Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU
 * junto com este programa, se não, acesse no website oficial
 * <http://www.gnu.org/licenses/> ou o Portal do Software Público 
 * Brasileiro <www.softwarepublico.gov.br>
 *
 */
App::uses('AppHelper', 'View/Helper');
App::uses('MidiaConfig', 'Midias.Lib');
App::uses('Image', 'Midias.Lib');

class CropHelper extends AppHelper {

	public $helpers = array('Html', 'Midias');

	public function create($data = array()) {
		if(array_key_exists('Midia', $data))
				$data = $data['Midia'];

		$midiaConfig = new MidiaConfig();
		$image = new Image($midiaConfig->midiaDir(IMAGEM, 'or') . $data['arquivo']);
		list($x,$y,$x2,$y2,$w,$h) = $image->cropSizes();
		
		$crop_width = ($w/2);
		$crop_height = ($h/2);
		
		$anim1 = $x.','.$y.','.$crop_width.','.$crop_height.','.$crop_width.','.$crop_height;
		$anim2 = ($image->width-$crop_width).','.$y.','.$image->width.','.$crop_height.','.$crop_width.','.$crop_height;
		$anim3 = (($image->width-$crop_width)/2 - $crop_width/3).','.(($image->height-$crop_height)/2 - $crop_height/3).','.((($image->width-$crop_width)/2)+$crop_width*4/3).','.((($image->height-$crop_height)/2)+$crop_height*4/3).','.$crop_width.','.$crop_height;
		$anim4 = $x.','.($image->height-$crop_height).','.$image->width.','.$image->height.','.$crop_width.','.$crop_height;
		$anim5 = ($image->width-$crop_width).','.($image->height-$crop_height).','.$image->width.','.$image->height.','.$crop_width.','.$crop_height;
		
		echo $this->Html->script('/midias/js/jquery.Jcrop.min.js',array('inline' => false));
		echo $this->Html->script('/midias/js/jquery.color.js',array('inline' => false));
		echo $this->Html->css('/midias/css/jquery.Jcrop.min', null, array('inline' => false));
		
		echo $this->Html->scriptBlock('
			$(function() {
				var jcrop_api;

				var areaSelecao = new Array();
				areaSelecao[1] = "quadrante superior esquerdo";
				areaSelecao[2] = "quadrante superior direito";
				areaSelecao[3] = "centralizado horizontal e verticalmente";
				areaSelecao[4] = "quadrante inferior esquerdo";
				areaSelecao[5] = "quadrante inferior direito";

				var box_width = $("div.content.form").width();
				
				if(box_width > 800)
			    	box_width = 800;
			    	box_height = 600;

				var box_height = box_width * 3 / 4;

				if(box_height > '.$image->height.')
					box_height = '.$image->height.'
				
				$("#crop").Jcrop({
					aspectRatio: 4 / 3,
					bgOpacity: .2,
		      		onSelect: updateCoords,
		      		onChange: updateCoords,
		      		allowResize: true,
		      		minSize: [160, 120],
		      		boxWidth: box_width,
			      	boxHeight: box_height,
		      		trueSize: ['.$image->width.', '.$image->height.'],
		      		setSelect: ['.$data['crop_x'].', '.$data['crop_y'].', '.$data['crop_x2'].', '.$data['crop_y2'].', '.', '.$data['crop_w'].', '.$data['crop_h'].']
				}, function(){
					var bounds = this.getBounds();
			        boundx = bounds[0];
			        boundy = bounds[1];
			      	jcrop_api = this;
			    });

			  	function updateCoords(c) {
				    $("#MidiaCropX").val(c.x);
				    $("#MidiaCropY").val(c.y);
				    $("#MidiaCropX2").val(c.x2);
				    $("#MidiaCropY2").val(c.y2);
				    $("#MidiaCropW").val(c.w);
				    $("#MidiaCropH").val(c.h);
				};
				
				$(window).resize(function() {
					verifySize();
				});
	
				$("#fadetog").change(function(){
			      jcrop_api.setOptions({
			        bgFade: this.checked
			      });
			    }).attr("checked","checked");
	
			    $("#shadetog").change(function(){
			      if (this.checked) $("#shadetxt").slideDown();
			        else $("#shadetxt").slideUp();
			      jcrop_api.setOptions({
			        shade: this.checked
			      });
			    }).attr("checked",false);
	
			    // Define page sections
			    var sections = {
			      bgc_buttons: "Contraste do editor",
			      anim_buttons: "Àrea para recorte"
			    };
				
			    // Define animation buttons
			    var ac = {
			      anim1: ['.$anim1.'],
			      anim2: ['.$anim2.'],
			      anim3: ['.$anim3.'],
			      anim4: ['.$anim4.'],
			      anim5: ['.$anim5.']
			    };
	
			    // Define bgColor buttons
			    var bgc = {
			    	Verde: "#177500",
			    	Azul: "#0C1889",
			    	Preto: "#000000"
			    };
				
			    // Create fieldset targets for buttons
			    for(i in sections)
			      insertSection(i,sections[i]);
	
			    function create_btn(c, i) {
			      var $o = $("<a href=\"#\" />").addClass("btn btn-small"+i);
			      if(!isNaN(c)) {
			      	if (c) $o.append("<span>Área de seleção "+c+" : "+areaSelecao[c]+"</span>");
			  	  } else {
			      	if (c) $o.append("<span>Cor da área de fundo para recorte: "+c+"</span>");
			  	  }
			      return $o;
			    }
	
			    var a_count = 1;
			    // Create animation buttons
			    for(i in ac) {
			      $("#anim_buttons .btn-group")
			        .append(
			          create_btn(a_count++, i).click(animHandler(ac[i])),
			          " "
			        );
			    }
	
			    // Create bgColor buttons
			    for(i in bgc) {
			      $("#bgc_buttons .btn-group").append(
			        create_btn(i,i).click(setoptHandler("bgColor",bgc[i])), " "
			      );
			    }
				
			    // Function to insert named sections into interface
			    function insertSection(k,v) {
			      $("#interface").prepend(
			        $("<div></div>").attr("id",k).append(
			          $("<h4></h4>").append(v),
			          "<div class=\"btn-toolbar\"><div class=\"btn-group\"></div></div>"
			        )
			      );
			    };
				
				
			    // Handler for option-setting buttons
			    function setoptHandler(k,v) {
			      return function(e) {
			        $(e.target).closest(".btn-group").find(".active").removeClass("active");
			        $(e.target).addClass("active");
			        var opt = { };
			        opt[k] = v;
			        jcrop_api.setOptions(opt);
			        e.preventDefault();
			      };
			    };
				
			    // Handler for animation buttons
			    function animHandler(v) {
			      return function(e) {
			        $(e.target).addClass("active");
			        jcrop_api.animateTo(v,function(){
			          $(e.target).closest(".btn-group").find(".active").removeClass("active");
			        });
					console.log(v);
					$("#MidiaCropX").val(v[0]);
				    $("#MidiaCropY").val(v[1]);
				    $("#MidiaCropX2").val(v[2]);
				    $("#MidiaCropY2").val(v[3]);
				    $("#MidiaCropW").val(v[4]);
				    $("#MidiaCropH").val(v[5]);
			        e.preventDefault();
			      };
			    };


			    function verifySize() {
			    	box_width = $("div.content.form").width();
				
					if(box_width > 800)
				    	box_width = 800;

					box_height = box_width * 3 / 4;

					jcrop_api.setOptions({
	           			boxWidth: box_width,
			      		boxHeight: box_height
	           		});

					jcrop_api.destroy();
					
					$("#crop").Jcrop({
						aspectRatio: 4 / 3,
						bgOpacity: .2,
			      		onSelect: updateCoords,
			      		onChange: updateCoords,
			      		allowResize: true,
			      		minSize: [160, 120],
			      		boxWidth: box_width,
				      	boxHeight: box_height,
			      		trueSize: ['.$image->width.', '.$image->height.'],
			      		setSelect: ['.$data['crop_x'].', '.$data['crop_y'].', '.$data['crop_x2'].', '.$data['crop_y2'].', '.', '.$data['crop_w'].', '.$data['crop_h'].']
					}, function(){
						var bounds = this.getBounds();
				        boundx = bounds[0];
				        boundy = bounds[1];
				      	jcrop_api = this;
				    });
					
			    }
	
			    $("#bgo_buttons .btn:first,#bgc_buttons .btn:last").addClass("active");
			    $("#interface").show();

			});
		');
		
		echo $this->Html->image($this->Midias->fileUrl($data['arquivo'], IMAGEM, 'or'),array('id' => 'crop'));
		echo $this->Html->div(null,null, array('id' => 'interface'));
	}
}