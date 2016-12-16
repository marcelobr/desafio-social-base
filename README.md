# desafio-social-base

**Caso Prático**

Código Fonte na pasta DesafioSocialBase.

**Caso Teórico**

Cenário hipotético: Uma loja virtual famosa e muito acessada está precisando comunicar seus clientes sobre uma promoção relâmpago. 

Esta informação deverá ser enviada através de dois canais: 

1) Via e-mail para os usuários cadastrados na newsletter 
2) Via push notification para os usuários que baixaram o app mobile;

A promoção consiste em um desconto de 50% para as compras realizadas em até 15 minutos após o cadastro da promoção no sistema da loja virtual.

Considerações:
- O total de clientes a ser notificado é de aproximadamente 2 milhões (em cada canal);
- Garantir que todos os clientes sejam notificados em tempo hábil para que eles consigam aproveitar o desconto relâmpago.

Descreva como seria a arquitetura da solução para atender este cenário. A avaliação levará em conta a estratégia e tecnologias utilizadas.

**Resposta:** Levando em consideração o cenário descrito e principalmente as considerações de notificação em tempo hábil e total de notificações em aproximadamente 2 milhões. Isso tudo depende muito de infraestrutura e alta disponibilidade. Creio que, dependendo da empresa, seja muito difícil ou arriscado ela garantir que a própria infraestrura interna venha a suprir essas necessidades. Então proponho que para notificação via e-mail seja utilizado o mailchimp e Firebase Cloud Messaging para notifcação via push. Pois são duas plataformas muito eficientes e conhecidas para ambos os casos e também contam com a infraestrutura e alta disponibilidade necessárias. Além disso, o MailChimp conta com recursos interessantes, como: personalização de campanhas, relatórios de desempenho, integração com redes sociais, monitoramento a partir do Google Analytics e várias opções de template de e-mail. O Firebase Cloud Messaging construído para escala e segundo informações já envia 170 bilhões de mensagens por dia para dois bilhões de dispositivos, e envia mensagens ao aplicativo cliente de três maneiras: para dispositivos únicos, para grupos de dispositivos ou para dispositivos inscritos em tópicos. Pelo que entendi da descrição do cenário, a empresa já tem um sistema de loja virtual que irá disponibilizar o cadastro da promoção. Dessa forma, será preciso somente realizar a integração do sistema já existente com as duas plataformas propostas.
