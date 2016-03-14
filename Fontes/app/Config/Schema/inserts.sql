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
(2, 'Identidade Digital de Governo Eletrônico', 'gov.png', 'Site Modelo do Governo Eletrônico', 'gov', 'Site Modelo do Governo Eletrônico', ""),
(3, 'Site Modelo 3', 'default.png', 'Site Modelo 3', 'siteModelo3', 'Site Modelo 3', "");


-- -- Grupos
INSERT INTO `grupos` (`id`, `nome`, `site_id`) VALUES
(1, 'Página Inicial', 1);


-- -- Banners   Colocar imagens
-- INSERT INTO `banners` (`id`, `titulo`, `descricao`, `arquivo`, `link`, `categoria_id`, `pagina_id`, `bm_tipo_id`, `lft`, `rght`, `site_id`, `grupo_id`, `parent_id`) VALUES 
-- (1, 'YouTube', 'Siga nosso Canal no Youtube', '178519344cd88b96e0b77c2ca0ff5bb0.png', 'https://www.youtube.com/user/AcessibilidadeCanal', NULL, NULL, 2, 1, 2, 1, 1, 0),
-- (2, 'Blog', 'Acesse nosso Blog: Acessibilidade Virtual', '8bf3b622967725ed3327becd565b5df1.png', 'http://blog.acessibilidade.bento.ifrs.edu.br/', NULL, NULL, 2, 3, 4, 1, 1, 0),
-- (3, 'Facebook', 'Siga nossas Redes Sociais', 'b571538185819e33173e51fb06ed9f1c.png', 'https://www.facebook.com/acessibilidadevirtual', NULL, NULL, 2, 5, 6, 1, 1, 0);


--
-- Fazendo dump de dados para tabela `categorias`
--
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES
(1, 'Eventos', 'Eventos', NULL, 1, 1, 2, 'eventos'),
(2, 'Acessibilidade Projetos', 'Acessibilidade Projetos', NULL, 1, 3, 4, 'acessibilidade_projetos'),
(3, 'Acessibilidade Manuais', 'Manuais de Acessibilidade', NULL, 1, 5, 6, 'acessibilidade_manuais'),
(4, 'Acessibilidade Dicas', 'Dicas de Acessibilidade', NULL, 1, 7, 8, 'acessibilidade_dicas'),
(5, 'Pedagógico Cursos', 'Cursos Pedagógicos', NULL, 1, 9, 10, 'pedagogico_cursos'),
(6, 'Pedagógico OAs', 'OAs do pedagógico', NULL, 1, 11, 12, 'pedagogico_oas'),
(7, 'Pedagógico Manuais', 'Manuais do pedagógico', NULL, 1, 13, 14, 'pedagogico_manuais'),
(8, 'TA Manuais', 'TA Manuais', NULL, 1, 15, 16, 'ta_manuais'),
(9, 'TA Dicas', 'TA Dicas', NULL, 1, 17, 18, 'ta_dicas'),
(10, 'TA Projetos', 'TA Projetos', NULL, 1, 19, 20, 'ta_projetos'),
(11, 'Notícias', 'Todas notícias', NULL, 1, 21, 28, 'noticias'),
(12, 'Acessibilidade Virtual', 'Notícias da Acessibilidade Digital', 11, 1, 22, 23, 'acessibilidade_virtual'),
(13, 'Tecnologia Assistiva', 'Notícias da Tecnologia Assistiva', 11, 1, 24, 25, 'tecnologia_assistiva'),
(14, 'Eventos', 'Notícias eventos', 11, 1, 26, 27, 'eventos'),
(15, 'Manuais', 'Todos os manuais', NULL, 1, 29, 38, 'manuais'),
(16, 'Tecnologia Assistiva', 'Manuais da Tecnologia Assistiva', 15, 1, 30, 31, 'tecnologia_assistiva'),
(17, 'Leitores de Tela', 'Manuais de leitores de tela', 15, 1, 32, 33, 'leitores_de_tela'),
(18, 'Acessibilidade Virtual', 'Manuais da Acessibilidade Virtual', 15, 1, 34, 35, 'acessibilidade_virtual'),
(19, 'Softwares Educativos', 'Manuais sobre Software Educativos', 15, 1, 36, 37, 'softwares_educativos'),
(20, 'Cursos', 'Todos os cursos', NULL, 1, 39, 40, 'cursos'),
(21, 'Projetos', 'Todos os projetos', NULL, 1, 41, 50, 'projetos'),
(22, 'Publicações', 'Todas as publicações', NULL, 1, 51, 52, 'publicacoes'),
(23, 'Tecnologia Assistiva', 'Projetos da Tecnologia Assistiva', 21, 1, 42, 43, 'tecnologia_assistiva'),
(24, 'eMAG', 'Projetos do eMAG', 21, 1, 44, 45, 'emag'),
(25, 'CMS Suindara', 'Projetos do CMS Suindara', 21, 1, 46, 47, 'cms_suindara'),
(26, 'Objetos de Aprendizagem', 'Projetos dos objetos de aprendizagem', 21, 1, 48, 49, 'objetos_de_aprendizagem');


