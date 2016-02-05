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

INSERT INTO `templates` (`id`, `nome`, `print`, `autor`, `caminho`, `descricao`, `nome_original`) VALUES
(1, 'Template do Projeto de Acessibilidade Virtual', 'Site Modelo - Acessibilidade Virtual.png', 'Acessibilidade Virtual', 'default', 'Template do Site Modelo Versão 3 do Projeto de Acessibilidade Virtual', ""),
(2, 'Identidade Digital de Governo Eletrônico', 'gov.png', 'Site Modelo do Governo Eletrônico', 'gov', 'Site Modelo do Governo Eletrônico', "");



INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES
(1, 'GovPrincipal', 1, 'GovPrincipal'),
(2, 'GovRodape', 1, 'GovRodape'),
(3, 'GovTopo', 1, 'GovTopo');


--
-- Extraindo dados da tabela `menu_itens`
--

INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES
(20, 'Assuntos', 1, NULL, NULL, NULL, 1, NULL, 55, 64,  'Assuntos'),
(25, 'Institucional', 1, '/', NULL, NULL, 2, NULL, 66, 67, 'Institucional'),
(26, 'Ações e programas', 1, '/', NULL, NULL, 2, 24, 68, 69,  'Ações e programas'),
(34, 'Redes sociais', 2, NULL, NULL, NULL, 1, NULL, 71, 80,  'Redes sociais'),
(35, 'RSS', 2, NULL, NULL, NULL, 1, NULL, 81, 86,  'RSS'),
(36, 'Sobre o site', 2, NULL, NULL, NULL, 1, NULL, 87, 96,  'Sobre o site'),
(38, 'Twitter', 2, '/', NULL, NULL, 1, 34, 72, 73,  'Twitter'),
(43, 'Perguntas frequentes', 3, '/faq', NULL, NULL, 1, 57, 98, 99, 'Perguntas frequentes'),
(44, 'Contato', 3, '/contato', NULL, NULL, 2, 57, 106, 107,  'Contato'),
(45, 'Serviços da [Denominação]', 3, NULL, NULL, NULL, 1, 57, 100, 101,  'Serviços da [Denominação]'),
(46, 'Dados abertos', 3, NULL, NULL, NULL, 1, 57, 104, 105,  'Dados abertos'),
(47, 'Área de imprensa', 3, NULL, NULL, NULL, 1, 57, 102, 103,  'Área de imprensa'),
(48, 'YouTube', 2, NULL, NULL, NULL, 1, 34, 74, 75,  'YouTube'),
(49, 'Facebook', 2, NULL, NULL, NULL, 1, 34, 76, 77,  'Facebook'),
(50, 'Flickr', 2, NULL, NULL, NULL, 1, 34, 78, 79,  'Flickr'),
(51, 'O que é?', 2, NULL, NULL, NULL, 1, 35, 82, 83,  'O que é?'),
(52, 'Assine', 2, NULL, NULL, NULL, 1, 35, 84, 85,  'Assine'),
(53, 'Acessibilidade', 2, '/acessibilidade', NULL, NULL, 2, 36, 88, 89,  'Acessibilidade'),
(54, 'Mapa do site', 2, NULL, NULL, NULL, 1, 36, 90, 91,  'Mapa do site'),
(55, 'Versión en Español', 2, NULL, NULL, NULL, 1, 36, 92, 93,  'Versión en Español'),
(56, 'English version', 2, NULL, NULL, NULL, 1, 36, 94, 95,  'English version'),
(57, 'Serviços', 3, NULL, NULL, NULL, 1, NULL, 97, 108,  'Serviços');


--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES
(1, 'Eventos', 'Eventos', NULL, 1, 7, 8, 'Eventos'),
(2, 'Acessibilidade Projetos', 'Projetos de Acessibilidade', NULL, 1, 9, 10, 'Acessibilidade Projetos'),
(3, 'Acessibilidade Manuais', 'Manuais', NULL, 1, 11, 12, 'Acessibilidade Manuais'),
(4, 'Acessibilidade Dicas', 'Dicas de Acessibilidade', NULL, 1, 13, 14, 'Acessibilidade Dicas'),
(5, 'Pedagogico Cursos', 'Projetos Pedagógicos', NULL, 1, 15, 16, 'Pedagogico Cursos'),
(6, 'Pedagogico OAs', 'Dicas para pedagogos', NULL, 1, 17, 18, 'Pedagogico OAs'),
(7, 'Pedagogico Manuais', 'Manuais do pedagógico', NULL, 1, 19, 20, 'Pedagogico Manuais'),
(8, 'TA Manuais', 'TA Manuais', NULL, 1, 21, 22, 'TA Manuais'),
(9, 'TA Dicas', 'TA Dicas', NULL, 1, 23, 24, 'TA Dicas'),
(10, 'TA Projetos', 'TA Projetos', NULL, 1, 25, 26, 'TA Projetos');






