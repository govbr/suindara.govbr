--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `tempo_sessao`, `upload_tamanho`, `memoria_tamanho`, `post_tamanho`) VALUES
(1, '1440', '90', '150', '200');


--
-- Extraindo dados da tabela `tipos`
--

INSERT INTO `tipos` (`id`, `nome`) VALUES
(1, 'Imagem'),
(2, 'Vídeo'),
(3, 'Áudio'),
(4, 'Arquivo');

--
-- Extraindo dados da tabela `bm_tipos`
--

INSERT INTO `bm_tipos` (`id`, `nome`) VALUES
(1, 'Sem Link'),
(2, 'Link'),
(3, 'Página'),
(4, 'Categoria');

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` VALUES
(1, 'Público'),
(2, 'Rascunho'),
(3, 'Ativa'),
(4, 'Inativa');

--
-- Extraindo dados da tabela `contrastes`
--

INSERT INTO `contrastes` (`id`, `nome`) VALUES
(1, 'Alto Contraste Padrão'),
(2, 'Alto Contraste Preto'),
(3, 'Alto Contraste Azul'),
(4, 'Alto Contraste Verde');

--
-- Extraindo dados da tabela `fontes`
--

INSERT INTO `fontes` (`id`, `nome`) VALUES
(1, 'Fonte OpenDyslexic'),
(2, 'Fonte Trebuchet'),
(3, 'Fonte Arial'),
(4, 'Fonte Verdana');

--
-- Fazendo dump de dados para tabela `templates`
--

INSERT INTO `templates` (`id`, `nome`, `print`, `autor`, `caminho`, `descricao`) VALUES
(1, 'Template do Projeto de Acessibilidade Virtual', 'Site Modelo - Acessibilidade Virtual.png', 'Acessibilidade Virtual', 'default', 'Template do Site Modelo Versão 3 do Projeto de Acessibilidade Virtual');

INSERT INTO `templates` (`id`, `nome`, `print`, `autor`, `caminho`, `descricao`) VALUES
(2, 'Identidade Digital de Governo Eletrônico', 'gov.png', 'Site Modelo do Governo Eletrônico', 'gov', 'Site Modelo do Governo Eletrônico');

--
-- Extraindo dados da tabela `sites`
--

-- INSERT INTO `sites` (`id`, `titulo`, `descricao`, `instituicao`, `endereco`, `palavras_chave`, `email_contato`, `site_principal`, `dominio`, `template_id`) VALUES
-- (1, 'site teste', 'descrição', 'teste', 'teste', 'palavras, chave, separadas, por ,vírgula', 'teste@siteteste.com', 1, 'site.teste.com.br', 1);

--
-- Extraindo dados da tabela `perfis`
--

-- INSERT INTO `perfis` (`id`, `nome`, `descricao`, `site_id`) VALUES
-- (1, 'Teste', 'perfil teste', 1);

--
-- Extraindo dados da tabela `usuarios`
--

-- INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `departamento`, `telefone`, `instituicao`, `modo_sistema`, `fonte_id`, `contraste_id`, `site_id`, `root`) VALUES
-- (1, 'Root', 'admin@admin.com', '5d1eb17144c1810ff51ba79e5bb19f4521df359f', 'departamento', '99 99999999', 'teste', 0, 1, 1, 1, 1);

--
-- Extraindo dados da tabela `usuario_perfis`
--

-- INSERT INTO `usuario_perfis` (`id`, `usuario_id`, `perfil_id`) VALUES
-- (1, 1, 1);

--
-- Extraindo dados da tabela `aros`
--

-- INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
-- (1, NULL, 'Perfil', 1, '', 1, 2),
-- (2, 1, 'Usuario', 1, '', 3, 4);


INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES(2, 'GovPrincipal', 1, 'GovPrincipal');
INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES(8, 'GovRodape', 1, 'GovRodape');
INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES(9, 'GovTopo', 1, 'GovTopo');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(20, 'Assuntos', 2, NULL, NULL, NULL, 1, NULL, 55, 64,  'Assuntos');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(25, 'Institucional', 2, '/', NULL, NULL, 2, 24, 66, 67, 'Institucional');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(26, 'Ações e programas', 2, '/', NULL, NULL, 2, 24, 68, 69,  'Ações e programas');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(34, 'Redes sociais', 8, NULL, NULL, NULL, 1, NULL, 71, 80,  'Redes sociais');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(35, 'RSS', 8, NULL, NULL, NULL, 1, NULL, 81, 86,  'RSS');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(36, 'Sobre o site', 8, NULL, NULL, NULL, 1, NULL, 87, 96,  'Sobre o site');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(38, 'Twitter', 8, '/', NULL, NULL, 1, 34, 72, 73,  'Twitter');

INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES(43, 'Perguntas frequentes', 'Perguntas frequentes', 9, '/faq', NULL, NULL, 1, 57, 98, 99);

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(44, 'Contato', 9, '/contato', NULL, NULL, 2, 57, 106, 107,  'Contato');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(45, 'Serviços da [Denominação]', 9, NULL, NULL, NULL, 1, 57, 100, 101,  'Serviços da [Denominação]');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(46, 'Dados abertos', 9, NULL, NULL, NULL, 1, 57, 104, 105,  'Dados abertos');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(47, 'Área de imprensa', 9, NULL, NULL, NULL, 1, 57, 102, 103,  'Área de imprensa');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(48, 'YouTube', 8, NULL, NULL, NULL, 1, 34, 74, 75,  'YouTube');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(49, 'Facebook', 8, NULL, NULL, NULL, 1, 34, 76, 77,  'Facebook');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(50, 'Flickr', 8, NULL, NULL, NULL, 1, 34, 78, 79,  'Flickr');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(51, 'O que é?', 8, NULL, NULL, NULL, 1, 35, 82, 83,  'O que é?');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(52, 'Assine', 8, NULL, NULL, NULL, 1, 35, 84, 85,  'Assine');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(53, 'Acessibilidade', 8, '/acessibilidade', NULL, NULL, 2, 36, 88, 89,  'Acessibilidade');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(54, 'Mapa do site', 8, NULL, NULL, NULL, 1, 36, 90, 91,  'Mapa do site');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(55, 'Versión en Español', 8, NULL, NULL, NULL, 1, 36, 92, 93,  'Versión en Español');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(56, 'English version', 8, NULL, NULL, NULL, 1, 36, 94, 95,  'English version');

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(57, 'Serviços', 9, NULL, NULL, NULL, 1, NULL, 97, 108,  'Serviços');






INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(4, 'Eventos', 'Eventos', NULL, 1, 7, 8, 'Eventos');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(5, 'Acessibilidade Projetos', 'Projetos de Acessibilidade', NULL, 1, 9, 10, 'Acessibilidade Projetos');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(6, 'Acessibilidade Manuais', 'Manuais', NULL, 1, 11, 12, 'Acessibilidade Manuais');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(7, 'Acessibilidade Dicas', 'Dicas de Acessibilidade', NULL, 1, 13, 14, 'Acessibilidade Dicas');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(8, 'Pedagogico Cursos', 'Projetos Pedagógicos', NULL, 1, 15, 16, 'Pedagogico Cursos');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(9, 'Pedagogico OAs', 'Dicas para pedagogos', NULL, 1, 17, 18, 'Pedagogico OAs');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(10, 'Pedagogico Manuais', 'Manuais do pedagógico', NULL, 1, 19, 20, 'Pedagogico Manuais');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(11, 'TA Manuais', 'TA Manuais', NULL, 1, 21, 22, 'TA Manuais');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(12, 'TA Dicas', 'TA Dicas', NULL, 1, 23, 24, 'TA Dicas');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES(13, 'TA Projetos', 'TA Projetos', NULL, 1, 25, 26, 'TA Projetos');