--
-- Fazendo dump de dados para tabela `menu`
--
INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES
(1, 'Menu Principal Horizontal', 1, 'menu_principal_horizontal'),
(2, 'Barra de Acessibilidade', 1, 'barra_acessibilidade'),
(3, 'Acessibilidade Virtual', 1, 'AcessibilidadeVirtual'),
(4, 'GovPrincipal', 1, 'GovPrincipal'),
(5, 'GovRodape', 1, 'GovRodape'),
(6, 'GovTopo', 1, 'GovTopo');



--
-- Fazendo dump de dados para tabela `menu itens`
--
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES
(1, 'Página Inicial', 'pagina_inicial', 1, '/', NULL, NULL, 2, NULL, 1, 2),
(2, 'Quem Somos', 'quem_somos', 1, '/quem_somos', NULL, NULL, 2, NULL, 3, 4),
(3, 'Notícias', 'noticias', 1, '/noticias/index', NULL, NULL, 2, NULL, 5, 6),
(4, 'Manuais', 'manuais', 1, '/manuais/index', NULL, NULL, 2, NULL, 7, 8),
(5, 'Cursos', 'cursos', 1, '/cursos/index', NULL, NULL, 2, NULL, 9, 10),
(6, 'Projetos', 'projetos', 1, '/projetos/index', NULL, NULL, 2, NULL, 11, 12),
(7, 'Publicações', 'publicacoes', 1, '/publicacoes/index', NULL, NULL, 2, NULL, 13, 14),
(8, 'Contato', 'contato', 1, '/contato', NULL, NULL, 2, NULL, 15, 16),
(9, 'Ir para o conteúdo', 'ir_conteudo', 2, '#conteudo_ref', NULL, NULL, 2, NULL, 17, 18),
(10, 'Ir para a navegação', 'ir_navegacao', 2, '#menu_ref', NULL, NULL, 2, NULL, 19, 20),
(11, 'Acessibilidade', 'acessibilidade', 2, '/acessibilidade', NULL, NULL, 2, NULL, 21, 22),
(12, 'Alto Contraste', 'alto_contraste', 2, '#', NULL, NULL, 2, NULL, 23, 24),
(13, 'Mapa do Site', 'mapa_do_site', 2, '/mapa_do_site', NULL, NULL, 2, NULL, 25, 26),
(14, 'Assuntos', 'assuntos', 4, NULL, NULL, NULL, 1, NULL, 27, 32),
(15, 'Institucional', 'institucional', 4, '/', NULL, NULL, 2, 14, 28, 29),
(16, 'Ações e programas', 'access_e_programas', 4, '/', NULL, NULL, 2, 14, 30, 31),
(17, 'Redes sociais', 'redes_sociais', 5, NULL, NULL, NULL, 1, NULL, 33, 42),
(18, 'RSS', 'rss', 5, NULL, NULL, NULL, 1, NULL, 43, 48),
(19, 'Sobre o site', 'sobre_o_site', 5, NULL, NULL, NULL, 1, NULL, 49, 56),
(20, 'Twitter', 'twitter', 5, '/', NULL, NULL, 2, 17, 34, 35),
(21, 'Serviços', 'servicos', 6, NULL, NULL, NULL, 1, NULL, 57, 68),
(22, 'Perguntas frequentes', 'perguntas_frequentes', 6, '/faq', NULL, NULL, 2, 21, 58, 59),
(23, 'Contato', 'contato2', 6, '/contato', NULL, NULL, 2, 21, 60, 61),
(24, 'Serviços da [Denominação]', 'services_da_denominacao', 6, NULL, NULL, NULL, 1, 21, 62, 63),
(25, 'Dados abertos', 'dados_abertos', 6, NULL, NULL, NULL, 1, 21, 64, 65),
(26, 'Área de imprensa', 'area_de_imprensa', 6, NULL, NULL, NULL, 1, 21, 66, 67),
(27, 'Youtube', 'youtube', 5, NULL, NULL, NULL, 1, 17, 36, 37),
(28, 'Facebook', 'facebook', 5, NULL, NULL, NULL, 1, 17, 38, 39),
(29, 'Flickr', 'flickr', 5, NULL, NULL, NULL, 1, 17, 40, 41),
(30, 'O que é?', 'o_que_e', 5, NULL, NULL, NULL, 1, 18, 44, 45),
(31, 'Assine', 'assine', 5, NULL, NULL, NULL, 1, 18, 46, 47),
(32, 'Acessibilidade', 'acessibilidade2', 5, '/acessibilidade', NULL, NULL, 2, 19, 50, 51),
(33, 'Mapa do site', 'mapa_do_site2', 5, NULL, NULL, NULL, 1, 19, 52, 53),
(34, 'Versión en Español', 'version_en_espanol', 5, NULL, NULL, NULL, 1, 19, 69, 70),
(35, 'English version', 'english_version', 5, NULL, NULL, NULL, 1, 19, 54, 55),
(37, 'Página Inicial', 'pagina_inicial2', 3, '/', NULL, NULL, 2, NULL, 71, 72),
(38, 'Quem Somos', 'quem_somos2', 3, '/', NULL, NULL, 2, NULL, 73, 74),
(39, 'Notícias', 'noticias2', 3, '/noticias', NULL, NULL, 2, NULL, 75, 76),
(40, 'Eventos', 'eventos', 3, '/eventos', NULL, NULL, 2, NULL, 77, 78),
(41, 'Acessbilidade Web', 'acessibilidade_web', 3, '/acessibilidade', NULL, NULL, 2, NULL, 79, 88),
(42, 'Pedagógico', 'pedagogico', 3, '/pedagogico', NULL, NULL, 2, NULL, 89, 98),
(43, 'Tecnologia Assistiva', 'tecnologia_assistiva', 3, '/tecnologia-assistiva', NULL, NULL, 2, NULL, 99, 106),
(44, 'Contato', 'contato3', 3, '/contato', NULL, NULL, 2, NULL, 107, 108),
(45, 'Projetos acessibilidade web', 'projetos_acessibilidade_web', 3, '/acessibilidade/projetos', NULL, NULL, 2, 41, 80, 81),
(46, 'Notícias acessibilidade web', 'noticias_acessibilidade_web', 3, '/acessibilidade', NULL, NULL, 2, 41, 82, 83),
(47, 'Dicas acessibilidade web', 'dicas_acessibilidade_web', 3, '/acessbilidade/dicas', NULL, NULL, 2, 41, 84, 85),
(48, 'Manuais acessibilidade web', 'manuais_acessibilidade_web', 3, '/acessibilidade/manuais', NULL, NULL, 2, 41, 86, 87),
(49, 'Cursos', 'cursos2', 3, '/pedagogico/cursos', NULL, NULL, 2, 42, 90, 91),
(50, 'Objetos de aprendizagem', 'objetos_de_aprendizagem', 3, '/pedagogico/oas', NULL, NULL, 2, 42, 92, 93),
(51, 'Notícias pedagógico', 'noticias_pedagogico', 3, '/pedagogico', NULL, NULL, 2, 42, 94, 95),
(52, 'Manuais pedagógico', 'manuais_pedagogico', 3, '/pedagogico/manuais', NULL, NULL, 2, 42, 96, 97),
(53, 'Projetos tecnologia assistiva', 'projetos_tecnologia_assistiva', 3, '/tecnologia-assistiva/projetos', NULL, NULL, 2, 43, 100, 101),
(54, 'Notícias tecnologia assistiva', 'noticias_tecnlogia_assistiva', 3, '/tecnologia-assistiva', NULL, NULL, 2, 43, 102, 103),
(55, 'Manuais tecnologia assistiva', 'manuais_tecnologia_assistiva', 3, '/tecnologia-assistiva/manuais', NULL, NULL, 2, 43, 104, 105);




