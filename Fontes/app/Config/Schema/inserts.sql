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
(1, 'Site Modelo', 'Site Modelo - Acessibilidade Virtual.png', 'Acessibilidade Virtual', 'default', 'Template do Site Modelo do projeto Acessibilidade Virtual');

INSERT INTO `templates` (`id`, `nome`, `print`, `autor`, `caminho`, `descricao`) VALUES
(2, 'Site Modelo do Governo Eletrônico', 'gov.png', 'Site Modelo do Governo Eletrônico', 'gov', 'Site Modelo do Governo Eletrônico');

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
INSERT INTO `mimes` (`id`, `mime`, `tipo_id`, `extensao`, `ativo`) VALUES (651, 'video/mp4', 2, 'mp4', 1);




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






