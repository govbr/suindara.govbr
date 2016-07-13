-- INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES(2, 'GovPrincipal', 1, 'GovPrincipal');
-- INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES(8, 'GovOutros', 1, 'GovOutros');
-- INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES(9, 'GovTopo', 1, 'GovTopo');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(20, 'Assuntos', 2, NULL, NULL, NULL, 1, NULL, 55, 64,  'Assuntos');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(25, 'Institucional', 2, '/', NULL, NULL, 2, 24, 66, 67, 'Institucional');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(26, 'Ações e programas', 2, '/', NULL, NULL, 2, 24, 68, 69,  'Ações e programas');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(34, 'Redes sociais', 8, NULL, NULL, NULL, 1, NULL, 71, 80,  'Redes sociais');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(35, 'RSS', 8, NULL, NULL, NULL, 1, NULL, 81, 86,  'RSS');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(36, 'Sobre o site', 8, NULL, NULL, NULL, 1, NULL, 87, 96,  'Sobre o site');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(38, 'Twitter', 8, '/', NULL, NULL, 1, 34, 72, 73,  'Twitter');

-- INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES(43, 'Perguntas frequentes', 'Perguntas frequentes', 9, '/faq', NULL, NULL, 1, 57, 98, 99);

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(44, 'Contato', 9, '/contato', NULL, NULL, 2, 57, 106, 107,  'Contato');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(45, 'Serviços da [Denominação]', 9, NULL, NULL, NULL, 1, 57, 100, 101,  'Serviços da [Denominação]');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(46, 'Dados abertos', 9, NULL, NULL, NULL, 1, 57, 104, 105,  'Dados abertos');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(47, 'Área de imprensa', 9, NULL, NULL, NULL, 1, 57, 102, 103,  'Área de imprensa');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(48, 'YouTube', 8, NULL, NULL, NULL, 1, 34, 74, 75,  'YouTube');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(49, 'Facebook', 8, NULL, NULL, NULL, 1, 34, 76, 77,  'Facebook');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(50, 'Flickr', 8, NULL, NULL, NULL, 1, 34, 78, 79,  'Flickr');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(51, 'O que é?', 8, NULL, NULL, NULL, 1, 35, 82, 83,  'O que é?');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(52, 'Assine', 8, NULL, NULL, NULL, 1, 35, 84, 85,  'Assine');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(53, 'Acessibilidade', 8, '/acessibilidade', NULL, NULL, 2, 36, 88, 89,  'Acessibilidade');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(54, 'Mapa do site', 8, '/mapa', NULL, NULL, 1, 36, 90, 91,  'Mapa do site');

-- INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`,  `identificador`) VALUES(57, 'Serviços', 9, NULL, NULL, NULL, 1, NULL, 97, 108,  'Serviços');






-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(4, 'Eventos', 'Eventos', NULL, 1, 7, 8);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(5, 'Suindara', 'Suindara', NULL, 1, 9, 10);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(6, 'Acessibilidade Manuais', 'Manuais', NULL, 1, 11, 12);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(7, 'Acessibilidade Dicas', 'Dicas de Acessibilidade', NULL, 1, 13, 14);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(8, 'Destaques', 'Destaques', NULL, 1, 15, 16);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(9, 'Pedagogico OAs', 'Dicas para pedagogos', NULL, 1, 17, 18);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(10, 'Pedagogico Manuais', 'Manuais do pedagógico', NULL, 1, 19, 20);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(11, 'TA Manuais', 'TA Manuais', NULL, 1, 21, 22);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(12, 'TA Dicas', 'TA Dicas', NULL, 1, 23, 24);
-- INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`) VALUES(13, 'Notícias', 'Notícias', NULL, 1, 25, 26);


