--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `tempo_sessao`, `upload_tamanho`, `memoria_tamanho`, `post_tamanho`) VALUES
(1, '1440', '10', '150', '200');


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
(1, 'Site Modelo', 'Site Modelo - Acessibilidade Virtual.png', 'Acessibilidade Virtual', 'default', 'Template do Site Modelo do projeto Acessibilidade Virtual');

INSERT INTO `templates` (`id`, `nome`, `print`, `autor`, `caminho`, `descricao`) VALUES
(2, 'Site Modelo do Governo Eletrônico', 'gov.png', 'Site Modelo do Governo Eletrônico', 'gov', 'Site Modelo do Governo Eletrônico');

--
-- Extraindo dados da tabela `sites`
--

-- INSERT INTO `sites` (`id`, `titulo`, `descricao`, `instituicao`, `endereco`, `palavras_chave`, `email_contato`, `site_principal`, `dominio`, `template_id`) VALUES
-- 1,'Suindara','descrição','Ministério do Planejamento','teste','palavras, chave, separadas, por ,vírgula','teste@siteteste.com',1,'localhost',1);

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


INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (1, 'x-world/x-3dmf', 4, '3dm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (2, 'x-world/x-3dmf', 4, '3dmf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (3, 'application/octet-stream', 4, 'a', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (4, 'application/x-authorware-bin', 4, 'aab', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (5, 'application/x-authorware-map', 4, 'aam', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (6, 'application/x-authorware-seg', 4, 'aas', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (7, 'text/vnd.abc', 4, 'abc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (8, 'text/html', 4, 'acgi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (9, 'video/animaflex', 2, 'afl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (10, 'application/postscript', 4, 'ai', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (11, 'audio/aiff', 3, 'aif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (12, 'audio/x-aiff', 3, 'aif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (13, 'audio/aiff', 3, 'aifc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (14, 'audio/x-aiff', 3, 'aifc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (15, 'audio/aiff', 3, 'aiff', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (16, 'audio/x-aiff', 3, 'aiff', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (17, 'application/x-aim', 4, 'aim', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (18, 'text/x-audiosoft-intra', 4, 'aip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (19, 'application/x-navi-animation', 4, 'ani', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (20, 'application/x-nokia-9000-communicator-add-on-', 4, 'aos', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (21, 'application/mime', 4, 'aps', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (22, 'application/octet-stream', 4, 'arc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (23, 'application/arj', 4, 'arj', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (24, 'application/octet-stream', 4, 'arj', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (25, 'image/x-jg', 1, 'art', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (26, 'video/x-ms-asf', 2, 'asf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (27, 'text/x-asm', 4, 'asm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (28, 'text/asp', 4, 'asp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (29, 'application/x-mplayer2', 4, 'asx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (30, 'video/x-ms-asf', 2, 'asx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (31, 'video/x-ms-asf-plugin', 2, 'asx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (32, 'audio/basic', 3, 'au', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (33, 'audio/x-au', 3, 'au', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (34, 'application/x-troff-msvideo', 4, 'avi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (35, 'video/avi', 2, 'avi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (36, 'video/msvideo', 2, 'avi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (37, 'video/x-msvideo', 2, 'avi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (38, 'video/avs-video', 2, 'avs', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (39, 'application/x-bcpio', 4, 'bcpio', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (40, 'application/mac-binary', 4, 'bin', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (41, 'application/macbinary', 4, 'bin', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (42, 'application/octet-stream', 4, 'bin', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (43, 'application/x-binary', 4, 'bin', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (44, 'application/x-macbinary', 4, 'bin', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (45, 'image/bmp', 1, 'bm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (46, 'image/bmp', 1, 'bmp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (47, 'image/x-windows-bmp', 1, 'bmp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (48, 'application/book', 4, 'boo', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (49, 'application/book', 4, 'book', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (50, 'application/x-bzip2', 4, 'boz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (51, 'application/x-bsh', 4, 'bsh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (52, 'application/x-bzip', 4, 'bz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (53, 'application/x-bzip2', 4, 'bz2', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (54, 'text/plain', 4, 'c', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (55, 'text/x-c', 4, 'c', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (56, 'text/plain', 4, 'c++', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (57, 'application/vnd.ms-pki.seccat', 4, 'cat', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (58, 'text/plain', 4, 'cc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (59, 'text/x-c', 4, 'cc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (60, 'application/clariscad', 4, 'ccad', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (61, 'application/x-cocoa', 4, 'cco', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (62, 'application/cdf', 4, 'cdf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (63, 'application/x-cdf', 4, 'cdf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (64, 'application/x-netcdf', 4, 'cdf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (65, 'application/pkix-cert', 4, 'cer', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (66, 'application/x-x509-ca-cert', 4, 'cer', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (67, 'application/x-chat', 4, 'cha', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (68, 'application/x-chat', 4, 'chat', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (69, 'application/java', 4, 'class', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (70, 'application/java-byte-code', 4, 'class', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (71, 'application/x-java-class', 4, 'class', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (72, 'application/octet-stream', 4, 'com', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (73, 'text/plain', 4, 'com', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (74, 'text/plain', 4, 'conf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (75, 'application/x-cpio', 4, 'cpio', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (76, 'text/x-c', 4, 'cpp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (77, 'application/mac-compactpro', 4, 'cpt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (78, 'application/x-compactpro', 4, 'cpt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (79, 'application/x-cpt', 4, 'cpt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (80, 'application/pkcs-crl', 4, 'crl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (81, 'application/pkix-crl', 4, 'crl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (82, 'application/pkix-cert', 4, 'crt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (83, 'application/x-x509-ca-cert', 4, 'crt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (84, 'application/x-x509-user-cert', 4, 'crt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (85, 'application/x-csh', 4, 'csh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (86, 'text/x-script.csh', 4, 'csh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (87, 'application/x-pointplus', 4, 'css', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (88, 'text/css', 4, 'css', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (89, 'text/plain', 4, 'cxx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (90, 'application/x-director', 4, 'dcr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (91, 'application/x-deepv', 4, 'deepv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (92, 'text/plain', 4, 'def', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (93, 'application/x-x509-ca-cert', 4, 'der', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (94, 'video/x-dv', 2, 'dif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (95, 'application/x-director', 4, 'dir', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (96, 'video/dl', 2, 'dl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (97, 'video/x-dl', 2, 'dl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (98, 'application/msword', 4, 'doc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (99, 'application/msword', 4, 'dot', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (100, 'application/commonground', 4, 'dp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (101, 'application/drafting', 4, 'drw', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (102, 'application/octet-stream', 4, 'dump', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (103, 'video/x-dv', 2, 'dv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (104, 'application/x-dvi', 4, 'dvi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (105, 'drawing/x-dwf (old)', 4, 'dwf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (106, 'model/vnd.dwf', 4, 'dwf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (107, 'application/acad', 4, 'dwg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (108, 'image/vnd.dwg', 1, 'dwg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (109, 'image/x-dwg', 1, 'dwg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (110, 'application/dxf', 4, 'dxf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (111, 'image/vnd.dwg', 4, 'dxf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (112, 'image/x-dwg', 1, 'dxf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (113, 'application/x-director', 4, 'dxr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (114, 'text/x-script.elisp', 4, 'el', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (115, 'application/x-bytecode.elisp (compiled elisp)', 4, 'elc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (116, 'application/x-elc', 4, 'elc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (117, 'application/x-envoy', 4, 'env', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (118, 'application/postscript', 4, 'eps', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (119, 'application/x-esrehber', 4, 'es', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (120, 'text/x-setext', 4, 'etx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (121, 'application/envoy', 4, 'evy', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (122, 'application/x-envoy', 4, 'evy', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (123, 'application/octet-stream', 4, 'exe', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (124, 'text/plain', 4, 'f', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (125, 'text/x-fortran', 4, 'f', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (126, 'text/x-fortran', 4, 'f77', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (127, 'text/plain', 4, 'f90', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (128, 'text/x-fortran', 4, 'f90', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (129, 'application/vnd.fdf', 4, 'fdf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (130, 'application/fractals', 4, 'fif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (131, 'image/fif', 4, 'fif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (132, 'video/fli', 1, 'fli', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (133, 'video/x-fli', 2, 'fli', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (134, 'image/florian', 1, 'flo', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (135, 'text/vnd.fmi.flexstor', 4, 'flx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (136, 'video/x-atomic3d-feature', 2, 'fmf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (137, 'text/plain', 4, 'for', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (138, 'text/x-fortran', 4, 'for', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (139, 'image/vnd.fpx', 1, 'fpx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (140, 'image/vnd.net-fpx', 1, 'fpx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (141, 'application/freeloader', 4, 'frl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (142, 'audio/make', 3, 'funk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (143, 'text/plain', 4, 'g', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (144, 'image/g3fax', 1, 'g3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (145, 'image/gif', 1, 'gif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (146, 'video/gl', 2, 'gl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (147, 'video/x-gl', 2, 'gl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (148, 'audio/x-gsm', 3, 'gsd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (149, 'audio/x-gsm', 3, 'gsm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (150, 'application/x-gsp', 4, 'gsp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (151, 'application/x-gss', 4, 'gss', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (152, 'application/x-gtar', 4, 'gtar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (153, 'application/x-compressed', 4, 'gz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (154, 'application/x-gzip', 4, 'gz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (155, 'application/x-gzip', 4, 'gzip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (156, 'multipart/x-gzip', 4, 'gzip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (157, 'text/plain', 4, 'h', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (158, 'text/x-h', 4, 'h', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (159, 'application/x-hdf', 4, 'hdf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (160, 'application/x-helpfile', 4, 'help', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (161, 'application/vnd.hp-hpgl', 4, 'hgl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (162, 'text/plain', 4, 'hh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (163, 'text/x-h', 4, 'hh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (164, 'text/x-script', 4, 'hlb', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (165, 'application/hlp', 4, 'hlp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (166, 'application/x-helpfile', 4, 'hlp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (167, 'application/x-winhelp', 4, 'hlp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (168, 'application/vnd.hp-hpgl', 4, 'hpg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (169, 'application/vnd.hp-hpgl', 4, 'hpgl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (170, 'application/binhex', 4, 'hqx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (171, 'application/binhex4', 4, 'hqx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (172, 'application/mac-binhex', 4, 'hqx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (173, 'application/mac-binhex40', 4, 'hqx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (174, 'application/x-binhex40', 4, 'hqx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (175, 'application/x-mac-binhex40', 4, 'hqx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (176, 'application/hta', 4, 'hta', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (177, 'text/x-component', 4, 'htc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (178, 'text/html', 4, 'htm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (179, 'text/html', 4, 'html', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (180, 'text/html', 4, 'htmls', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (181, 'text/webviewhtml', 4, 'htt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (182, 'text/html', 4, 'htx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (183, 'x-conference/x-cooltalk', 4, 'ice', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (184, 'image/x-icon', 1, 'ico', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (185, 'text/plain', 4, 'idc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (186, 'image/ief', 1, 'ief', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (187, 'image/ief', 1, 'iefs', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (188, 'application/iges', 4, 'iges', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (189, 'model/iges', 4, 'iges', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (190, 'application/iges', 4, 'igs', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (191, 'model/iges', 4, 'igs', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (192, 'application/x-ima', 4, 'ima', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (193, 'application/x-httpd-imap', 4, 'imap', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (194, 'application/inf', 4, 'inf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (195, 'application/x-internett-signup', 4, 'ins', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (196, 'application/x-ip2', 4, 'ip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (197, 'video/x-isvideo', 2, 'isu', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (198, 'audio/it', 3, 'it', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (199, 'application/x-inventor', 4, 'iv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (200, 'i-world/i-vrml', 4, 'ivr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (201, 'application/x-livescreen', 4, 'ivy', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (202, 'audio/x-jam', 3, 'jam', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (203, 'text/plain', 4, 'jav', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (204, 'text/x-java-source', 4, 'jav', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (205, 'text/plain', 4, 'java', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (206, 'text/x-java-source', 4, 'java', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (207, 'application/x-java-commerce', 4, 'jcm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (208, 'image/jpeg', 1, 'jfif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (209, 'image/pjpeg', 1, 'jfif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (210, 'image/jpeg', 1, 'jfif-', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (211, 'image/jpeg', 1, 'jpe', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (212, 'image/pjpeg', 1, 'jpe', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (213, 'image/jpeg', 1, 'jpeg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (214, 'image/pjpeg', 1, 'jpeg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (215, 'image/jpeg', 1, 'jpg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (216, 'image/pjpeg', 1, 'jpg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (217, 'image/x-jps', 1, 'jps', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (218, 'application/x-javascript', 4, 'js', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (219, 'application/javascript', 4, 'js', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (220, 'application/ecmascript', 4, 'js', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (221, 'text/javascript', 4, 'js', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (222, 'text/ecmascript', 4, 'js', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (223, 'image/jutvision', 1, 'jut', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (224, 'audio/midi', 3, 'kar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (225, 'music/x-karaoke', 3, 'kar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (226, 'application/x-ksh', 4, 'ksh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (227, 'text/x-script.ksh', 4, 'ksh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (228, 'audio/nspaudio', 3, 'la', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (229, 'audio/x-nspaudio', 3, 'la', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (230, 'audio/x-liveaudio', 3, 'lam', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (231, 'application/x-latex', 4, 'latex', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (232, 'application/lha', 4, 'lha', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (233, 'application/octet-stream', 4, 'lha', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (234, 'application/x-lha', 4, 'lha', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (235, 'application/octet-stream', 4, 'lhx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (236, 'text/plain', 4, 'list', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (237, 'audio/nspaudio', 3, 'lma', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (238, 'audio/x-nspaudio', 3, 'lma', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (239, 'text/plain', 4, 'log', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (240, 'application/x-lisp', 4, 'lsp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (241, 'text/x-script.lisp', 4, 'lsp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (242, 'text/plain', 4, 'lst', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (243, 'text/x-la-asf', 4, 'lsx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (244, 'application/x-latex', 4, 'ltx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (245, 'application/octet-stream', 4, 'lzh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (246, 'application/x-lzh', 4, 'lzh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (247, 'application/lzx', 4, 'lzx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (248, 'application/octet-stream', 4, 'lzx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (249, 'application/x-lzx', 4, 'lzx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (250, 'text/plain', 4, 'm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (251, 'text/x-m', 4, 'm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (252, 'video/mpeg', 2, 'm1v', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (253, 'audio/mpeg', 3, 'm2a', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (254, 'video/mpeg', 2, 'm2v', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (255, 'audio/x-mpequrl', 3, 'm3u', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (256, 'application/x-troff-man', 4, 'man', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (257, 'application/x-navimap', 4, 'map', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (258, 'text/plain', 4, 'mar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (259, 'application/mbedlet', 4, 'mbd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (260, 'application/x-magic-cap-package-1.0', 4, 'mc$', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (261, 'application/mcad', 4, 'mcd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (262, 'application/x-mathcad', 4, 'mcd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (263, 'image/vasa', 1, 'mcf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (264, 'text/mcf', 4, 'mcf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (265, 'application/netmc', 4, 'mcp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (266, 'application/x-troff-me', 4, 'me', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (267, 'message/rfc822', 4, 'mht', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (268, 'message/rfc822', 4, 'mhtml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (269, 'application/x-midi', 4, 'mid', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (270, 'audio/midi', 3, 'mid', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (271, 'audio/x-mid', 3, 'mid', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (272, 'audio/x-midi', 3, 'mid', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (273, 'music/crescendo', 3, 'mid', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (274, 'x-music/x-midi', 3, 'mid', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (275, 'application/x-midi', 3, 'midi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (276, 'audio/midi', 3, 'midi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (277, 'audio/x-mid', 3, 'midi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (278, 'audio/x-midi', 3, 'midi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (279, 'music/crescendo', 3, 'midi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (280, 'x-music/x-midi', 3, 'midi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (281, 'application/x-frame', 4, 'mif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (282, 'application/x-mif', 4, 'mif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (283, 'message/rfc822', 4, 'mime', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (284, 'www/mime', 4, 'mime', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (285, 'audio/x-vnd.audioexplosion.mjuicemediafile', 3, 'mjf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (286, 'video/x-motion-jpeg', 2, 'mjpg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (287, 'application/base64', 4, 'mm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (288, 'application/x-meme', 4, 'mm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (289, 'application/base64', 4, 'mme', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (290, 'audio/mod', 3, 'mod', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (291, 'audio/x-mod', 3, 'mod', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (292, 'video/quicktime', 2, 'moov', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (293, 'video/quicktime', 2, 'mov', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (294, 'video/x-sgi-movie', 2, 'movie', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (295, 'audio/mpeg', 3, 'mp2', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (296, 'audio/x-mpeg', 3, 'mp2', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (297, 'video/mpeg', 2, 'mp2', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (298, 'video/x-mpeg', 2, 'mp2', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (299, 'video/x-mpeq2a', 2, 'mp2', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (300, 'audio/mpeg3', 3, 'mp3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (301, 'audio/x-mpeg-3', 3, 'mp3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (302, 'video/mpeg', 2, 'mp3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (303, 'video/x-mpeg', 22, 'mp3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (304, 'audio/mpeg', 3, 'mpa', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (305, 'video/mpeg', 2, 'mpa', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (306, 'application/x-project', 4, 'mpc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (307, 'video/mpeg', 2, 'mpe', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (308, 'video/mpeg', 2, 'mpeg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (309, 'audio/mpeg', 3, 'mpg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (310, 'video/mpeg', 2, 'mpg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (311, 'audio/mpeg', 3, 'mpga', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (312, 'application/vnd.ms-project', 4, 'mpp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (313, 'application/x-project', 4, 'mpt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (314, 'application/x-project', 4, 'mpv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (315, 'application/x-project', 4, 'mpx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (316, 'application/marc', 4, 'mrc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (317, 'application/x-troff-ms', 4, 'ms', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (318, 'video/x-sgi-movie', 2, 'mv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (319, 'audio/make', 3, 'my', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (320, 'application/x-vnd.audioexplosion.mzz', 4, 'mzz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (321, 'image/naplps', 1, 'nap', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (322, 'image/naplps', 1, 'naplp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (323, 'application/x-netcdf', 4, 'nc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (324, 'application/vnd.nokia.configuration-message', 4, 'ncm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (325, 'image/x-niff', 1, 'nif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (326, 'image/x-niff', 1, 'niff', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (327, 'application/x-mix-transfer', 4, 'nix', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (328, 'application/x-conference', 4, 'nsc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (329, 'application/x-navidoc', 4, 'nvd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (330, 'application/octet-stream', 4, 'o', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (331, 'application/oda', 4, 'oda', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (332, 'application/x-omc', 4, 'omc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (333, 'application/x-omcdatamaker', 4, 'omcd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (334, 'application/x-omcregerator', 4, 'omcr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (335, 'text/x-pascal', 4, 'p', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (336, 'application/pkcs10', 4, 'p10', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (337, 'application/x-pkcs10', 4, 'p10', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (338, 'application/pkcs-12', 4, 'p12', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (339, 'application/x-pkcs12', 4, 'p12', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (340, 'application/x-pkcs7-signature', 4, 'p7a', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (341, 'application/pkcs7-mime', 4, 'p7c', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (342, 'application/x-pkcs7-mime', 4, 'p7c', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (343, 'application/pkcs7-mime', 4, 'p7m', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (344, 'application/x-pkcs7-mime', 4, 'p7m', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (345, 'application/x-pkcs7-certreqresp', 4, 'p7r', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (346, 'application/pkcs7-signature', 4, 'p7s', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (347, 'application/pro_eng', 4, 'part', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (348, 'text/pascal', 4, 'pas', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (349, 'image/x-portable-bitmap', 1, 'pbm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (350, 'application/vnd.hp-pcl', 4, 'pcl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (351, 'application/x-pcl', 4, 'pcl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (352, 'image/x-pict', 1, 'pct', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (353, 'image/x-pcx', 1, 'pcx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (354, 'chemical/x-pdb', 4, 'pdb', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (355, 'application/pdf', 4, 'pdf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (356, 'audio/make', 3, 'pfunk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (357, 'audio/make.my.funk', 3, 'pfunk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (358, 'image/x-portable-graymap', 1, 'pgm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (359, 'image/x-portable-greymap', 1, 'pgm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (360, 'image/pict', 1, 'pic', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (361, 'image/pict', 1, 'pict', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (362, 'application/x-newton-compatible-pkg', 4, 'pkg', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (363, 'application/vnd.ms-pki.pko', 4, 'pko', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (364, 'text/plain', 4, 'pl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (365, 'text/x-script.perl', 4, 'pl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (366, 'application/x-pixclscript', 4, 'plx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (367, 'image/x-xpixmap', 1, 'pm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (368, 'text/x-script.perl-module', 4, 'pm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (369, 'application/x-pagemaker', 4, 'pm4', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (370, 'application/x-pagemaker', 4, 'pm5', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (371, 'image/png', 1, 'png', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (372, 'application/x-portable-anymap', 4, 'pnm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (373, 'image/x-portable-anymap', 1, 'pnm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (374, 'application/mspowerpoint', 4, 'pot', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (375, 'application/vnd.ms-powerpoint', 4, 'pot', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (376, 'model/x-pov', 4, 'pov', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (377, 'application/vnd.ms-powerpoint', 4, 'ppa', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (378, 'image/x-portable-pixmap', 1, 'ppm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (379, 'application/mspowerpoint', 4, 'pps', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (380, 'application/vnd.ms-powerpoint', 4, 'pps', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (381, 'application/mspowerpoint', 4, 'ppt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (382, 'application/powerpoint', 4, 'ppt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (383, 'application/vnd.ms-powerpoint', 4, 'ppt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (384, 'application/x-mspowerpoint', 4, 'ppt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (385, 'application/mspowerpoint', 4, 'ppz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (386, 'application/x-freelance', 4, 'pre', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (387, 'application/pro_eng', 4, 'prt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (388, 'application/postscript', 4, 'ps', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (389, 'application/octet-stream', 4, 'psd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (390, 'paleovu/x-pv', 4, 'pvu', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (391, 'application/vnd.ms-powerpoint', 4, 'pwz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (392, 'text/x-script.phyton', 4, 'py', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (393, 'applicaiton/x-bytecode.python', 4, 'pyc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (394, 'audio/vnd.qcelp', 3, 'qcp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (395, 'x-world/x-3dmf', 4, 'qd3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (396, 'x-world/x-3dmf', 4, 'qd3d', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (397, 'image/x-quicktime', 1, 'qif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (398, 'video/quicktime', 2, 'qt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (399, 'video/x-qtc', 2, 'qtc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (400, 'image/x-quicktime', 1, 'qti', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (401, 'image/x-quicktime', 1, 'qtif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (402, 'audio/x-pn-realaudio', 3, 'ra', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (403, 'audio/x-pn-realaudio-plugin', 3, 'ra', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (404, 'audio/x-realaudio', 3, 'ra', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (405, 'audio/x-pn-realaudio', 3, 'ram', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (406, 'application/x-cmu-raster', 4, 'ras', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (407, 'image/cmu-raster', 1, 'ras', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (408, 'image/x-cmu-raster', 1, 'ras', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (409, 'image/cmu-raster', 1, 'rast', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (410, 'text/x-script.rexx', 4, 'rexx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (411, 'image/vnd.rn-realflash', 1, 'rf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (412, 'image/x-rgb', 1, 'rgb', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (413, 'application/vnd.rn-realmedia', 4, 'rm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (414, 'audio/x-pn-realaudio', 3, 'rm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (415, 'audio/mid', 3, 'rmi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (416, 'audio/x-pn-realaudio', 3, 'rmm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (417, 'audio/x-pn-realaudio', 3, 'rmp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (418, 'audio/x-pn-realaudio-plugin', 3, 'rmp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (419, 'application/ringing-tones', 4, 'rng', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (420, 'application/vnd.nokia.ringing-tone', 4, 'rng', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (421, 'application/vnd.rn-realplayer', 4, 'rnx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (422, 'application/x-troff', 4, 'roff', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (423, 'image/vnd.rn-realpix', 1, 'rp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (424, 'audio/x-pn-realaudio-plugin', 3, 'rpm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (425, 'text/richtext', 4, 'rt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (426, 'text/vnd.rn-realtext', 4, 'rt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (427, 'application/rtf', 4, 'rtf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (428, 'application/x-rtf', 4, 'rtf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (429, 'text/richtext', 4, 'rtf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (430, 'application/rtf', 4, 'rtx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (431, 'text/richtext', 4, 'rtx', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (432, 'video/vnd.rn-realvideo', 2, 'rv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (433, 'text/x-asm', 4, 's', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (434, 'audio/s3m', 3, 's3m', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (435, 'application/octet-stream', 4, 'savem', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (436, 'application/x-tbook', 4, 'sbk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (437, 'application/x-lotusscreencam', 4, 'scm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (438, 'text/x-script.guile', 4, 'scm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (439, 'text/x-script.scheme', 4, 'scm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (440, 'video/x-scm', 2, 'scm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (441, 'text/plain', 4, 'sdml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (442, 'application/sdp', 4, 'sdp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (443, 'application/x-sdp', 4, 'sdp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (444, 'application/sounder', 4, 'sdr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (445, 'application/sea', 4, 'sea', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (446, 'application/x-sea', 4, 'sea', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (447, 'application/set', 4, 'set', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (448, 'text/sgml', 4, 'sgm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (449, 'text/x-sgml', 4, 'sgm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (450, 'text/sgml', 4, 'sgml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (451, 'text/x-sgml', 4, 'sgml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (452, 'application/x-bsh', 4, 'sh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (453, 'application/x-sh', 4, 'sh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (454, 'application/x-shar', 4, 'sh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (455, 'text/x-script.sh', 4, 'sh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (456, 'application/x-bsh', 4, 'shar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (457, 'application/x-shar', 4, 'shar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (458, 'text/html', 4, 'shtml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (459, 'text/x-server-parsed-html', 4, 'shtml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (460, 'audio/x-psid', 3, 'sid', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (461, 'application/x-sit', 4, 'sit', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (462, 'application/x-stuffit', 4, 'sit', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (463, 'application/x-koan', 4, 'skd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (464, 'application/x-koan', 4, 'skm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (465, 'application/x-koan', 4, 'skp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (466, 'application/x-koan', 4, 'skt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (467, 'application/x-seelogo', 4, 'sl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (468, 'application/smil', 4, 'smi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (469, 'application/smil', 4, 'smil', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (470, 'audio/basic', 3, 'snd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (471, 'audio/x-adpcm', 3, 'snd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (472, 'application/solids', 4, 'sol', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (473, 'application/x-pkcs7-certificates', 4, 'spc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (474, 'text/x-speech', 4, 'spc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (475, 'application/futuresplash', 4, 'spl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (476, 'application/x-sprite', 4, 'spr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (477, 'application/x-sprite', 4, 'sprit', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (478, 'application/x-wais-source', 4, 'src', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (479, 'text/x-server-parsed-html', 4, 'ssi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (480, 'application/streamingmedia', 4, 'ssm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (481, 'application/vnd.ms-pki.certstore', 4, 'sst', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (482, 'application/step', 4, 'step', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (483, 'application/sla', 4, 'stl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (484, 'application/vnd.ms-pki.stl', 4, 'stl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (485, 'application/x-navistyle', 4, 'stl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (486, 'application/step', 4, 'stp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (487, 'application/x-sv4cpio', 4, 'sv4cp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (488, 'application/x-sv4crc', 4, 'sv4cr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (489, 'image/vnd.dwg', 1, 'svf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (490, 'image/x-dwg', 1, 'svf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (491, 'application/x-world', 4, 'svr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (492, 'x-world/x-svr', 4, 'svr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (493, 'application/x-shockwave-flash', 4, 'swf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (494, 'application/x-troff', 4, 't', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (495, 'text/x-speech', 4, 'talk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (496, 'application/x-tar', 4, 'tar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (497, 'application/toolbook', 4, 'tbk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (498, 'application/x-tbook', 4, 'tbk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (499, 'application/x-tcl', 4, 'tcl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (500, 'text/x-script.tcl', 4, 'tcl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (501, 'text/x-script.tcsh', 4, 'tcsh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (502, 'application/x-tex', 4, 'tex', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (503, 'application/x-texinfo', 4, 'texi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (504, 'application/x-texinfo', 4, 'texin', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (505, 'application/plain', 4, 'text', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (506, 'text/plain', 4, 'text', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (507, 'application/gnutar', 4, 'tgz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (508, 'application/x-compressed', 4, 'tgz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (509, 'image/tiff', 1, 'tif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (510, 'image/x-tiff', 1, 'tif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (511, 'image/tiff', 1, 'tiff', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (512, 'image/x-tiff', 1, 'tiff', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (513, 'application/x-troff', 4, 'tr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (514, 'audio/tsp-audio', 3, 'tsi', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (515, 'application/dsptype', 4, 'tsp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (516, 'audio/tsplayer', 3, 'tsp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (517, 'text/tab-separated-values', 4, 'tsv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (518, 'image/florian', 1, 'turbo', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (519, 'text/plain', 4, 'txt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (520, 'text/x-uil', 4, 'uil', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (521, 'text/uri-list', 4, 'uni', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (522, 'text/uri-list', 4, 'unis', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (523, 'application/i-deas', 4, 'unv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (524, 'text/uri-list', 4, 'uri', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (525, 'text/uri-list', 4, 'uris', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (526, 'application/x-ustar', 4, 'ustar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (527, 'multipart/x-ustar', 4, 'ustar', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (528, 'application/octet-stream', 4, 'uu', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (529, 'text/x-uuencode', 4, 'uu', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (530, 'text/x-uuencode', 4, 'uue', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (531, 'application/x-cdlink', 4, 'vcd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (532, 'text/x-vcalendar', 4, 'vcs', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (533, 'application/vda', 4, 'vda', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (534, 'video/vdo', 2, 'vdo', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (535, 'application/groupwise', 4, 'vew', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (536, 'video/vivo', 2, 'viv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (537, 'video/vnd.vivo', 2, 'viv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (538, 'video/vivo', 2, 'vivo', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (539, 'video/vnd.vivo', 2, 'vivo', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (540, 'application/vocaltec-media-desc', 4, 'vmd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (541, 'application/vocaltec-media-file', 4, 'vmf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (542, 'audio/voc', 3, 'voc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (543, 'audio/x-voc', 3, 'voc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (544, 'video/vosaic', 2, 'vos', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (545, 'audio/voxware', 3, 'vox', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (546, 'audio/x-twinvq-plugin', 3, 'vqe', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (547, 'audio/x-twinvq', 3, 'vqf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (548, 'audio/x-twinvq-plugin', 3, 'vql', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (549, 'application/x-vrml', 4, 'vrml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (550, 'model/vrml', 4, 'vrml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (551, 'x-world/x-vrml', 4, 'vrml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (552, 'x-world/x-vrt', 4, 'vrt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (553, 'application/x-visio', 4, 'vsd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (554, 'application/x-visio', 4, 'vst', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (555, 'application/x-visio', 4, 'vsw', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (556, 'application/wordperfect6.0', 4, 'w60', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (557, 'application/wordperfect6.1', 4, 'w61', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (558, 'application/msword', 4, 'w6w', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (559, 'audio/wav', 3, 'wav', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (560, 'audio/x-wav', 3, 'wav', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (561, 'application/x-qpro', 4, 'wb1', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (562, 'image/vnd.wap.wbmp', 1, 'wbmp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (563, 'application/vnd.xara', 4, 'web', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (564, 'application/msword', 4, 'wiz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (565, 'application/x-123', 4, 'wk1', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (566, 'windows/metafile', 4, 'wmf', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (567, 'text/vnd.wap.wml', 4, 'wml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (568, 'application/vnd.wap.wmlc', 4, 'wmlc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (569, 'text/vnd.wap.wmlscript', 4, 'wmls', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (570, 'application/vnd.wap.wmlscriptc', 4, 'wmlsc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (571, 'application/msword', 4, 'word', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (572, 'application/wordperfect', 4, 'wp', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (573, 'application/wordperfect', 4, 'wp5', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (574, 'application/wordperfect6.0', 4, 'wp5', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (575, 'application/wordperfect', 4, 'wp6', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (576, 'application/wordperfect', 4, 'wpd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (577, 'application/x-wpwin', 4, 'wpd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (578, 'application/x-lotus', 4, 'wq1', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (579, 'application/mswrite', 4, 'wri', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (580, 'application/x-wri', 4, 'wri', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (581, 'application/x-world', 4, 'wrl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (582, 'model/vrml', 4, 'wrl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (583, 'x-world/x-vrml', 4, 'wrl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (584, 'model/vrml', 4, 'wrz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (585, 'x-world/x-vrml', 4, 'wrz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (586, 'text/scriplet', 4, 'wsc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (587, 'application/x-wais-source', 4, 'wsrc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (588, 'application/x-wintalk', 4, 'wtk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (589, 'image/x-xbitmap', 1, 'xbm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (590, 'image/x-xbm', 1, 'xbm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (591, 'image/xbm', 1, 'xbm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (592, 'video/x-amt-demorun', 4, 'xdr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (593, 'xgl/drawing', 4, 'xgz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (594, 'image/vnd.xiff', 1, 'xif', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (595, 'application/excel', 4, 'xl', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (596, 'application/excel', 4, 'xla', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (597, 'application/x-excel', 4, 'xla', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (598, 'application/x-msexcel', 4, 'xla', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (599, 'application/excel', 4, 'xlb', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (600, 'application/vnd.ms-excel', 4, 'xlb', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (601, 'application/x-excel', 4, 'xlb', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (602, 'application/excel', 4, 'xlc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (603, 'application/vnd.ms-excel', 4, 'xlc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (604, 'application/x-excel', 4, 'xlc', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (605, 'application/excel', 4, 'xld', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (606, 'application/x-excel', 4, 'xld', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (607, 'application/excel', 4, 'xlk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (608, 'application/x-excel', 4, 'xlk', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (609, 'application/excel', 4, 'xll', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (610, 'application/vnd.ms-excel', 4, 'xll', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (611, 'application/x-excel', 4, 'xll', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (612, 'application/excel', 4, 'xlm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (613, 'application/vnd.ms-excel', 4, 'xlm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (614, 'application/x-excel', 4, 'xlm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (615, 'application/excel', 4, 'xls', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (616, 'application/vnd.ms-excel', 4, 'xls', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (617, 'application/x-excel', 4, 'xls', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (618, 'application/x-msexcel', 4, 'xls', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (619, 'application/excel', 4, 'xlt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (620, 'application/x-excel', 4, 'xlt', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (621, 'application/excel', 4, 'xlv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (622, 'application/x-excel', 4, 'xlv', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (623, 'application/excel', 4, 'xlw', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (624, 'application/vnd.ms-excel', 4, 'xlw', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (625, 'application/x-excel', 4, 'xlw', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (626, 'application/x-msexcel', 4, 'xlw', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (627, 'audio/xm', 4, 'xm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (628, 'application/xml', 4, 'xml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (629, 'text/xml', 4, 'xml', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (630, 'xgl/movie', 4, 'xmz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (631, 'application/x-vnd.ls-xpix', 4, 'xpix', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (632, 'image/x-xpixmap', 1, 'xpm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (633, 'image/xpm', 1, 'xpm', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (634, 'image/png', 1, 'x-png', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (635, 'video/x-amt-showrun', 2, 'xsr', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (636, 'image/x-xwd', 1, 'xwd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (637, 'image/x-xwindowdump', 1, 'xwd', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (638, 'chemical/x-pdb', 4, 'xyz', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (639, 'application/x-compress', 4, 'z', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (640, 'application/x-compressed', 4, 'z', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (641, 'application/x-compressed', 4, 'zip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (642, 'application/x-zip-compressed', 4, 'zip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (643, 'application/zip', 4, 'zip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (644, 'multipart/x-zip', 4, 'zip', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (645, 'application/octet-stream', 4, 'zoo', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (646, 'text/x-script.zsh', 4, 'zsh', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (647, 'audio/mpeg', 3, 'mp3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (648, 'audio/mpg', 3, 'mp3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (649, 'audio/x-mp3', 3, 'mp3', 1);
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (650, 'audio/x-mpg', 3, 'mp3', 1);


INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES (2, 'GovPrincipal', 1, 'GovPrincipal');
INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES (8, 'GovRodape', 1, 'GovRodape');
INSERT INTO `menus` (`id`, `nome`, `site_id`, `identificador`) VALUES (9, 'GovTopo', 1, 'GovTopo');


INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (1,'Página Inicial','Página Inicial',1,'/',NULL,NULL,2,NULL,15,16);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (2,'Quem somos','Quem somos',1,'/',NULL,NULL,2,NULL,17,18);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (3,'Notícias','Notícias',1,'/noticias',NULL,NULL,2,NULL,21,22);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (4,'Eventos','Eventos',1,'/eventos',NULL,4,2,NULL,19,20);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (5,'Acessibilidade Web','Acessibilidade Web',1,'/acessibilidade',NULL,NULL,2,NULL,23,32);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (6,'Pedagógico','Pedagógico',1,'/pedagogico',NULL,NULL,2,NULL,33,42);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (7,'Tecnologia Assistiva','Tecnologia Assistiva',1,'/tecnologia-assistiva',NULL,NULL,2,NULL,43,52);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (8,'Contato','Contato',1,'/contato',NULL,NULL,2,NULL,53,54);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (9,'Projetos acessibilidade web','Projetos acessibilidade web',1,'/acessibilidade/projetos',NULL,NULL,2,5,28,29);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (10,'Notícias acessibilidade web','Notícias acessibilidade web',1,'/acessibilidade',NULL,NULL,2,5,24,25);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (11,'Dicas acessibilidade web','Dicas acessibilidade web',1,'/acessibilidade/dicas',NULL,NULL,2,5,26,27);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (12,'Manuais acessibilidade web','Manuais acessibilidade web',1,'/acessibilidade/manuais',NULL,NULL,2,5,30,31);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (13,'Cursos','Cursos',1,'/pedagogico/cursos',NULL,NULL,2,6,34,35);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (14,'Objetos de aprendizagem','Objetos de aprendizagem',1,'/pedagogico/oas',NULL,NULL,2,6,36,37);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (15,'Notícias pedagógico','Notícias pedagógico',1,'/pedagogico',NULL,NULL,2,6,38,39);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (16,'Manuais pedagógico','Manuais pedagógico',1,'/pedagogico/manuais',NULL,NULL,2,6,40,41);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (17,'Projetos tecnologia assistiva','Projetos tecnologia assistiva',1,'/tecnologia-assistiva/projetos',NULL,NULL,2,7,46,47);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (18,'Notícias tecnologia assistiva','Notícias tecnologia assistiva',1,'/tecnologia-assistiva',NULL,NULL,2,7,48,49);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (19,'Manuais tecnologia assistiva','Manuais tecnologia assistiva',1,'/tecnologia-assistiva/manuais',NULL,NULL,2,7,50,51);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (20,'Suindara','Assuntos',2,NULL,NULL,NULL,1,NULL,55,72);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (25,'Institucional','Institucional',2,'/',NULL,NULL,2,24,74,75);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (26,'Ações e programas','Ações e programas',2,'/',NULL,NULL,2,24,76,77);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (34,'Redes sociais','Redes sociais',8,NULL,NULL,NULL,1,NULL,79,88);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (35,'RSS','RSS',8,NULL,NULL,NULL,1,NULL,89,94);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (36,'Sobre o site','Sobre o site',8,NULL,NULL,NULL,1,NULL,95,104);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (38,'Twitter','Twitter',8,'/',NULL,NULL,1,34,80,81);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (43,'Perguntas frequentes','Perguntas frequentes',9,'/faq',NULL,NULL,1,57,106,107);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (44,'Contato','Contato',9,'/contato',NULL,NULL,2,57,114,115);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (45,'Serviços da [Denominação]','Serviços da [Denominação]',9,NULL,NULL,NULL,1,57,108,109);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (46,'Dados abertos','Dados abertos',9,NULL,NULL,NULL,1,57,112,113);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (47,'Área de imprensa','Área de imprensa',9,NULL,NULL,NULL,1,57,110,111);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (48,'YouTube','YouTube',8,NULL,NULL,NULL,1,34,82,83);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (49,'Facebook','Facebook',8,NULL,NULL,NULL,1,34,84,85);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (50,'Flickr','Flickr',8,NULL,NULL,NULL,1,34,86,87);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (51,'O que é?','O que é?',8,NULL,NULL,NULL,1,35,90,91);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (52,'Assine','Assine',8,NULL,NULL,NULL,1,35,92,93);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (53,'Acessibilidade','Acessibilidade',8,'/acessibilidade',NULL,NULL,2,36,96,97);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (54,'Mapa do site','Mapa do site',8,NULL,NULL,NULL,1,36,98,99);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (55,'Versión en Español','Versión en Español',8,NULL,NULL,NULL,1,36,100,101);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (56,'English version','English version',8,NULL,NULL,NULL,1,36,102,103);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (57,'Serviços','Serviços',9,NULL,NULL,NULL,1,NULL,105,116);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (60,'Parcerias','parcerias',2,NULL,NULL,NULL,1,NULL,105,110);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (61,'Outras Iniciativas','outras_iniciativas',2,NULL,NULL,NULL,1,NULL,111,118);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (66,'Instituto Federal do Rio Grande do Sul','instituto_federal_do_rio_grande_do_sul',2,NULL,6,NULL,3,60,106,107);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (67,'Identidade Digital de Governo','identidade_digital_do_governo',2,NULL,8,NULL,3,61,112,113);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (68,'eMAG','emag',2,NULL,9,NULL,3,61,114,115);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (69,'VLibras','vlibras',2,NULL,10,NULL,3,61,116,117);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (70,'Secretaria de Comunicação Pres da República','secret_de_comunicacao_da_pres_da_republ',2,NULL,7,NULL,3,60,108,109);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (71,'Sobre o Suindara','sobre_o_suindara',2,NULL,1,NULL,3,20,64,65);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (72,'Perguntas Frequentes','perguntas_frequentes',2,NULL,3,NULL,3,20,66,67);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (73,'Downloads','downloads',2,NULL,4,NULL,3,20,68,69);
INSERT INTO `menu_itens` (`id`, `nome`, `identificador`, `menu_id`, `link`, `pagina_id`, `categoria_id`, `bm_tipo_id`, `parent_id`, `lft`, `rght`) VALUES (74,'Manuais','manuais',2,NULL,5,NULL,3,20,70,71);


INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (4,'Eventos','Eventos',NULL,1,7,8,'Eventos');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (5,'Suindara','Suindara',NULL,1,9,10,'Suindara');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (6,'Acessibilidade Manuais','Manuais',NULL,1,11,12,'Acessibilidade Manuais');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (7,'Acessibilidade Dicas','Dicas de Acessibilidade',NULL,1,13,14,'Acessibilidade Dicas');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (8,'Destaques','Destaques',NULL,1,15,16,'Destaques');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (9,'Pedagogico OAs','Dicas para pedagogos',NULL,1,17,18,'Pedagogico OAs');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (10,'Pedagogico Manuais','Manuais do pedagógico',NULL,1,19,20,'Pedagogico Manuais');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (11,'TA Manuais','TA Manuais',NULL,1,21,22,'TA Manuais');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (12,'TA Dicas','TA Dicas',NULL,1,23,24,'TA Dicas');
INSERT INTO `categorias` (`id`, `titulo`, `descricao`, `parent_id`, `site_id`, `lft`, `rght`, `identificador`) VALUES (13,'Notícias','Notícias',NULL,1,25,26,'Notícias');

INSERT INTO `banners` (`id`,`titulo`,`descricao`,`arquivo`,`link`,`categoria_id`,`pagina_id`,`bm_tipo_id`,`lft`,`rght`,`site_id`,`grupo_id`,`parent_id`) VALUES (1,'Suindara','Suindara','c4089cb7f0083b372ab0cbf1c80c415c.jpg',NULL,NULL,NULL,1,1,2,1,1,0);

INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (2,'Manual de instalação do CMS Suindara','Manual de instalação do CMS Suindara','53b3608d52173f45eb9697b551ffe48f.pdf',NULL,NULL,812267,0,355,4,NULL,NULL,NULL,NULL,NULL,NULL,1,'Manual de instalação do CMS Suindara');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (3,'Manual de uso - Suindara','Manual de uso - Suindara','d119b4e1afbe8be501a25d9ab60dc960.pdf',NULL,NULL,1811685,0,355,4,NULL,NULL,NULL,NULL,NULL,NULL,1,'Manual de uso - Suindara');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (4,'Manual de construção de templates - Suindara','Manual de construção de templates - Suindara','46d1c0484636c97b62bc6518b4f6b24f.pdf',NULL,NULL,131207,0,355,4,NULL,NULL,NULL,NULL,NULL,NULL,1,'Manual de construção de templates - Suindara');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (7,'Portaria nº 03, de 07 de Maio de 2007','Portaria nº 03, de 07 de Maio de 2007','cfb806e1a66c4cbb8ff4d739135e3201.pdf',NULL,NULL,36339,0,355,4,NULL,NULL,NULL,NULL,NULL,NULL,1,'portaria3_eMAG');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (8,'Modelo de Acessibilidade em Governo Eletrônico - v 3.1','Modelo de Acessibilidade em Governo Eletrônico - versão 3.1','03cba0badf8e0693bca1161140765a3f.pdf',NULL,NULL,2336858,0,355,4,NULL,NULL,NULL,NULL,NULL,NULL,1,'eMAGv31');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (14,'','','cf6d50479ae3bb910381c39582b5f82a.pdf',NULL,NULL,42700,0,355,4,NULL,NULL,NULL,NULL,NULL,NULL,0,'Resultados Parciais do Projeto LIBRAS para o Fórum do SBTVD');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (25,'Site VLibras','Site do Software VLibras','171adbe8c6e47c92d9a342df36db06f4.jpg','',NULL,53349,0,215,1,240.435,0,1011.06,579,770.625,579,1,'171adbe8c6e47c92d9a342df36db06f4');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (29,'Acessibilidade Virtual','Acessibilidade Virtual','bd9af9a8cc5c93f41629e3c9422bca6d.jpg','',NULL,26191,0,215,1,137,0,417,210,280,210,1,'bd9af9a8cc5c93f41629e3c9422bca6d');
INSERT INTO `midias` (`id`,`titulo`,`descricao`,`arquivo`,`fonte`,`versao_textual`,`tamanho`,`banco_imagens`,`mime_id`,`tipo_id`,`crop_x`,`crop_y`,`crop_x2`,`crop_y2`,`crop_w`,`crop_h`,`ativa`,`nome_original`) VALUES (30,'Logo Suindara','Logo Suindara','a474f0f5040daab795350e9c3318fca2.png','',NULL,9842,0,371,1,0,0,799.98,600,799.98,600,1,'a474f0f5040daab795350e9c3318fca2');

INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (2,4,0,2,0,1);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (3,4,0,3,0,2);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (4,4,0,4,0,3);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (7,9,0,7,0,1);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (8,9,0,8,0,2);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (14,0,2,14,0,1);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (24,0,4,25,0,1);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (28,0,2,29,0,1);
INSERT INTO `midias_pn` (`id`,`pagina_id`,`noticia_id`,`midia_id`,`destaque`,`posicao`) VALUES (29,0,1,30,0,1);

INSERT INTO `noticias` (`id`,`titulo`,`resumo`,`texto`,`categoria_id`,`cartola`,`usuario_id`,`bloqueado`,`datahora_publicacao`,`status_id`,`site_id`,`datahora_prog_pub`,`datahora_prog_exp`,`autor`) VALUES (1,'Governo Federal lança CMS Acessível - Suindara','<p>Lan&ccedil;ado em agosto de 2015, o Suindara &eacute;&nbsp;um Gerenciador de Conte&uacute;dos acess&iacute;vel do Governo Federal.</p>\r\n','<p>Lan&ccedil;ado em agosto de 2015, o Suindara &eacute;&nbsp;um Gerenciador de Conte&uacute;dos que permite integrar e automatizar todos os processos relacionados &agrave; cria&ccedil;&atilde;o, cataloga&ccedil;&atilde;o, indexa&ccedil;&atilde;o, personaliza&ccedil;&atilde;o, controle de acessos e disponibiliza&ccedil;&atilde;o de conte&uacute;dos em portais web.</p>\r\n',13,'Suindara',1,0,'2015-08-06 01:43:26',1,1,'2015-08-06 01:46:08',NULL,'admin');
INSERT INTO `noticias` (`id`,`titulo`,`resumo`,`texto`,`categoria_id`,`cartola`,`usuario_id`,`bloqueado`,`datahora_publicacao`,`status_id`,`site_id`,`datahora_prog_pub`,`datahora_prog_exp`,`autor`) VALUES (2,'Conheça o Site Modelo Construído com o Suindara','<p>Conhe&ccedil;a o Site Modelo Constru&iacute;do com o Suindara pela Universidade Feral do Rio Grande do Sul - IFRS.</p>\r\n','<p>Conhe&ccedil;a o Site Modelo Constru&iacute;do com o Suindara pela Universidade Feral do Rio Grande do Sul - IFRS.</p>\r\n\r\n<p>Ddispon&iacute;vel em <a href=\"http://acessibilidade.bento.ifrs.edu.br/\">http://acessibilidade.bento.ifrs.edu.br</a></p>\r\n',5,'Suindara',1,0,'2015-08-07 04:00:42',1,1,'2015-08-07 04:13:20',NULL,'admin');
INSERT INTO `noticias` (`id`,`titulo`,`resumo`,`texto`,`categoria_id`,`cartola`,`usuario_id`,`bloqueado`,`datahora_publicacao`,`status_id`,`site_id`,`datahora_prog_pub`,`datahora_prog_exp`,`autor`) VALUES (4,'Conheça o VLibras - Tradutor Automático','<p>Conhe&ccedil;a o Tradutor Autom&aacute;tico de Sinais para&nbsp;Libras</p>\r\n','<p>A Suite VLibras consiste em um conjunto de ferramentas computacionais de c&oacute;digo aberto, respons&aacute;vel por traduzir automaticamente conte&uacute;dos digitais (texto, &aacute;udio e v&iacute;deo) em LIBRAS, tornando computadores, dispositivos m&oacute;veis e plataformas Web acess&iacute;veis para pessoas com defici&ecirc;ncia auditiva. Com isso ser&aacute; poss&iacute;vel que pessoas com defici&ecirc;ncia auditiva possam acessar os conte&uacute;dos dessas tecnologias em sua l&iacute;ngua natural de comunica&ccedil;&atilde;o, reduzindo as barreiras de comunica&ccedil;&atilde;o e acesso &agrave; informa&ccedil;&atilde;o.</p>\r\n',8,'VLibras',1,0,'2015-09-02 09:58:44',1,1,'2015-09-02 10:00:00',NULL,'admin');

INSERT INTO `pagina_grpbanners` (`id`,`pagina_id`,`grupo_id`) VALUES (1,1,1);

INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (1,'Sobre o Suindara','<p>O Suindara &eacute; um Gerenciador de Conte&uacute;dos que permite integrar e automatizar todos os processos relacionados &agrave; cria&ccedil;&atilde;o, cataloga&ccedil;&atilde;o, indexa&ccedil;&atilde;o, personaliza&ccedil;&atilde;o, controle de acessos e disponibiliza&ccedil;&atilde;o de conte&uacute;dos em portais web. Atualmente, &eacute; comum a utiliza&ccedil;&atilde;o de gerenciadores em sites, blogs e portais, embora a maioria desses n&atilde;o seja totalmente acess&iacute;vel. Por esse motivo, desenvolvemos uma interface, na qual buscamos contemplar todas as recomenda&ccedil;&otilde;es do ATG 2.0 (Authoring Acessibility Guidelines), al&eacute;m de disponibilizarmos uma barra de acessibilidade na parte superior do ambiente; a qual cont&eacute;m diversas op&ccedil;&otilde;es de ajuste espec&iacute;ficas de acordo com a necessidade de cada usu&aacute;rio.</p>\r\n\r\n<p><img alt=\"Logo Suindara\" src=\"/imagens/logo.png\" style=\"height:90px; width:146px\" /></p>\r\n',1,0,'2015-08-06 01:53:41',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (2,'Comunidade no Portal de Software Público','<p>O Software P&uacute;blico Brasileiro &eacute; um tipo espec&iacute;fico de software que adota um modelo de licen&ccedil;a livre para o c&oacute;digo-fonte, a prote&ccedil;&atilde;o da identidade original entre o seu nome, marca, c&oacute;digo-fonte, documenta&ccedil;&atilde;o e outros artefatos relacionados por meio do modelo de Licen&ccedil;a P&uacute;blica de Marca &ndash; LPM e &eacute; disponibilizado na internet em ambiente virtual p&uacute;blico denominado Portal do Software P&uacute;blico Brasileiro.</p>',1,0,'2015-08-06 01:57:03',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (3,'Perguntas Frequentes','<p><a id=\"topo-1\" name=\"topo-1\"></a><a href=\"#pergunta-1\"><strong>1. O que &eacute; o CMS Suindara?</strong></a></p>\r\n\r\n<p><a id=\"topo-2\" name=\"topo-2\"></a><a href=\"#pergunta-2\"><strong>2. Quero utilizar o CMS Suindara, por onde come&ccedil;o?</strong></a></p>\r\n\r\n<p><a id=\"topo-3\" name=\"topo-3\"></a><a href=\"#pergunta-3\"><strong>3. Quais s&atilde;o os plugins dispon&iacute;veis na instala&ccedil;&atilde;o do CMS Suindara?</strong></a></p>\r\n\r\n<p><a id=\"topo-4\" name=\"topo-4\"></a><a href=\"#pergunta-4\"><strong>4. O CMS Suindara &eacute; somente para sites simples, como blogs?</strong></a></p>\r\n\r\n<p><a id=\"topo-5\" name=\"topo-5\"></a><a href=\"#pergunta-5\"><strong>5. Como fa&ccedil;o para trocar minha senha?</strong></a></p>\r\n\r\n<p><a id=\"topo-6\" name=\"topo-6\"></a><a href=\"#pergunta-6\"><strong>6. Posso modificar o CMS Suindara?</strong></a></p>\r\n\r\n<p><a id=\"topo-7\" name=\"topo-7\"></a><a href=\"#pergunta-7\"><strong>7. Como eu crio mais templates para o CMS Suindara?</strong></a></p>\r\n\r\n<p><a id=\"topo-8\" name=\"topo-8\"></a><a href=\"#pergunta-8\"><strong>8. O CMS Suindara &eacute; protegido por algum direito autoral? Posso utiliz&aacute;-lo livremente?</strong></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"pergunta-1\" name=\"pergunta-1\"></a>1. O que &eacute; o CMS Suindara?</strong></p>\r\n\r\n<p>&eacute; um sistema de gerenciamento de conte&uacute;do para web, escrito em PHP com banco de dados MySQL, voltado principalmente para o gerenciamento de sites (sites, blogs, portais), sendo poss&iacute;vel gerenciar diversos destes com uma &uacute;nica instala&ccedil;&atilde;o deste sistema. Sua flexibilidade permite que voc&ecirc; administre seu conte&uacute;do mesmo sem nenhum conhecimento de HTML ou PHP. Al&eacute;m de uma cara super amig&aacute;vel, a plataforma trabalha com um sistema de acopla&ccedil;&otilde;es que permite instalar m&oacute;dulos separadamente. Esses s&atilde;o os chamados plugins. <a href=\"#topo-1\">voltar ao topo</a></p>\r\n\r\n<p><strong><a id=\"pergunta-2\" name=\"pergunta-2\"></a>2. Quero utilizar o CMS Suindara, por onde come&ccedil;o?</strong></p>\r\n\r\n<p>Para facilitar a utiliza&ccedil;&atilde;o por parte de nossos usu&aacute;rios criamos um&nbsp;manual de utiliza&ccedil;&atilde;o&nbsp;onde ensinamos a realizar todas as opera&ccedil;&otilde;es poss&iacute;veis no CMS Suindara, desde as fun&ccedil;&otilde;es b&aacute;sicas at&eacute; as mais complexas. Leia-o atentamente para evitar transtornos! <a href=\"#topo-2\">voltar ao topo</a></p>\r\n\r\n<p><strong><a id=\"pergunta-3\" name=\"pergunta-3\"></a>3. Quais s&atilde;o os plugins dispon&iacute;veis na instala&ccedil;&atilde;o do CMS Suindara?</strong></p>\r\n\r\n<p>No total s&atilde;o 13 plugins, que representam a base do CMS Suindara. Os plugins s&atilde;o:</p>\r\n\r\n<p>Authorize: Plugin respons&aacute;vel por verificar se o usu&aacute;rio possui autoriza&ccedil;&atilde;o para acessar as &aacute;reas administrativas do CMS Suindara.</p>\r\n\r\n<p>Banners: Gerencia os banners cadastrados em cada site administrado pelo CMS Suindara.</p>\r\n\r\n<p>Categorias: Gerencia as categorias de conte&uacute;dos dos sites administrados pelo CMS Suindara.</p>\r\n\r\n<p>Menus: Gerencia os menus e itens dos menus dos sites administrados pelo CMS Suindara.</p>\r\n\r\n<p>M&iacute;dias: Gerencia todas as m&iacute;dias do sistema, incluindo imagens, &aacute;udios, v&iacute;deos ou outros arquivos disponibilizados atrav&eacute;s do CMS Suindara nos sites que o mesmo administra.</p>\r\n\r\n<p>Not&iacute;cias: Gerencia as not&iacute;cias que alimentam os sites administrados pelo CMS Suindara.</p>\r\n\r\n<p>P&aacute;ginas: Gerencia as p&aacute;ginas dos sites administrados atrav&eacute;s do CMS Suindara.</p>\r\n\r\n<p>Perfis: Plugin respons&aacute;vel por controlar os n&iacute;veis de acesso dos usu&aacute;rios ao sistema.</p>\r\n\r\n<p>Permiss&otilde;es: Controla quais a&ccedil;&otilde;es cada perfil tem permiss&atilde;o.</p>\r\n\r\n<p>Sites: Gerencia os sites administrados pelo CMS Suindara.</p>\r\n\r\n<p>Templates: Gerencia os templates instalados no CMS Suindara.</p>\r\n\r\n<p>Uploads: Plugin respons&aacute;vel pelo upload dos arquivos enviados pelos usu&aacute;rios do sistema.</p>\r\n\r\n<p>Usu&aacute;rios: Este plugin gerencia os usu&aacute;rios que t&ecirc;m acesso &agrave; &aacute;rea administrativa do CMS Suindara. <a href=\"#topo-3\">voltar ao topo</a></p>\r\n\r\n<p><strong><a id=\"pergunta-4\" name=\"pergunta-4\"></a>4. O CMS Suindara &eacute; somente para sites simples, como blogs?</strong></p>\r\n\r\n<p>Ele foi projetado para sites de diferentes tamanhos, desde pequenos blogs at&eacute; portais de grande porte. A &uacute;nica diferen&ccedil;a ser&aacute; o template selecionado, pois &eacute; ele que vai deixar seu site com aspecto de um simples blog ou de um grande portal. <a href=\"#topo-4\">voltar ao topo</a></p>\r\n\r\n<p><strong><a id=\"pergunta-5\" name=\"pergunta-5\"></a>5. Como fa&ccedil;o para trocar minha senha?</strong></p>\r\n\r\n<p>Acesse o link com seu nome, que se encontra ao lado do link para sair do sistema . Na p&aacute;gina que ser&aacute; carregada, voc&ecirc; poder&aacute; editar todos os seus dados cadastrais, inclusive sua senha: informe sua nova senha no campo &quot;Senha&quot; e confirme-a digitado-a novamente no campo &quot;Confirmar senha&quot;.Feito isso, clique na op&ccedil;&atilde;o &quot;Salvar&quot; deste formul&aacute;rio. Caso edite seus dados cadastrais, mas n&atilde;o deseje mudar a senha, apenas deixe os campos referentes &agrave; senha em branco. Ao salvar, o sistema ir&aacute; gravar as mudan&ccedil;as dos demais campos e manter&aacute; a mesma senha. <a href=\"#topo-5\">voltar ao topo</a></p>\r\n\r\n<p><strong><a id=\"pergunta-6\" name=\"pergunta-6\"></a>6. Posso modificar o CMS Suindara?</strong></p>\r\n\r\n<p>Voc&ecirc; tem total liberdade para modific&aacute;-lo e adapt&aacute;-lo as suas necessidades, No entanto, n&atilde;o nos responsabilizamos em caso de mau funcionamento do sistema por ocorr&ecirc;ncia das mudan&ccedil;as realizadas. <a href=\"#topo-6\">voltar ao topo</a></p>\r\n\r\n<p><strong><a id=\"pergunta-7\" name=\"pergunta-7\"></a>7. Como eu crio mais templates para o CMS Suindara?</strong></p>\r\n\r\n<p>Se voc&ecirc; deseja criar seu pr&oacute;prio template para utilizar em seu site que est&aacute; sendo administrado com o CMS Suindara, utilize o seguinte manual:&nbsp;Manual de cria&ccedil;&atilde;o e instala&ccedil;&atilde;o de templates para o CMS Suindara. <a href=\"#topo-7\">voltar ao topo</a></p>\r\n\r\n<p><strong><a id=\"pergunta-8\" name=\"pergunta-8\"></a>8. O CMS Suindara &eacute; protegido por algum direito autoral? Posso utiliz&aacute;-lo livremente?</strong></p>\r\n\r\n<p>Os direitos autorais deste sistema pertencem ao MPOG (Minist&eacute;rio do Planejamento, Desenvolvimento e Gest&atilde;o) e ao IFRS (Instituto Federal de Educa&ccedil;&atilde;o, Ci&ecirc;ncia e Tecnologia do Rio Grande do Sul), sendo distribu&iacute;do gratuitamente sob a licen&ccedil;a&nbsp;GPL v3&nbsp;podendo ser utilizado livremente, com acesso ao seu c&oacute;digo fonte e havendo a possibilidade de modific&aacute;-lo se desejar, desde que sua distribui&ccedil;&atilde;o ocorra da mesma forma que este software foi adquirido, ou seja, gratuitamente. <a href=\"#topo-8\">voltar ao topo</a></p>\r\n',1,0,'2015-08-06 02:01:35',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (4,'Downloads','<p>Download do Suindara e de seus manuais.</p>',1,0,'2015-08-06 02:04:48',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (5,'Manuais','<p><strong>Manuais do Suindara:</strong></p>\r\n\r\n<ul>\r\n	<li><a href=\"11\">Manual de instala&ccedil;&atilde;o</a></li>\r\n	<li><a href=\"12\">Manual de uso</a></li>\r\n	<li><a href=\"13\">Manual de constru&ccedil;&atilde;o de templates</a></li>\r\n</ul>\r\n',1,0,'2015-08-06 02:18:39',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (6,'Instituto Federal do Rio Grande do Sul','<p>O <a href=\"http://www.ifrs.edu.br\">Instituto Federal de Educa&ccedil;&atilde;o, Ci&ecirc;ncia e Tecnologia do Rio Grande do Sul (IFRS)</a> &eacute; uma institui&ccedil;&atilde;o federal de ensino p&uacute;blico e gratuito. Atua com uma estrutura multic&acirc;mpus para promover a educa&ccedil;&atilde;o profissional e tecnol&oacute;gica de excel&ecirc;ncia e impulsionar o desenvolvimento sustent&aacute;vel das regi&otilde;es.</p>\r\n\r\n<p>Possui 17 c&acirc;mpus: Bento Gon&ccedil;alves, Canoas, Caxias do Sul, Erechim, Farroupilha, Feliz, Ibirub&aacute;, Os&oacute;rio, Porto Alegre, Restinga (Porto Alegre), Rio Grande e Sert&atilde;o e, em processo de implanta&ccedil;&atilde;o: Alvorada, Rolante, Vacaria, Veran&oacute;polis e Viam&atilde;o. A Reitoria &eacute; sediada em Bento Gon&ccedil;alves.</p>\r\n\r\n<p>Atualmente, o IFRS conta com cerca de 15 mil alunos, em 133 op&ccedil;&otilde;es de cursos t&eacute;cnicos e superiores de diferentes modalidades. Oferece tamb&eacute;m cursos de p&oacute;s-gradua&ccedil;&atilde;o e dos programas do governo federal Pronatec, Mulheres Mil, Proeja e Forma&ccedil;&atilde;o Inicial Continuada (FIC). Tem mais de 760 professores e 820 t&eacute;cnicos administrativos, estando entre os dez maiores institutos federais do Brasil em n&uacute;mero de alunos e servidores. Dos docentes, 87% s&atilde;o mestres e doutores.</p>\r\n\r\n<p>Conforme dados divulgados em dezembro de 2014 pelo Instituto Nacional de Estudos e Pesquisas Educacionais An&iacute;sio Teixeira (Inep) do Minist&eacute;rio da Educa&ccedil;&atilde;o (MEC), o IFRS foi o melhor classificado, entre os 38 institutos federais do pa&iacute;s, no conceito m&eacute;dio da gradua&ccedil;&atilde;o no ranking nacional do &Iacute;ndice Geral de Cursos Avaliados da Institui&ccedil;&atilde;o (IGC). O indicador refere-se &agrave; avalia&ccedil;&atilde;o do ano de 2013. Com conceito de gradua&ccedil;&atilde;o 3,3315, o IFRS aparece com a 21&ordf; coloca&ccedil;&atilde;o neste quesito na lista nacional das 228 universidades (p&uacute;blicas e privadas) e institutos federais avaliados.</p>\r\n\r\n<p>Quando englobados mestrados e doutorados, o IFRS fica na quarta posi&ccedil;&atilde;o entre os institutos federais e na 51&ordf; entre as 228 institui&ccedil;&otilde;es, pois ainda n&atilde;o oferecia cursos de p&oacute;s-gradua&ccedil;&atilde;o stricto sensu no ano de 2013. Assim, a pontua&ccedil;&atilde;o final de IGC cont&iacute;nuo foram os mesmos 3,3315 do conceito da gradua&ccedil;&atilde;o.</p>\r\n\r\n<p><strong>Mestrados</strong></p>\r\n\r\n<p>O IFRS teve dois cursos de mestrado profissional aprovados pela Coordena&ccedil;&atilde;o de Aperfei&ccedil;oamento em Pessoal de N&iacute;vel Superior (Capes) no &uacute;ltimo bimestre de 2014. O mestrado em Inform&aacute;tica na Educa&ccedil;&atilde;o ser&aacute; realizado no C&acirc;mpus Porto Alegre e a primeira sele&ccedil;&atilde;o est&aacute; prevista para o final do primeiro semestre de 2015. O curso possui as &aacute;reas de concentra&ccedil;&atilde;o: Tecnologias Educacionais e Educa&ccedil;&atilde;o na Sociedade em Rede; e as linhas de pesquisa: Tecnologia da Informa&ccedil;&atilde;o Aplicada &agrave; Educa&ccedil;&atilde;o e Pr&aacute;xis Educativa na Sociedade Digital.</p>\r\n\r\n<p>O mestrado em Tecnologia e Engenharia de Materiais ter&aacute; aulas ofertadas conjuntamente em tr&ecirc;s c&acirc;mpus: Caxias do Sul, Farroupilha e Feliz. A &aacute;rea de concentra&ccedil;&atilde;o ser&aacute; Tecnologia e Engenharia de Materiais; e as linhas de pesquisa: Desenvolvimento de Materiais de Engenharia e Tecnologia da Transforma&ccedil;&atilde;o de Materiais. A primeira sele&ccedil;&atilde;o est&aacute; prevista para o segundo semestre de 2015.</p>\r\n\r\n<p><strong>A hist&oacute;ria</strong></p>\r\n\r\n<p>O Instituto Federal de Educa&ccedil;&atilde;o, Ci&ecirc;ncia e Tecnologia do Rio Grande do Sul (IFRS) foi criado em 29 de dezembro de 2008, pela lei 11.892, que instituiu, no total, 38 Institutos Federais de Educa&ccedil;&atilde;o, Ci&ecirc;ncia e Tecnologia. Por for&ccedil;a de lei, o IFRS &eacute; uma autarquia federal vinculada ao Minist&eacute;rio da Educa&ccedil;&atilde;o (MEC). Goza de prerrogativas com autonomia administrativa, patrimonial, financeira, did&aacute;tico-cient&iacute;fica e disciplinar. Pertence &agrave; Rede Federal de Educa&ccedil;&atilde;o Profissional e Tecnol&oacute;gica.</p>\r\n\r\n<p>Em sua cria&ccedil;&atilde;o, o IFRS se estruturou a partir da uni&atilde;o de tr&ecirc;s autarquias federais: o Centro Federal de Educa&ccedil;&atilde;o Tecnol&oacute;gica (Cefet) de Bento Gon&ccedil;alves, a Escola Agrot&eacute;cnica Federal de Sert&atilde;o e a Escola T&eacute;cnica Federal de Canoas. Logo ap&oacute;s, incorporaram-se ao instituto dois estabelecimentos vinculados a Universidades Federais: a Escola T&eacute;cnica Federal da Universidade Federal do Rio Grande do Sul (Ufrgs) e o Col&eacute;gio T&eacute;cnico Industrial Prof. M&aacute;rio Alquati, de Rio Grande. No decorrer do processo, foram federalizadas unidades de ensino t&eacute;cnico nos munic&iacute;pios de Farroupilha, Feliz e Ibirub&aacute; e criados os c&acirc;mpus de Caxias, Erechim, Os&oacute;rio e Restinga. Estas institui&ccedil;&otilde;es hoje fazem parte do IFRS na condi&ccedil;&atilde;o de c&acirc;mpus.</p>\r\n\r\n<p>Prop&otilde;em valorizar a educa&ccedil;&atilde;o em todos os seus n&iacute;veis, contribuir para com o desenvolvimento do ensino, da pesquisa e da extens&atilde;o, oportunizar de forma mais expressiva as possibilidades de acesso &agrave; educa&ccedil;&atilde;o gratuita e de qualidade e fomentar o atendimento a demandas localizadas, com aten&ccedil;&atilde;o especial &agrave;s camadas sociais que carecem de oportunidades de forma&ccedil;&atilde;o e de incentivo &agrave; inser&ccedil;&atilde;o no mundo produtivo.</p>\r\n\r\n<p><strong>Inser&ccedil;&atilde;o Regional</strong></p>\r\n\r\n<p>Um dos objetivos dos institutos federais &eacute; definir pol&iacute;ticas que atentem para as necessidades e as demandas regionais. Nesse sentido, o IFRS apresenta uma das caracter&iacute;sticas mais significativas que enriquecem a sua a&ccedil;&atilde;o: a diversidade. Os c&acirc;mpus atuam em &aacute;reas distintas como agropecu&aacute;ria, de servi&ccedil;os, &aacute;rea industrial, vitivinicultura, turismo e outras.</p>\r\n',1,0,'2015-08-06 02:21:43',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (7,'Secretaria de Comunicação Social da Presidência da República','<p>A <a href=\"http://www.secom.gov.br/\">Secretaria de Comunica&ccedil;&atilde;o Social da Presid&ecirc;ncia da Rep&uacute;blica</a> coordena as a&ccedil;&otilde;es de comunica&ccedil;&atilde;o governamental, que obedecem aos crit&eacute;rios de sobriedade e transpar&ecirc;ncia, efici&ecirc;ncia e racionalidade da aplica&ccedil;&atilde;o dos recursos, al&eacute;m de supervisionar a adequa&ccedil;&atilde;o das mensagens aos p&uacute;blicos.</p>\r\n\r\n<p>A Secretaria de Comunica&ccedil;&atilde;o Social da Presid&ecirc;ncia da Rep&uacute;blica (Secom) foi institu&iacute;da pela&nbsp;Lei n&ordm; 6.650, de 23 de maio 1979, no governo do presidente Jo&atilde;o Figueiredo. O Decreto&nbsp;&nbsp;n&ordm; 200, de 25 de fevereiro de 1967&nbsp;incorporava a Empresa Brasileira de Not&iacute;cias (Radiobr&aacute;s) &agrave; estrutura da Secretaria, na qual estavam lotados apenas um secret&aacute;rio-geral, um inspetor de finan&ccedil;as, um chefe de gabinete e um consultor jur&iacute;dico. Suas principais atividades eram normativas e de assessoramento.<br />\r\n<br />\r\nAs atribui&ccedil;&otilde;es de planejamento, execu&ccedil;&atilde;o e controle, inclusive dos contratos de publicidade e da comunica&ccedil;&atilde;o social de governo cabiam &agrave; Radiobr&aacute;s. A estas atribui&ccedil;&otilde;es soma-se as atividades intr&iacute;nsecas a sua natureza, como: radiodifus&atilde;o educativa, recreativa e institucional do governo.<br />\r\n<br />\r\nDesde sua constitui&ccedil;&atilde;o, a Secom agregou fun&ccedil;&otilde;es e responsabilidades. Reda&ccedil;&otilde;es mais recentes passaram a atribuir ao &oacute;rg&atilde;o a coordena&ccedil;&atilde;o, supervis&atilde;o e controle da publicidade dos &oacute;rg&atilde;os e das entidades da administra&ccedil;&atilde;o p&uacute;blica federal, direta e indireta, al&eacute;m da convoca&ccedil;&atilde;o de redes obrigat&oacute;rias de r&aacute;dio e televis&atilde;o para pronunciamentos oficiais do presidente da Rep&uacute;blica e dos ministros.</p>\r\n\r\n<p>Em 28 de maio de 2003, altera&ccedil;&otilde;es feitas pela Lei n&ordm; 10.683, que trata da estrutura da Presid&ecirc;ncia da Rep&uacute;blica, e pelo Decreto n&ordm; 4.799, sobre a comunica&ccedil;&atilde;o de governo do Poder Executivo Federal, deram &agrave; Secom a responsabilidade pelo assessoramento sobre gest&atilde;o estrat&eacute;gica nacional. Outra responsabilidade adquirida foi a da centraliza&ccedil;&atilde;o das a&ccedil;&otilde;es de comunica&ccedil;&atilde;o institucional e de utilidade p&uacute;blica do Governo Federal, que antes contavam com a&ccedil;&otilde;es isoladas das assessorias dos minist&eacute;rios e outras entidades p&uacute;blicas.</p>\r\n\r\n<p>No Decreto n&ordm; 5.849, de 18.6.2006 o &oacute;rg&atilde;o passou a integrar a estrutura da Secretaria-Geral da Presid&ecirc;ncia da Rep&uacute;blica, com o nome de Subsecretaria de Comunica&ccedil;&atilde;o Institucional.&nbsp;As &uacute;ltimas altera&ccedil;&otilde;es foram efetuadas pela Lei n&ordm; 11.497/07, que dentre outras mudan&ccedil;as retorna ao nome inicial, ou seja, Secretaria de Comunica&ccedil;&atilde;o Social e incorpora a antiga Secretaria de Imprensa e Porta-Voz.</p>\r\n',1,0,'2015-08-06 02:25:02',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (8,'Identidade Digital de Governo','<p>O projeto Identidade Digital de Governo busca padronizar os portais dos &oacute;rg&atilde;os p&uacute;blicos federais e alinhar as informa&ccedil;&otilde;es para otimizar a comunica&ccedil;&atilde;o com o cidad&atilde;o. Os &oacute;rg&atilde;os t&ecirc;m &agrave; disposi&ccedil;&atilde;o a estrutura do Portal Padr&atilde;o que re&uacute;ne o que h&aacute; de mais adequado em solu&ccedil;&otilde;es digitais de acessibilidade e de divulga&ccedil;&atilde;o de informa&ccedil;&otilde;es nos mais variados formatos.</p>\r\n\r\n<p><strong>Portal Institucional Padr&atilde;o</strong></p>\r\n\r\n<p>Com os conte&uacute;dos, m&oacute;dulos e funcionalidades criados de acordo com os conceitos de acessibilidade, o Portal Institucional Padr&atilde;o busca facilitar o acesso do cidad&atilde;o aos servi&ccedil;os oferecidos pelo Governo Federal. Tamb&eacute;m para garantir uma visualiza&ccedil;&atilde;o mais uniforme, as p&aacute;ginas se adaptam automaticamente e podem ser visualizadas tanto em um computador quanto em smartphones ou tablets.</p>\r\n\r\n<p>A Secretaria de Comunica&ccedil;&atilde;o da Presid&ecirc;ncia - SECOM j&aacute; disponibiliza um pacote com o Sistema de Gest&atilde;o de conte&uacute;do de c&oacute;digo aberto Plone. J&aacute; est&atilde;o sendo desenvolvidos pacotes em Joomla e Drupal.</p>\r\n\r\n<p>Caso queira fazer parte do desenvolvimento de outros pacotes ou dar sugest&otilde;es, entre em contato com a Secretaria de Comunica&ccedil;&atilde;o da Presid&ecirc;ncia - SECOM.</p>\r\n\r\n<p><strong>Contato:</strong><br />\r\nSecretaria de Comunica&ccedil;&atilde;o Social da Presid&ecirc;ncia da Rep&uacute;blica<br />\r\nSecretaria de Comunica&ccedil;&atilde;o Integrada<br />\r\nDepartamento de Internet e Eventos<br />\r\nEndere&ccedil;o: Esplanada dos Minist&eacute;rios, bloco A<br />\r\nBras&iacute;lia - DF 70054-900<br />\r\nTelefone: (61) 3411 4912<br />\r\n<a href=\"http://portalpadrao.gov.br\">http://portalpadrao.gov.br</a></p>\r\n\r\n<p>Navegue pelo&nbsp;Portal&nbsp;e conhe&ccedil;a todas as aplica&ccedil;&otilde;es poss&iacute;veis para os mais variados conte&uacute;dos, sejam v&iacute;deos, imagens, &aacute;udios e textos.</p>\r\n',1,0,'2015-08-06 02:27:02',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (9,'Modelo de Acessibilidade em Governo Eletrônico - eMAG','<p>O Modelo de Acessibilidade em Governo Eletr&ocirc;nico (eMAG) consiste em um conjunto de recomenda&ccedil;&otilde;es a ser considerado para que o processo de acessibilidade dos s&iacute;tios e portais do governo brasileiro seja conduzido de forma padronizada e de f&aacute;cil implementa&ccedil;&atilde;o.</p>\r\n\r\n<p>O eMAG &eacute; coerente com as necessidades brasileiras e em conformidade com os padr&otilde;es internacionais. Foi formulado para orientar profissionais que tenham contato com publica&ccedil;&atilde;o de informa&ccedil;&otilde;es ou servi&ccedil;os na Internet a desenvolver, alterar e/ou adequar p&aacute;ginas, s&iacute;tios e portais, tornando-os acess&iacute;veis ao maior n&uacute;mero de pessoas poss&iacute;vel.</p>\r\n\r\n<p>A primeira vers&atilde;o do eMAG foi disponibilizada para consulta p&uacute;blica em 18 de janeiro de 2005 e a vers&atilde;o 2.0 j&aacute; com as altera&ccedil;&otilde;es propostas, em 14 de dezembro do mesmo ano.</p>\r\n\r\n<p>Em 2007, a Portaria n&ordm; 3, de 7 de maio, institucionalizou o eMAG no &acirc;mbito do Sistema de Administra&ccedil;&atilde;o dos Recursos de Tecnologia da Informa&ccedil;&atilde;o - SISP, tornando sua observ&acirc;ncia obrigat&oacute;ria nos s&iacute;tios e portais do governo brasileiro.</p>\r\n\r\n<p>A terceira vers&atilde;o do Modelo de Acessibilidade em Governo Eletr&ocirc;nico (e-MAG 3.0) foi lan&ccedil;ada em 21 de setembro de 2013, no evento Acessibilidade Digital &ndash; um direito de todos, trazendo uma se&ccedil;&atilde;o chamada &ldquo;Padroniza&ccedil;&atilde;o de acessibilidade nas p&aacute;ginas do governo federal&rdquo; com o intuito de uniformizar os elementos de acessibilidade que devem existir em todos os s&iacute;tios e portais do governo.</p>\r\n\r\n<p>A revis&atilde;o do modelo, com a&nbsp;<strong>nova vers&atilde;o (3.1)</strong>, foi desenvolvida por meio da parceria entre o Departamento de Governo Eletr&ocirc;nico, da Secretaria de Log&iacute;stica e Tecnologia da Informa&ccedil;&atilde;o (SLTI) do Minist&eacute;rio do Planejamento e o Instituto Federal do Rio Grande do Sul (IFRS). A vers&atilde;o 3.1 apresenta diversas melhorias no conte&uacute;do do texto para torn&aacute;-lo mais compreens&iacute;vel, com destaque para o subitem &quot;O processo para desenvolver um s&iacute;tio acess&iacute;vel&quot;, que ganhou um cap&iacute;tulo pr&oacute;prio. Tamb&eacute;m foram inseridos novos exemplos, inclusive com o uso de HTML5 e WAI-ARIA para determinadas recomenda&ccedil;&otilde;es.</p>\r\n\r\n<p>Na elabora&ccedil;&atilde;o do documento-proposta, foram consideradas as contribui&ccedil;&otilde;es de especialistas e as novas pesquisas na &aacute;rea de acessibilidade &agrave; Web, bem como as Recomenda&ccedil;&otilde;es de Acessibilidade para Conte&uacute;do Web (WCAG) 2.0, da W3C. Sempre com foco nas necessidades locais, visando atender as prioridades brasileiras.</p>\r\n\r\n<p>S&iacute;tio do <a href=\"http://emag.governoeletronico.gov.br\">Modelo de Acessibilidade em Governo Eletr&ocirc;nico (eMAG)</a></p>\r\n\r\n<p><strong>Contato:</strong></p>\r\n\r\n<p>Minist&eacute;rio do Planejamento, Desenvolvimento e Gest&atilde;o<br />\r\nSecretaria de Log&iacute;stica e Tecnologia da informa&ccedil;&atilde;o<br />\r\nDepartamento de Governo Eletr&ocirc;nico<br />\r\nEsplanada dos Minist&eacute;rios, Bloco C, 3&ordm; andar - Bras&iacute;lia/DF<br />\r\nTelefone: 61 - 2020 1319 - CEP: 70.046-900</p>\r\n\r\n<p>Informa&ccedil;&otilde;es e d&uacute;vidas sobre o eMAG podem ser enviadas para: govbr@planejamento.gov.br</p>\r\n',1,0,'2015-08-06 02:29:37',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (10,'Tradutor Automático de Conteúdos Digitais para LIBRAS - VLibras','<p>A Suite VLibras consiste em um conjunto de ferramentas computacionais de c&oacute;digo aberto, respons&aacute;vel por traduzir automaticamente conte&uacute;dos digitais (texto, &aacute;udio e v&iacute;deo) em LIBRAS, tornando computadores, dispositivos m&oacute;veis e plataformas Web acess&iacute;veis para pessoas com defici&ecirc;ncia auditiva. Com isso ser&aacute; poss&iacute;vel que pessoas com defici&ecirc;ncia auditiva possam acessar os conte&uacute;dos dessas tecnologias em sua l&iacute;ngua natural de comunica&ccedil;&atilde;o, reduzindo as barreiras de comunica&ccedil;&atilde;o e acesso &agrave; informa&ccedil;&atilde;o.</p>\r\n\r\n<p><img alt=\"Tela do VLibras\" src=\"/imagens/VLibras.JPG\" style=\"height:314px; width:400px\" /></p>\r\n\r\n<p>A Suite VLibras &eacute; composta pelas ferramentas VLibras-Plugin, VLibras-Desktop, VLibras-Video e WikiLibras. A ferramenta VLibras-Plugin, por exemplo, &eacute; um plugin de navegador que, quando habilitado, permite que o usu&aacute;rio traduza qualquer texto selecionado no navegador para LIBRAS de forma autom&aacute;tica. Com isso, o usu&aacute;rio com defici&ecirc;ncia auditiva pode navegar em qualquer p&aacute;gina na Internet e acompanhar a sua tradu&ccedil;&atilde;o para LIBRAS. A VLibras-Desktop &eacute; uma ferramenta mais geral que a VLibras-Plugin e pode ser aplicada para traduzir textos selecionados em qualquer software ou aplicativo instalado no computador pessoal do usu&aacute;rio com defici&ecirc;ncia auditiva para LIBRAS. Por fim, a VLibras-Video, como o pr&oacute;prio nome indica, tem como objetivo traduzir v&iacute;deos submetidos pelo usu&aacute;rio para LIBRAS, permitindo tamb&eacute;m que os usu&aacute;rios com defici&ecirc;ncia auditiva tenham acesso a conte&uacute;dos multim&iacute;dia na sua l&iacute;ngua natural de comunica&ccedil;&atilde;o. Essas ferramentas possuem, em comum, um n&uacute;cleo central de desenvolvimento, denominado VLibras-N&uacute;cleo, que tem como objetivo concentrar as principais funcionalidade dessas ferramentas.</p>\r\n\r\n<p>Nessa su&iacute;te, os conte&uacute;dos em LIBRAS ser&atilde;o gerados a partir da tradu&ccedil;&atilde;o autom&aacute;tica de textos, legendas ou &aacute;udio ou em l&iacute;ngua portuguesa, e ser&atilde;o representados por um agente animado virtual 3D (avatar-3D), denominado Hozana. Para a gera&ccedil;&atilde;o desses conte&uacute;dos, um Dicion&aacute;rio de LIBRAS ser&aacute; modelado e desenvolvido pela equipe do projeto, juntamente com uma ferramenta Web de constru&ccedil;&atilde;o colaborativa de sinais em LIBRAS, denominada WikiLibras.</p>\r\n\r\n<p>A proposta do WikiLIBRAS &eacute; permitir que colaboradores possam participar do processo de desenvolvimento do Dicion&aacute;rio de LIBRAS atrav&eacute;s da adi&ccedil;&atilde;o de novos sinais ou da edi&ccedil;&atilde;o dos sinais existentes, tornando o seu desenvolvimento mais produtivo.</p>\r\n\r\n<p><img alt=\"Tela do site do VLibras\" src=\"/imagens/VLibras-tela.JPG\" style=\"height:188px; width:400px\" /></p>\r\n\r\n<p>O Vlibras est&aacute; dispon&iacute;vel nos sites&nbsp;<a href="http://vlibras.gov.br">http://vlibras.gov.br</a>&nbsp;e&nbsp;<a href="https://softwarepublico.gov.br/social/suite-vlibras/">https://softwarepublico.gov.br/social/suite-vlibras/</a></p>\r\n',1,0,'2015-08-06 02:34:32',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (11,'Manual de instalação do CMS Suindara','<p><strong>Pr&eacute;-requisitos de instala&ccedil;&atilde;o e funcionamento:</strong></p>\r\n\r\n<ul>\r\n	<li>Apache 2 ou superior</li>\r\n	<li>PHP 5.2.8 ou superior</li>\r\n	<li>MySQL 5 ou superior</li>\r\n	<li>Bibliotecas Avconv e LAME devidamente instaladas</li>\r\n	<li>Mod_rewrite do Apache ativo</li>\r\n	<li>Sobrescrita de op&ccedil;&otilde;es do .htaccess habilitada</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Instala&ccedil;&atilde;o:</strong></p>\r\n\r\n<p>1. Copie o conte&uacute;do do arquivo compactado &ldquo;CMS_Suindara.zip&rdquo; para o diret&oacute;rio de seu servidor web.</p>\r\n\r\n<p>2. De permiss&atilde;o total para o diret&oacute;rio /app/config juntamente com seus subdiret&oacute;rios e arquivos. Fa&ccedil;o o mesmo com o diret&oacute;rio /app/plugin/instalar/config.</p>\r\n\r\n<ul>\r\n	<li>Permiss&atilde;o total: Quando fala-se &ldquo;permiss&atilde;o total&rdquo; entende-se por dar permiss&atilde;o de escrita,leitura e execu&ccedil;&atilde;o. &Eacute; necess&aacute;rio isso para que o instalador possa fazer as modifica&ccedil;&otilde;es necess&aacute;rias nos arquivos de configura&ccedil;&atilde;o do sistema.</li>\r\n</ul>\r\n\r\n<p>3. Crie uma base de dados, com nome de sua prefer&ecirc;ncia, em seu banco de dados.</p>\r\n\r\n<p>4. Inicie o instalador acessando atrav&eacute;s de um navegador web o dom&iacute;nio onde encontra-se o CMS Suindara e acrescentando &ldquo;/instalar&rdquo; no final do endere&ccedil;o. Por exemplo: http://www.meu_site_com_o_CMS_Suindara/instalar. Feito isso a tela representada na Figura 1 deve ser mostrada. Nesta etapa ser&aacute; feita a verifica&ccedil;&atilde;o do ambiente do sistema, se tudo estive certo continue. Caso o contr&aacute;rio, verifique:</p>\r\n\r\n<ul>\r\n	<li>As permiss&otilde;es para as pastas, subpastas e arquivos dos diret&oacute;rios citados acima.</li>\r\n	<li>A vers&atilde;o do PHP que est&aacute; rodando em seu servidor que dever&aacute; ser a 5.2.8 ou superior.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Passo 1 Verificação do Ambiente\" src=\"/imagens/manual_instalacao_fig1.JPG\" style=\"height:458px; width:654px\" /></p>\r\n\r\n<p>Figura 1 - Verifica&ccedil;&atilde;o do Ambiente</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5. Nesta etapa ser&aacute; configurada a conex&atilde;o com a base de dados, como mostra na<br />\r\nFigura 2. Voc&ecirc; dever&aacute; preencher os campos:</p>\r\n\r\n<ul>\r\n	<li>Endere&ccedil;o do servidor: endere&ccedil;o do servidor da base de dados.</li>\r\n	<li>Porta: porta em que est&aacute; seu servidor. N&atilde;o preenchendo este campo, ser&aacute; utilizada a porta padr&atilde;o.</li>\r\n	<li>Login: usu&aacute;rio de acesso ao banco de dados.</li>\r\n	<li>Senha: senha de acesso ao banco de dados.</li>\r\n	<li>Nome do BD: nome da base de dados criado no 3&ordm; item.</li>\r\n</ul>\r\n\r\n<p>Observa&ccedil;&atilde;o: Ap&oacute;s preencher e avan&ccedil;ar aguarde alguns instantes at&eacute; que a base de dados seja configurada.</p>\r\n\r\n<p><img alt=\"Passo 2 Conexão e Criação do Banco de Dados\" src=\"/imagens/manual_instalacao_fig2.JPG\" style=\"height:500px; width:637px\" /></p>\r\n\r\n<p>FIgura 2 - Conex&atilde;o e cria&ccedil;&atilde;o do banco de dados</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>6. Agora crie um usu&aacute;rio administrador para o sistema preenchendo o formul&aacute;rio, como mostra a Figura 3.</p>\r\n\r\n<ul>\r\n	<li>Nome do usu&aacute;rio</li>\r\n	<li>E-mail: Este e-mail ser&aacute; utilizado para o acesso a administra&ccedil;&atilde;o do CMS Suindara.</li>\r\n	<li>Departamento</li>\r\n	<li>Telefone</li>\r\n	<li>Institui&ccedil;&atilde;o</li>\r\n	<li>Senha: Esta ser&aacute; a senha solicitada para o acesso a administra&ccedil;&atilde;o do CMS Suindara.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Passo 3 Criação do usuário administrador\" src=\"/imagens/manual_instalacao_fig3.JPG\" style=\"height:471px; width:643px\" /></p>\r\n\r\n<p>Figura 3 - Cria&ccedil;&atilde;o do usu&aacute;rio administrador</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>7. Se tudo ocorrer corretamente a tela (Figura 4) dever&aacute; ser apresentada e o sistema estar&aacute; pronto para uso. Ao clicar em &ldquo;Ir para a Administra&ccedil;&atilde;o&rdquo; voc&ecirc; ser&aacute; direcionado a tela de login do CMS Suindara, onde voc&ecirc; deve inserir os dados conforme preencheu na etapa anterior.</p>\r\n\r\n<p><img alt=\"Passo 4 Finalização\" src=\"/imagens/manual_instalacao_fig4.JPG\" style=\"height:265px; width:616px\" /></p>\r\n\r\n<p>Figura 4 - Finaliza&ccedil;&atilde;o</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>8. Pronto, o CMS Suindara foi instalado com sucesso.</p>\r\n',1,0,'2015-10-01 10:11:01',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (12,'Manual de Uso','<p><strong>Guia do Publicador Para editores</strong></p>\r\n\r\n<p><a href=\"#item-1\">1. Sobre o Suindara</a><br />\r\n<a href=\"#item-2\">2. Conceitos B&aacute;sicos do Painel</a><br />\r\n<a href=\"#item-2.1\">2.1 Painel de Controle</a><br />\r\n<a href=\"#item-3\">3. Administra&ccedil;&atilde;o</a><br />\r\n<a href=\"#item-3.1\">3.1 M&iacute;dias</a><br />\r\n<a href=\"#item-3.2\">3.2 Sistema</a><br />\r\n<a href=\"#item-4\">4.Exemplo de Site</a><br />\r\n<a href=\"#item-4.1\">4.1 Conte&uacute;dos</a><br />\r\n<a href=\"#item-4.2\">4.2 Usu&aacute;rios</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-1\" name=\"item-1\"></a>1. Sobre o Suindara</strong><br />\r\nO Suindara &eacute; um Gerenciador de Conte&uacute;dos que permite integrar e automatizar todos os processos relacionados &agrave; cria&ccedil;&atilde;o, cataloga&ccedil;&atilde;o, indexa&ccedil;&atilde;o, personaliza&ccedil;&atilde;o, controle de acessos e disponibiliza&ccedil;&atilde;o de conte&uacute;dos em portais web. Atualmente, &eacute; comum a utiliza&ccedil;&atilde;o de gerenciadores em sites, blogs e portais, embora a maioria desses n&atilde;o seja totalmente acess&iacute;vel. Por esse motivo, desenvolvemos uma interface, na qual buscamos contemplar todas as recomenda&ccedil;&otilde;es do ATG 2.0 (Authoring Acessibility Guidelines), al&eacute;m de disponibilizarmos uma barra de acessibilidade na parte superior do ambiente; a qual cont&eacute;m diversas op&ccedil;&otilde;es de ajuste espec&iacute;ficas de acordo com a necessidade de cada usu&aacute;rio.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-2\" name=\"item-2\"></a>2. Conceitos b&aacute;sicos do Painel</strong></p>\r\n\r\n<p><strong><a id=\"item-2.1\" name=\"item-2.1\"></a>2.1 Painel de Controle</strong><br />\r\nPara acessar o painel de controle do Suindara, o usu&aacute;rio dever&aacute; digitar o endere&ccedil;o &lt; http://seudominio.com /login &gt;. A primeira tela a ser mostrada &eacute; a tela de login:</p>\r\n\r\n<p><img alt=\"Tela inicial do programa\" src=\"/imagens/manual_de_uso_fig1.JPG\" style=\"height:360px; width:529px\" /></p>\r\n\r\n<p>Figura 1 - Tela inicial do programa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Seguindo o pr&oacute;prio exemplo da p&aacute;gina, devem ser digitados o e-mail, o qual funcionar&aacute; como sendo seu nome de Usu&aacute;rio e a senha. Clicando na op&ccedil;&atilde;o &ldquo;Acessar&rdquo;, indicada na Imagem 01, voc&ecirc; poder&aacute; ter acesso ao site. Na barra superior da p&aacute;gina, presente na pr&oacute;xima tela, h&aacute; o nome do usu&aacute;rio com o qual voc&ecirc; est&aacute; acessando o site, a op&ccedil;&atilde;o &ldquo;Sair&rdquo;, caso queira acessar o Suindara com outra identifica&ccedil;&atilde;o ou apenas sair, e, no canto esquerdo, o link &ldquo;Op&ccedil;&otilde;es de Acessibilidade&rdquo;.</p>\r\n\r\n<p><img alt=\"Na segunda tela, selecione as configurações de acessibilidade e um site para gerenciar\" src=\"/imagens/manual_de_uso_fig2.JPG\" style=\"height:272px; width:662px\" /></p>\r\n\r\n<p>Figura 2 - Na segunda tela, selecione as configura&ccedil;&otilde;es de acessibilidade e um site para gerenciar</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ao clicar sobre este link, o usu&aacute;rio poder&aacute; configurar o Suindara, utilizando as op&ccedil;&otilde;es de &ldquo;Fonte&rdquo;, &ldquo;Alto Contraste&rdquo; e o &ldquo;Modo de exibi&ccedil;&atilde;o do sistema&rdquo;, de acordo com o tipo espec&iacute;fico de sua defici&ecirc;ncia ou prefer&ecirc;ncia. Ao definir as op&ccedil;&otilde;es de acessibilidade, elas automaticamente ficar&atilde;o salvas na pr&oacute;xima vez que voc&ecirc; utilizar o site, independente do dispositivo utilizado.</p>\r\n\r\n<p><img alt=\"Opções de Acessibilidade\" src=\"/imagens/manual_de_uso_fig3.JPG\" style=\"height:294px; width:690px\" /></p>\r\n\r\n<p>Figura 3 - Op&ccedil;&otilde;es de Acessibilidade</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As mesmas configura&ccedil;&otilde;es tamb&eacute;m podem ser acessadas clicando-se sobre o nome de Usu&aacute;rio, tamb&eacute;m presente na barra superior do site, ao lado direito, conforme vemos na Imagem 04.</p>\r\n\r\n<p><img alt=\"Atalho para configurar as Opções de Acessibilidade\" src=\"/imagens/manual_de_uso_fig4.JPG\" style=\"height:469px; width:728px\" /></p>\r\n\r\n<p>Figura 4 - Atalho para configurar as Op&ccedil;&otilde;es de Acessibilidade</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ap&oacute;s escolhidas &agrave;s devidas configura&ccedil;&otilde;es na p&aacute;gina, o usu&aacute;rio poder&aacute; optar entre duas &aacute;reas; a Administrativa, a qual cont&eacute;m os &iacute;cones &ldquo;M&iacute;dia&rdquo; e &ldquo;Sistema&rdquo;, e a op&ccedil;&atilde;o &ldquo;Exemplo de Site&rdquo;, que por sua vez, cont&eacute;m os menus &ldquo;Conte&uacute;dos&rdquo; e &ldquo;Usu&aacute;rios&rdquo;. Ao clicar em &ldquo;Acessar&rdquo;, uma nova p&aacute;gina ser&aacute; aberta, indicada na Imagem 05, e nesta; poderemos iniciar o gerenciamento do portal.</p>\r\n\r\n<p><img alt=\"Painel de Controle do Suindara\" src=\"/imagens/manual_de_uso_fig5.JPG\" style=\"height:451px; width:744px\" /></p>\r\n\r\n<p>Figura 5 - Painel de Controle do Suindara</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-3\" name=\"item-3\"></a>3. Administra&ccedil;&atilde;o</strong></p>\r\n\r\n<p><br />\r\nComo mencionado anteriormente, esta op&ccedil;&atilde;o &eacute; subdivida em outras duas categorias, encontradas no menu lateral esquerdo da p&aacute;gina; indicado na Imagem 06.</p>\r\n\r\n<p><img alt=\"Menu da área Administrativa\" src=\"/imagens/manual_de_uso_fig6.JPG\" style=\"height:491px; width:674px\" /></p>\r\n\r\n<p>Figura 6 - Menu da &aacute;rea Administrativa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-3.1\" name=\"item-3.1\"></a>3.1 M&iacute;dias</strong><br />\r\nBanco de imagens: Esta &eacute; uma op&ccedil;&atilde;o que possibilita a qualquer usu&aacute;rio logado como &ldquo;Administrador&rdquo; adicionar imagens representativas de diversos assuntos, com a finalidade de tornar a montagem de textos mais r&aacute;pida; j&aacute; que as imagens salvas tornam-se padr&atilde;o do site. Assim, ao escrever uma not&iacute;cia ou p&aacute;gina, escolhe-se, de acordo com o tema, uma das imagens do Banco.</p>\r\n\r\n<p><img alt=\"Banco de Imagens\" src=\"/imagens/manual_de_uso_fig7.JPG\" style=\"height:446px; width:720px\" /></p>\r\n\r\n<p>Figura 7 - Banco de Imagens</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Extens&otilde;es de arquivos: O conte&uacute;do de cada arquivo lhe confere um certo formato; identificado em sua extens&atilde;o ou termina&ccedil;&atilde;o; como por exemplo, arquivos com a extens&atilde;o &lsquo;.doc&rsquo; indicam um documento de texto do Microsoft Word. Nesta p&aacute;gina, h&aacute; uma lista contendo quais tipos de arquivos possuem ou n&atilde;o permiss&atilde;o para serem postados.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Figura 8 Listagem de Extensões de Arquivos\" src=\"/imagens/manual_de_uso_fig8.JPG\" style=\"height:482px; width:727px\" /></p>\r\n\r\n<p>Figura 8 - Listagem de Extens&otilde;es de Arquivos</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-3.2\" name=\"item-3.2\"></a>3.2 Sistemas</strong><br />\r\nGerenciamento de ACL(Lista de Controle de Acesso): O administrador possui o controle de todas as a&ccedil;&otilde;es realizadas pelo sistema, identificadas pelas quatro op&ccedil;&otilde;es presentes na p&aacute;gina.</p>\r\n\r\n<p><img alt=\"Figura 9 Opções editáveis da Lista de Controle de Acesso\" src=\"/imagens/manual_de_uso_fig9.JPG\" style=\"height:247px; width:592px\" /></p>\r\n\r\n<p>Figura 9 - Op&ccedil;&otilde;es edit&aacute;veis da Lista de Controle de Acesso</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Configura&ccedil;&otilde;es: Define as configura&ccedil;&otilde;es de tamanho m&aacute;ximo de upload, mem&oacute;ria e envio; al&eacute;m do tempo m&aacute;ximo de cada sess&atilde;o.</p>\r\n\r\n<p><img alt=\"Figura 10 - Opções de Configurações da página\" src=\"/imagens/manual_de_uso_fig10.JPG\" style=\"height:345px; width:621px\" /></p>\r\n\r\n<p>Figura 10 - Op&ccedil;&otilde;es de Configura&ccedil;&otilde;es da p&aacute;gina</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Figura 11 Lista de sites\" src=\"/imagens/manual_de_uso_fig11.JPG\" style=\"height:337px; width:664px\" /></p>\r\n\r\n<p>Figura 11 - Lista de sites</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sites: Nesta categoria, &eacute; poss&iacute;vel gerenciar os sites que voc&ecirc; possui, podendo exclu&iacute;-los, edit&aacute;-los, visualiz&aacute;-los,ou at&eacute; mesmo adicionar um novo site.</p>\r\n\r\n<p>Templates: Se&ccedil;&atilde;o onde &eacute; definido visual do site.</p>\r\n\r\n<p><img alt=\"Figura 12 Modelos para o site\" src=\"/imagens/manual_de_uso_fig12.JPG\" style=\"height:310px; width:673px\" /></p>\r\n\r\n<p>Figura 12 - Modelos para o site</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-4\" name=\"item-4\"></a>4. Exemplo de Site</strong><br />\r\nPara gerenciar esta se&ccedil;&atilde;o do site, ser&aacute; neces&aacute;rio alterar, na barra superior da p&aacute;gina, a op&ccedil;&atilde;o &ldquo;Admnistra&ccedil;&atilde;o&rdquo; para a op&ccedil;&atilde;o &ldquo;Exemplo de Site&rdquo;; clicando, seguidamente em &ldquo;Aplicar&rdquo;.<br />\r\n<img alt=\"Figura 13 - Tela inicial da opção “Site Teste”\" src=\"/imagens/manual_de_uso_fig13.JPG\" style=\"height:478px; width:780px\" /></p>\r\n\r\n<p>Figura 13 - Tela inicial da op&ccedil;&atilde;o &ldquo;Site Teste&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-4.1\" name=\"item-4.1\"></a>4.1 Conte&uacute;dos</strong><br />\r\nEspecifica o tipo de conte&uacute;do que aparecer&aacute; no site.<br />\r\nBanner: Banners s&atilde;o &iacute;cones publicit&aacute;rios geralmente localizados nas laterais dos sites, cuja finalidade &eacute; atrair um usu&aacute;rio para outro site atrav&eacute;s de um link. Nesta categoria, est&atilde;o especificados a quantidade de banners na p&aacute;gina. Para criar um novo banner, clique na op&ccedil;&atilde;o &ldquo;Adicionar um novo Grupo&rdquo;; digite o t&iacute;tulo e clique em &lsquo;Salvar&rsquo;. Observe a Imagem 13:</p>\r\n\r\n<p><img alt=\"Figura 14 Criação de um Banner\" src=\"/imagens/manual_de_uso_fig14.JPG\" style=\"height:437px; width:649px\" /></p>\r\n\r\n<p>Figura 14 - Cria&ccedil;&atilde;o de um Banner</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Catergorias: Nesta p&aacute;gina s&atilde;o encontradas as postagens do site, organizadas por &ldquo;Item&rdquo;, &ldquo;T&iacute;tulo&rdquo;, &ldquo;Descri&ccedil;&atilde;o&rdquo; e &ldquo;A&ccedil;&atilde;o&rdquo;. &Eacute; poss&iacute;vel alter&aacute;-las, apag&aacute;-las ou apenas visualiz&aacute;-las. Clicando-se em &ldquo;Adicionar nova categoria&rdquo;, &eacute; poss&iacute;vel fazer o cadastramento de um novo assunto para o site.</p>\r\n\r\n<p><img alt=\"Figura 15 Seção ‘Categorias’\" src=\"/imagens/manual_de_uso_fig15.JPG\" style=\"height:306px; width:746px\" /></p>\r\n\r\n<p>Figura 15 - Se&ccedil;&atilde;o &lsquo;Categorias&rsquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ser&aacute; necess&aacute;rio preencher o formul&aacute;rio de &lsquo;Cadastro de Categoria&rsquo;, mostrado na imagem 15, inserindo o t&iacute;tulo e a descri&ccedil;&atilde;o da postagem. Na op&ccedil;&atilde;o &ldquo;Categoria Pai&rdquo; selecione a categoria que se aplica ao seu assunto. Ainda &eacute; poss&iacute;vel definir quais perfis tem permiss&atilde;o para manipular a categoria. Ap&oacute;s a conclus&atilde;o do preenchimento, clique na op&ccedil;&atilde;o &ldquo;Salvar&rdquo;, tamb&eacute;m indicada na imagem 15.</p>\r\n\r\n<p><img alt=\"Figura 16 Cadastro de Categoria\" src=\"/imagens/manual_de_uso_fig16.JPG\" style=\"height:467px; width:637px\" /><img alt=\"Figura 16 Cadastro de Categoria\" src=\"/imagens/manual_de_uso_fig16.JPG\" style=\"height:467px; width:637px\" /></p>\r\n\r\n<p>Figura 16 - Cadastro de Categoria</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Menus: Ao clicar em &ldquo;Menus&rdquo;, haver&aacute; uma lista, organizada em &lsquo;Identificador&rsquo;, &lsquo;T&iacute;tulo do Menu&rsquo;, e &lsquo;A&ccedil;&otilde;es&rsquo;, dos j&aacute; existentes no site. &Eacute; poss&iacute;vel deletar, editar ou adicionar um novo Menu.Para isto, clique na op&ccedil;&atilde;o &ldquo;Adiconar novo menu&rdquo;, indicada na imagem 16, preencha o Cadastro e clique em &lsquo;Salvar&rsquo;.</p>\r\n\r\n<p><img alt=\"Figura 17 Listagem e Cadastramento de Menus\" src=\"/imagens/manual_de_uso_fig17.JPG\" style=\"height:552px; width:663px\" /></p>\r\n\r\n<p>Figura 17 - Listagem e Cadastramento de Menus</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Para cadastrar novos Itens a Menus j&aacute; existentes na Listagem, clique, na coluna &lsquo;A&ccedil;&otilde;es&rsquo;, em &lsquo;Itens do Menu&rsquo;.</p>\r\n\r\n<p><img alt=\"Figura 18 Lista de Menus da Página\" src=\"/imagens/manual_de_uso_fig18.JPG\" style=\"height:244px; width:732px\" /></p>\r\n\r\n<p>Figura 18 - Lista de Menus da P&aacute;gina</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ao clicar sobre esta op&ccedil;&atilde;o, uma lista aparecer&aacute; na p&aacute;gina, contendo todos os itens cadastrados naquele menu; juntamente com a sua classifica&ccedil;&atilde;o por ordem. Caso voc&ecirc; queira adiconar outro item ao menu, clique na op&ccedil;&atilde;o &ldquo;Adicionar novo item&rdquo; e preencha o Cadastro especificando o &lsquo;T&iacute;tulo&rsquo;, o &lsquo;Item pai&rsquo;; que se refere ao grupo onde ele ficar&aacute;, e o &lsquo;Tipo&rsquo;; podendo ser categoria, link, p&aacute;gina ou sem link. Para salvar as altera&ccedil;&otilde;es clique em &ldquo;Salvar&rdquo;.</p>\r\n\r\n<p><img alt=\"Adicionar novo item\" src=\"/imagens/manual_de_uso_fig19_0.JPG\" style=\"height:154px; width:714px\" /></p>\r\n\r\n<p><img alt=\"Figura 19 - Cadastro de um item no menu GovRodapé\" src=\"/imagens/manual_de_uso_fig19.JPG\" style=\"height:505px; width:737px\" /></p>\r\n\r\n<p>Figura 19 - Cadastro de um item no menu GovRodap&eacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Not&iacute;cias: Nesta categoria, voc&ecirc; poder&aacute; adicionar uma nova not&iacute;cia contendo diversos arquivos de m&iacute;dia. Para isto, basta clicar na op&ccedil;&atilde;o &lsquo;Adicionar nova not&iacute;cia&rsquo;, como mostrado na imagem 19.</p>\r\n\r\n<p><br />\r\n<img alt=\"Figura 20 - Seção “Notícias”\" src=\"/imagens/manual_de_uso_fig20.JPG\" style=\"height:224px; width:664px\" /></p>\r\n\r\n<p>Figura 20 - Se&ccedil;&atilde;o &ldquo;Not&iacute;cias&rdquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Na p&aacute;gina, mostrada na imagem 20, dever&atilde;o ser digitados o T&iacute;tulo, Resumo e Texto da not&iacute;cia. Preencha os &uacute;ltimos requisitos, Cartola, Autor e Categoria, e em seguida clique em &lsquo;Avan&ccedil;ar&rsquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Cadastro de Notícia\" src=\"/imagens/manual_de_uso_fig20_0.JPG\" style=\"height:577px; width:568px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Figura 21 Conteúdo Textual da notícia\" src=\"/imagens/manual_de_uso_fig21.JPG\" style=\"height:309px; width:656px\" /></p>\r\n\r\n<p>Figura 21 - Conte&uacute;do Textual da not&iacute;cia</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Na segunda etapa, voc&ecirc; tem a op&ccedil;&atilde;o de inserir m&iacute;dias e imagens relacionadas com o texto. Voc&ecirc; pode utilizar as imagens do Banco de Imagens ou escolher alguma dos seus documentos, clicando na op&ccedil;&atilde;o &lsquo;Escolher arquivos&rsquo;; selecione a imagem e clique em &lsquo;Abrir&rsquo;. Depois de selecionadas as imagens, clique em &lsquo;Avan&ccedil;ar&rsquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Figura 22 Segunda etapa\" src=\"/imagens/manual_de_uso_fig22.JPG\" style=\"height:499px; width:675px\" /></p>\r\n\r\n<p>Figura 22 - Segunda etapa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Na terceira etapa, h&aacute; a possibilidade de se inserir um documento anexo &agrave; not&iacute;cia. Da mesma forma utilizada para escolher uma imagem, escolheremos os documentos. Clique nas op&ccedil;&otilde;es &ldquo;Escolher arquivos&rdquo;, &ldquo;Enviar arquivos&rdquo; e &ldquo;Avan&ccedil;ar&rdquo;.</p>\r\n\r\n<p><img alt=\"Figura 23 Envio de arquivos\" src=\"/imagens/manual_de_uso_fig23.JPG\" style=\"height:411px; width:694px\" /></p>\r\n\r\n<p>Figura 23 - Envio de arquivos</p>\r\n\r\n<p><br />\r\nNa pen&uacute;ltima etapa, voc&ecirc; ter&aacute; uma pr&eacute;-visualiza&ccedil;&atilde;o de como ficar&aacute; a not&iacute;cia final. Se for necess&aacute;rio, clique na op&ccedil;&atilde;o &ldquo;Voltar&rdquo; para refazer os devidos ajustes.</p>\r\n\r\n<p><img alt=\"Figura 24 Pré-Visualização da notícia\" src=\"/imagens/manual_de_uso_fig24.JPG\" style=\"height:267px; width:583px\" /></p>\r\n\r\n<p>Figura 24 - Pr&eacute;-Visualiza&ccedil;&atilde;o da not&iacute;cia</p>\r\n\r\n<p><br />\r\nNa quinta e &uacute;ltima etapa, h&aacute; dois detalhes importantes. Clicando na op&ccedil;&atilde;o &ldquo;Bloquear Not&iacute;cia&rdquo;, voc&ecirc; impede que essa seja publicada. J&aacute; a op&ccedil;&atilde;o &ldquo;Agendar Not&iacute;cia&rdquo; permite que voc&ecirc; escolha uma data e hor&aacute;rio para a publica&ccedil;&atilde;o no site; assim como a op&ccedil;&atilde;o &ldquo;Data de Expira&ccedil;&atilde;o da Not&iacute;cia&rdquo; determina quando a mesma ficar&aacute; indispon&iacute;vel no site. Caso voc&ecirc; n&atilde;o queira nenhuma pr&eacute;-defini&ccedil;&atilde;o para a sua not&iacute;cia, clique em &ldquo;Salvar&rdquo;, e ela ser&aacute; imediatamente postada na p&aacute;gina. Da mesma forma, clicando na op&ccedil;&atilde;o &ldquo;Deletar&rdquo; a not&iacute;cia &eacute; automaticamente apagada.</p>\r\n\r\n<p><img alt=\"Figura 25 Publicação da notícia\" src=\"/imagens/manual_de_uso_fig25.JPG\" style=\"height:392px; width:598px\" /></p>\r\n\r\n<p>Figura 25 - Publica&ccedil;&atilde;o da not&iacute;cia</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>P&aacute;ginas: Nesta categoria est&atilde;o listadas as p&aacute;ginas do site; as quais possuem um formato semelhante &agrave;s not&iacute;cias comuns. A principal diferen&ccedil;a reside na possiblidade de se adicionar um banner &agrave; pr&oacute;pria p&aacute;gina. O cadastramento de p&aacute;ginas &eacute; parecido com o de not&iacute;cias. Preencha os campos de t&iacute;tulo e texto, e selecione o status como Ativo, ou seja, dispon&iacute;vel no site; ou Inativo, indispon&iacute;vel no site. Em seguida, clique em &ldquo;Avan&ccedil;ar&rdquo;.</p>\r\n\r\n<p><img alt=\"Figura 26 Conteúdo textual da página\" src=\"/imagens/manual_de_uso_fig26.JPG\" style=\"height:393px; width:641px\" /></p>\r\n\r\n<p>Figura 26 - Conte&uacute;do textual da p&aacute;gina</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A segunda e terceira etapas funcionam da mesma forma que as correspondentes em Not&iacute;cias. Depois de selecionados os arquivos de imagens e documentos, clique em &ldquo;Avan&ccedil;ar&rdquo;.</p>\r\n\r\n<p><img alt=\"Figura 27 Envio de Documentos\" src=\"/imagens/manual_de_uso_fig27.JPG\" style=\"height:358px; width:629px\" /><img alt=\"Figura 27 Envio de Documentos\" src=\"/imagens/manual_de_uso_fig27.JPG\" style=\"height:358px; width:629px\" /></p>\r\n\r\n<p>Figura 27 - Envio de Documentos</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Os banners, mencionados &agrave; cima, podem ser adicionados &agrave; not&iacute;cia na quarta etapa. Selecione o Grupo desejado, e clique em &ldquo;Avan&ccedil;ar&rdquo;. Na pr&oacute;xima etapa, temos juntamente com a visualiza&ccedil;&atilde;o da p&aacute;gina, as op&ccedil;&otilde;es &ldquo;Salvar&rdquo; e &ldquo;Voltar&rdquo;. Ao clicar em &ldquo;Salvar&rdquo;, a p&aacute;gina ser&aacute; automaticamente adicionada ao site.</p>\r\n\r\n<p><img alt=\"Figura 28 Salvar a Página\" src=\"/imagens/manual_de_uso_fig28.JPG\" style=\"height:375px; width:628px\" /><img alt=\"Figura 28 Salvar a Página\" src=\"/imagens/manual_de_uso_fig28.JPG\" style=\"height:375px; width:628px\" /></p>\r\n\r\n<p>Figura 28 - Salvar a P&aacute;gina</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><a id=\"item-4.2\" name=\"item-4.2\"></a>4.2 Usu&aacute;rios</strong></p>\r\n\r\n<p>Nesta janela,onde s&atilde;o definidos quais pessoas poder&atilde;o ou n&atilde;o acessar o gerenciamento de controle do site, h&aacute; tr&ecirc;s especifica&ccedil;&otilde;es: &ldquo;Perfis&rdquo;, &ldquo;Permiss&otilde;es&rdquo;e &ldquo;Usu&aacute;rios&rdquo;.</p>\r\n\r\n<p>Perfis: Nesta categoria, s&atilde;o definidas as possibilidades de controle do site, de acordo com o perfil de cada usu&aacute;rio. Caso voc&ecirc; queira adicionar um Perfil, clique na op&ccedil;&atilde;o &ldquo;Adicionar Novo Perfil&rdquo;, e informe o nome e a descri&ccedil;&atilde;o do mesmo, como mostrado no exemplo da imagem 28:</p>\r\n\r\n<p><img alt=\"Figura 29 Listagem de Perfis\" src=\"/imagens/manual_de_uso_fig29.JPG\" style=\"height:262px; width:604px\" /></p>\r\n\r\n<p>Figura 29 - Listagem de Perfis</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Permiss&otilde;es: As permiss&otilde;es s&atilde;o alteradas apenas pelo Administrador, que tamb&eacute;m definir&aacute; o n&iacute;vel de acesso de todos os outros usu&aacute;rios no site.</p>\r\n\r\n<p>Usu&aacute;rios: S&atilde;o definidas as pessoas que utilizar&atilde;o o site, escolhendo para tal dados cadastrais de acesso e um perfil.</p>\r\n',1,0,'2015-10-01 10:11:39',1,3);
INSERT INTO `paginas` (`id`,`titulo`,`texto`,`usuario_id`,`bloqueado`,`datahora_cadastro`,`site_id`,`status_id`) VALUES (13,'Manual de Construção de Templates','<p><strong>Criando um template</strong></p>\r\n\r\n<p>Para criar um template &eacute; necess&aacute;rio estar logado no sistema na &aacute;rea da Administra&ccedil;&atilde;o. Selecione &quot;Templates&quot; no menu lateral esquerdo e clique no bot&atilde;o &quot;Gerar novo template&quot;. Caso a opera&ccedil;&atilde;o seja executada com sucesso uma mensagem aparecer&aacute; no topo informando o ocorrido e identificando a localiza&ccedil;&atilde;o do template no disco. Na listagem de templates ser&aacute; adicionado um novo template com o nome &quot;Template_x&quot; onde x &eacute; o identificador do template. Por padr&atilde;o todos os templates s&atilde;o criados no diret&oacute;rio</p>\r\n\r\n<p>&lt;Local de instala&ccedil;&atilde;o do CMS3&gt;/app/webroot/templates/</p>\r\n\r\n<p>e a pasta do template em desenvolvimento ter&aacute; o mesmo nome do template (&quot;Template_x&quot;).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Estrutura</strong></p>\r\n\r\n<p>O template &eacute; composto pela seguinte estrutura de pastas:</p>\r\n\r\n<ul>\r\n	<li>_init : Cont&ecirc;m o script init.sql utilizado para gerar tabelas e inser&ccedil;&otilde;es no banco de dados na instala&ccedil;&atilde;o do template.</li>\r\n	<li>_end : Cont&ecirc;m o script end.sql utilizado para apagar as tabelas do banco de dados na remo&ccedil;&atilde;o do template.</li>\r\n	<li>css : cont&ecirc;m os arquivos de css.</li>\r\n	<li>js : Cont&ecirc;m os arquivos de script.</li>\r\n	<li>images : Cont&ecirc;m as imagens utilizadas no template.</li>\r\n	<li>noticias : Cont&ecirc;m os arquivos de visualiza&ccedil;&atilde;o e listagem das not&iacute;cias.</li>\r\n	<li>paginas : Cont&ecirc;m o arquivo de visualiza&ccedil;&atilde;o das p&aacute;ginas.</li>\r\n	<li>Elements : Arquivos parciais do template. Normalmente arquivos de visualiza&ccedil;&atilde;o que podem ser compartilhados, como o cabe&ccedil;alho e rodap&eacute; das p&aacute;ginas.</li>\r\n	<li>Layouts : Arquivos para alterar o layout de todas as p&aacute;ginas do template.</li>\r\n</ul>\r\n\r\n<p>Elements e Layouts s&atilde;o recursos emprestados do CakePHP, para mais informa&ccedil;&otilde;es verificar a documenta&ccedil;&atilde;o online (http://book.cakephp.org).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Resgatar dados no template</strong></p>\r\n\r\n<p>Os exemplos apresentados abaixo foram aplicados no Site Modelo que acompanha o CMS 3, seu c&oacute;digo pode ser encontrado em:</p>\r\n\r\n<p><br />\r\n&lt;Local de instala&ccedil;&atilde;o do CMS3&gt;/app/webroot/templates/default</p>\r\n\r\n<p><br />\r\n&Eacute; importante destacar que todos os arquivos de visualiza&ccedil;&atilde;o utilizados possuem a extens&atilde;o &quot;.ctp&quot;.</p>\r\n\r\n<p>Para resgatar os dados s&atilde;o utilizados subclasses dos ViewHelpers (http://book.cakephp.org/2.0/en/views/helpers.html). Cada ViewHelper &eacute; respons&aacute;vel por tratar e retornar os dados de uma &aacute;rea do sistema (not&iacute;cias, p&aacute;ginas, banners ...).</p>\r\n\r\n<p><br />\r\nNas pr&oacute;ximas se&ccedil;&otilde;es ser&atilde;o apresentados alguns trechos de c&oacute;digo para resgatar os dados de cada &aacute;rea do sistema. Maiores informa&ccedil;&otilde;es podem ser encontradas no fonte do Site Modelo e na documenta&ccedil;&atilde;o que acompanha o Suindara CMS 3.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Not&iacute;cias</strong></p>\r\n\r\n<p>O trecho de c&oacute;digo abaixo carrega uma not&iacute;cia e exibe algumas informa&ccedil;&otilde;es dela:</p>\r\n\r\n<p><img alt=\"Código fonte\" src=\"/imagens/manual_templates_fig1.JPG\" style=\"height:436px; width:690px\" /></p>\r\n\r\n<p>Na linha 2 o valor retornado pelo m&eacute;todo getParams &eacute; o primeiro par&acirc;metro recebido pela url que, neste caso, &eacute; o identificador da not&iacute;cia. Na linha 3 &eacute; carregada a not&iacute;cia, al&eacute;m do getNoticias existem outros m&eacute;todos que podem simplificar a busca por not&iacute;cias. &Eacute; importante observar que, por padr&atilde;o, somente as not&iacute;cias que possuem o status de &quot;publicada&quot; ser&atilde;o retornadas pelo m&eacute;todo.</p>\r\n\r\n<p><br />\r\nNa linha 6, 8 e 10 &eacute; gerado o html para a apresenta&ccedil;&atilde;o das informa&ccedil;&otilde;es. Tamb&eacute;m &eacute; poss&iacute;vel acessar o campo sem gerar o html correspondente, para isso basta chamar pelo nome do campo registrado no banco de dados. Por exemplo, para acessar o t&iacute;tulo da not&iacute;cia sem gerar o html pode-se utilizar:</p>\r\n\r\n<p><br />\r\n<img alt=\"Código fonte\" src=\"/imagens/manual_templates_fig2.JPG\" style=\"height:72px; width:694px\" /></p>\r\n\r\n<p>Para acessar as imagens, v&iacute;deos e arquivos associados a not&iacute;cia existem os m&eacute;todos getImagens, getVideos e getArquivos. Por exemplo, para acessar as imagens da not&iacute;cia carregada anteriormente:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig3.JPG\" style=\"height:376px; width:698px\" /></p>\r\n\r\n<p>Na linha 2 todas as imagens relacionadas a not&iacute;cia s&atilde;o carregadas, e na linha 5 &eacute; gerado o html para mostrar cada imagem. Na fun&ccedil;&atilde;o htmlImagem &eacute; poss&iacute;vel informar se a imagem utilizada ser&aacute; a original ou uma vers&atilde;o menor. O acesso aos v&iacute;deos e arquivos &eacute; feito de forma similar. Para mais informa&ccedil;&otilde;es sobre os m&eacute;todos utilizados e outros dispon&iacute;veis verifique a documenta&ccedil;&atilde;o.</p>\r\n\r\n<p><strong>P&aacute;ginas</strong></p>\r\n\r\n<p>O acesso aos dados das p&aacute;ginas &eacute; feito de forma similar ao de not&iacute;cias, segue um exemplo onde os dados de um p&aacute;gina s&atilde;o carregados e exibidos.</p>\r\n\r\n<p><img alt=\"Código fonte\" src=\"/imagens/manual_templates_fig4.JPG\" style=\"height:329px; width:695px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nas linhas 2 e 3 &eacute; carregado a p&aacute;gina com o identificador informado pelo primeiro par&acirc;metro passado pela url. Nas linhas 5 e 6 o t&iacute;tulo e o texto da p&aacute;gina s&atilde;o gerados e exibidos. O m&eacute;todo getImagens tamb&eacute;m pode ser utilizado em p&aacute;ginas para carregar as imagens relacionadas.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Categorias</strong></p>\r\n\r\n<p>No trecho de c&oacute;digo abaixo &eacute; carregada uma categoria:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig5.JPG\" style=\"height:83px; width:700px\" /></p>\r\n\r\n<p>Neste caso a categoria carregada possui o identificador &quot;Evento&quot;, sendo que este identificador &eacute; uma string registrada no momento em que a categoria &eacute; criada no CMS, outra possibilidade &eacute; utilizar o id da categoria para carrega-la.</p>\r\n\r\n<p><br />\r\nA categoria pode ser utilizada para filtrar not&iacute;cias que estejam vinculadas a ela. Por exemplo:</p>\r\n\r\n<p><br />\r\n<img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig6.JPG\" style=\"height:187px; width:697px\" /></p>\r\n\r\n<p>Na linha 1 todas as not&iacute;cias vinculadas a categoria &quot;Eventos&quot; s&atilde;o carregadas, nas linhas 2 a 3 o t&iacute;tulo de cada not&iacute;cia &eacute; mostrado.</p>\r\n\r\n<p><strong>Menus</strong></p>\r\n\r\n<p>Para carregar um menu &eacute; necess&aacute;rio informar o seu identificador, de forma similar ao acesso as categorias mostrado acima.</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig7.JPG\" style=\"height:74px; width:695px\" /></p>\r\n\r\n<p>O identificador &quot;AcessibilidadeVirtual&quot; &eacute; definido quando o usu&aacute;rio criar o menu pelo CMS.</p>\r\n\r\n<p><br />\r\nO menu &eacute; composto pela raiz e pelos sub-menus, podendo comportar v&aacute;rios n&iacute;veis de sub-menu. Para mostrar o menu pode-se iterar sobre seus sub-menus e apresentar as informa&ccedil;&otilde;es necess&aacute;rias:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig8.JPG\" style=\"height:195px; width:697px\" /></p>\r\n\r\n<p>Em alguns casos pode ser necess&aacute;rio criar formas mais complexas para apresentar o menu, ou reutilizar a forma como o menu &eacute; desenhado em outros templates. Nesses casos a montagem do menu pode ser encapsulada em um objeto que implemente a interface CmsMontadorMenu. Essa interface possui o m&eacute;todo htmlMenu(CmsMenuelement $baseMenu) que deve retornar uma string com o HTML gerado do menu. Segue o exemplo de um montador de menus utilizando com apenas um n&iacute;vel.</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig9.JPG\" style=\"height:597px; width:698px\" /></p>\r\n\r\n<p>Para apresentar o menu utilizando o MontadorMenuExemplo basta pass&aacute;-lo para o m&eacute;todo htmlMenu:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig10.JPG\" style=\"height:110px; width:695px\" /></p>\r\n\r\n<p>O exemplo de um montador de menus com mais n&iacute;veis pode ser encontrado em:</p>\r\n\r\n<p><br />\r\n&lt;Local de instala&ccedil;&atilde;o do CMS3&gt;/app/View/Helper/Util/CmsMontadorMenuPadrao.php</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Banners</strong></p>\r\n\r\n<p>Para carregar um banner &eacute; necess&aacute;rio informar o seu identificador:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig11.JPG\" style=\"height:79px; width:695px\" /></p>\r\n\r\n<p>Para apresenta-lo:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig12.JPG\" style=\"height:82px; width:698px\" /></p>\r\n\r\n<p>Como cada banner registrado no CMS pertence a um grupo, &eacute; poss&iacute;vel filtralos:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig13.JPG\" style=\"height:197px; width:697px\" /></p>\r\n\r\n<p>Neste caso, todos os banners registrados no grupo &quot;Principal&quot; ser&atilde;o mostrados como itens de uma lista.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>P&aacute;ginas est&aacute;ticas</strong></p>\r\n\r\n<p>Em alguns casos pode ser necess&aacute;rio a cria&ccedil;&atilde;o de uma p&aacute;gina diferenciada que n&atilde;o apresenta nenhuma similaridade com os padr&otilde;es j&aacute; aplicados no projeto.<br />\r\n<br />\r\nNesses casos pode-se criar p&aacute;ginas est&aacute;ticas que possuem um layout pr&oacute;prio.<br />\r\n<br />\r\nPara gerar uma p&aacute;gina est&aacute;tica &eacute; necess&aacute;rio criar um arquivo .ctp no diret&oacute;rio do template, sua chamada pela url ser&aacute; feita atrav&eacute;s do caminho l&oacute;gico do arquivo, por exemplo se a p&aacute;gina &#39;contato.ctp&#39; for criada no diret&oacute;rio raiz do<br />\r\ntemplate seu endere&ccedil;o ser&aacute;:</p>\r\n\r\n<p><br />\r\n/contato</p>\r\n\r\n<p><br />\r\nCaso esteja dentro de uma pasta chamada &#39;geral&#39;:</p>\r\n\r\n<p><br />\r\n/geral/contato</p>\r\n\r\n<p>Exemplos de p&aacute;ginas est&aacute;ticas podem ser encontrados no template do Site Modelo que acompanha o Suindara CMS.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Gerar dados no banco</strong></p>\r\n\r\n<p><br />\r\nConforme apresentado na se&ccedil;&atilde;o Estrutura, o arquivo _init/init.sql pode ser executado na instala&ccedil;&atilde;o do template, gerando as tabelas necess&aacute;rias para o template. J&aacute; o arquivo _end/end.sql ser&aacute; executado na remo&ccedil;&atilde;o do template, podendo remover qualquer dado utilizado pelo template.</p>\r\n\r\n<p><br />\r\n<strong>Empacotando o template</strong><br />\r\nPara preparar o pacote a ser distribu&iacute;do &eacute; importante descreve-lo no arquivo info.json que deve acompanhar todos os templates. A estrutura do arquivo info.json &eacute; apresentada abaixo:</p>\r\n\r\n<p><img alt=\"Código Fonte\" src=\"/imagens/manual_templates_fig14.JPG\" style=\"height:255px; width:696px\" /></p>\r\n\r\n<p>O campo &quot;print&quot; ser&aacute; uma imagem pequena, utilizada para a preview do template na listagem de templates.</p>\r\n\r\n<p>O arquivo deve ser colocado no diret&oacute;rio raiz do template. Para finalizar opacote &eacute; necess&aacute;rio compactar os arquivos para um .zip. &Eacute; importante salientar que os arquivos do template devem estar, obrigatoriamente, na raiz do arquivo .zip.</p>\r\n\r\n<p>&nbsp;</p>\r\n',1,0,'2015-10-01 10:12:02',1,3);
