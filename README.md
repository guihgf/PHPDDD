Projeto arquitetado por mim em uma tentativa de utilizar DDD na linguagem PHP.

O projeto esta dividido nas seguintes camadas:

0-Presentation (camada de apresentação)
  Controllers
  Middleware (Para filtro e tratamento de requisições)
  Rest (Para roteamento dos dados)
  Views

1-Application (camada de aplicação que "conversa" com a de dominio, repositório e terceiros(como envio de e-mail, webservices e afins)).

2-Domain (Camada de dominio com regras de negócio e dados das entidades)
  Entities (Arquivos de entidades(models))
  Interfaces (Interfaces dos repositórios)
  Util (contém um arquivo de Validações de campos pronto)

3-Infra
  3.1-Data
    EntityConfig - Contém classes com mapeamento das tabelas de banco para os models(Domain/Entities).
    Factories - Contém as classes que são responsáveis de transformar um model em um config(tabela) para realizar transações no banco.
    Repositories
  3.2-CrossCutting (Mapeamento de Interface/ Classe utilizando o IOC Dice).
  
O projeto visa não ser complexo, utilizando libs simples, o maior desafio foi "bolar" uma maneira de não setar atributos de mapeamento de banco de dados na camada de Dominio, pois ela não deve possuir esse tipo informação. C
omo não encontrei nenhum framework que poupe o dominio de ser utilizado diretamente com o banco(assim como o Entity Framework do C# faz utilizando contexto), tive que criar as classes em EntityConfig para mapear o modelo com a tabela do banco e as Factories para converter quando necessário um modelo em uma tabela e vice versa. Os repositórios devem extender a classe RepositorioBase que possuem implementações que abstraem a utilização das Factories.

Necessário no minimo PHP 5.6 para uso do projeto.
    
