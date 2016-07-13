
INSERT INTO `sites` (`id`, `titulo`, `descricao`, `instituicao`, `endereco`, `palavras_chave`, `email_contato`, 
	                 `site_principal`, `dominio`, `template_id`) 
VALUES (1,'Suindara','descrição','Ministério do Planejamento','teste','palavras, chave, separadas, por ,vírgula','teste@siteteste.com',1,'localhost',2);


INSERT INTO `perfis` (`id`, `nome`, `descricao`, `site_id`) VALUES (1, 'Teste', 'perfil teste', 1);


INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `departamento`, `telefone`, `instituicao`, `modo_sistema`, 
	                    `fonte_id`, `contraste_id`, `site_id`, `root`) 
VALUES (1, '{nome}', '{email}', '{senha}', '{departamento}', '{telefone}', '{instituicao}', 0, 2, 1, 1, 1);


INSERT INTO `usuario_perfis` (`id`, `usuario_id`, `perfil_id`) VALUES (1, 1, 1);


INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) 
VALUES (1, NULL, 'Perfil', 1, '', 1, 2), (2, 1, 'Usuario', 1, '', 3, 4);
 