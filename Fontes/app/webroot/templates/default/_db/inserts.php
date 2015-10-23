<?php

// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(1, 'Eventos', 'Eventos', NULL, 1, 7, 8, '3');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(2, 'Acessibilidade Projetos', 'Projetos relacionados a Acessibilidade', NULL, 1, 9, 10, '4');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(3, 'Acessibilidade Manuais', 'Manuais', NULL, 1, 11, 12, '5');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(4, 'Acessibilidade Dicas', 'Dicas de Acessibilidade', NULL, 1, 13, 14, '6');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(5, 'Pedagogico Cursos', 'Projetos Pedagógicos', NULL, 1, 15, 16, '7');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(6, 'Pedagogico OAs', 'Dicas para pedagogos', NULL, 1, 17, 18, '8');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(7, 'Pedagogico Manuais', 'Manuais do pedagógico', NULL, 1, 19, 20, '9');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(8, 'TA Manuais', 'TA Manuais', NULL, 1, 21, 22, '10');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(9, 'TA Dicas', 'TA Dicas', NULL, 1, 23, 24, '11');
// INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `numero`) VALUES(10, 'TA Projetos', 'TA Projetos', NULL, 1, 25, 26, '12');
 
// INSERT INTO `menus` (`id`, `nome`, `site_id`) VALUES(1, 'AcessibilidadeVirtual', 1);
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(1, 'Página Inicial', 1, '/', NULL, NULL, 2, NULL, 15, 16, '1');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(2, 'Quem somos', 1, '/', NULL, NULL, 2, NULL, 17, 18, '2');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(3, 'Notícias', 1, '/noticias', NULL, NULL, 2, NULL, 21, 22, '4');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(4, 'Eventos', 1, '/eventos', NULL, 4, 2, NULL, 19, 20, '3');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(5, 'Acessibilidade Web', 1, '/acessibilidade', NULL, NULL, 2, NULL, 23, 32, '5');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(6, 'Pedagógico', 1, '/pedagogico', NULL, NULL, 2, NULL, 33, 42, '6');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(7, 'Tecnologia Assistiva', 1, '/tecnologia-assistiva', NULL, NULL, 2, NULL, 43, 52, '7');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(8, 'Contato', 1, '/contato', NULL, NULL, 2, NULL, 53, 54, '8');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(9, 'Projetos acessibilidade web', 1, '/acessibilidade/projetos', NULL, NULL, 2, 5, 28, 29, '5.3');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(10, 'Notícias acessibilidade web', 1, '/acessibilidade', NULL, NULL, 2, 5, 24, 25, '5.1');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(11, 'Dicas acessibilidade web', 1, '/acessibilidade/dicas', NULL, NULL, 2, 5, 26, 27, '5.2');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(12, 'Manuais acessibilidade web', 1, '/acessibilidade/manuais', NULL, NULL, 2, 5, 30, 31, '5.4');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(13, 'Cursos', 1, '/pedagogico/cursos', NULL, NULL, 2, 6, 34, 35, '6.1');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(14, 'Objetos de aprendizagem', 1, '/pedagogico/oas', NULL, NULL, 2, 6, 36, 37, '6.2');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(15, 'Notícias pedagógico', 1, '/pedagogico', NULL, NULL, 2, 6, 38, 39, '6.3');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(16, 'Manuais pedagógico', 1, '/pedagogico/manuais', NULL, NULL, 2, 6, 40, 41, '6.4');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(17, 'Projetos tecnologia assistiva', 1, '/tecnologia-assistiva/projetos', NULL, NULL, 2, 7, 46, 47, '7.1');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(18, 'Notícias tecnologia assistiva', 1, '/tecnologia-assistiva', NULL, NULL, 2, 7, 48, 49, '7.2');
// INSERT INTO `menu_itens` (`id`, `nome`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`, `numero`) VALUES(19, 'Manuais tecnologia assistiva', 1, '/tecnologia-assistiva/manuais', NULL, NULL, 2, 7, 50, 51, '7.3');
