<?php 

	class CmsTextSwap {

		static public function __($word) {
			// TODO Adaptar $map para o bootstrap dos módulos que forem utiliza-lo
			$map = array(
					'MenuItens' => 'Itens de Menu',
					'Grupos' => 'Grupos de Banners',
					'MidiasConteudos' => 'Conteúdos de Midia',
					'Install' => 'Instalador',
					'Usuarios' => 'Usuários',
					'Noticias' => 'Notícias',
					'Paginas' => 'Páginas',
					'Permissoes' => 'Permissões',
					'Midias' => 'Mídias',
					
					'listar' => 'Listagem',
					'cadastrar' => 'Cadastro',
					'editar' => 'Edição',
					'deletar' => 'Remoção',
					'visualizar' => 'Visualização',
					'destaque' => 'Destacar',
					'midias_preview' => 'Pré-Visualização de mídias',
					'arquivos_preview' => 'Pré-Visualização de arquivos',
					'midias' => 'Cadastro de mídias',
					'arquivos' => 'Cadastro de arquivos',
					'imagem' => 'Edição de imagem',
					'audio' => 'Edição de áudio',
					'video' => 'Edição de vídeo',
					'arquivo' => 'Edição de arquivo',
					'publicacao' => 'Publicação',
					'permitir' => 'Permitir acão',
					'bloquear' => 'Bloquear ação',
					
					'import_index' => 'Importação de usuários',
					'import_edit' => 'Edição de usuários importados',
					'import_delete' => 'Remoção de usuários importados',

					'admin_allow' => 'Permitir',
					'admin_deny' => 'Bloquear',

					'admin_index' => 'Listar',
					'admin_delete' => 'Deletar',
					'admin_edit' => 'Editar',
					'admin_view' => 'Visualizar',
					'admin_add' => 'Adicionar',


			);

			if (array_key_exists($word, $map)) {
				return $map[$word];
			} else {
				return $word;
			}

		}
	}