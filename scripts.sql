CREATE TABLE grupos_lancamentos (
	codigo INT(11) NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
	data_cadastro TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	data_desativacao DATE NULL DEFAULT NULL,
	tipo int(2) not null,
	usuario_id INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (codigo),
	INDEX usuario_id (usuario_id),
	CONSTRAINT fk_grupo_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id)
);

create table lancamentos(
	codigo int not null auto_increment,
	tipo int not null,
	nome VARCHAR(100) NOT NULL,
	data_cadastro TIMESTAMP not NULL DEFAULT CURRENT_TIMESTAMP,
	data_vencimento TIMESTAMP not null,
	data_pagamento TIMESTAMP NULL DEFAULT NULL,
	valor DOUBLE not null,
	observacao VARCHAR(300) NULL DEFAULT NULL,
	conta_id INT(11) not NULL,
	grupo_id INT(11) NULL DEFAULT NULL,
	participante_id INT(11) NULL DEFAULT NULL,
	tipo_pagamento_id INT(11) NULL DEFAULT NULL,
	usuario_id INT(11) not null,
	PRIMARY KEY (codigo),
	INDEX usuario_id (usuario_id),
	INDEX conta_id (conta_id),
	INDEX grupo_id (grupo_id),
	INDEX participante_id (participante_id),
	INDEX tipo_pagamento_id (tipo_pagamento_id),
	CONSTRAINT fk_lc_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
	CONSTRAINT fk_lc_conta FOREIGN KEY (conta_id) REFERENCES contas (codigo),
	CONSTRAINT fk_lc_gd FOREIGN KEY (grupo_id) REFERENCES grupos_despesas (codigo),
	CONSTRAINT fk_lc_participante FOREIGN KEY (participante_id) REFERENCES participantes (codigo),
	CONSTRAINT fk_lc_tp FOREIGN KEY (tipo_pagamento_id) REFERENCES tipos_pagamentos (codigo)
);