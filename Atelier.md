Php Unit

**Que faut-il tester ?**

`Il n'est pas rare que l'on nous demande une couverture de code 
de 100%. Et pourtant, la couverture de code n'est pas la règle 
absolue à suivre ! La couverture de code n'est qu'une métrique 
qui montre le code qui a été exécuté par vos tests.
 Prenons un exemple avec le code suivant :`
 
 ```php
 class Product
 {
     const FOOD_PRODUCT = 'food';
     private $price;
     
     public function computeTVA()
     {
         // Chemin n°1 : le prix doit être < a 0
         if($this->price < 0){
             throw new \LogicException('The TVA cannot be negative');
         }
         
         // chemin n°2 : le prix du produit doit être supérieur à 0
         // et le type du prosuit doit avoir un type ayant la valeur food
         if(self::FOOD_PRODUCT == $this->type){
             return $this->price * 0.055;
         }
         
         // chemin n°3 : le prix du produit doit être supérieur à 0
         // et le type du prosuit doit avoir un type différent de la valeur food
         return $this->price * 0.196;
     }
 }    
  ```
     
 `
 il existe plusieurs manières de tester une ligne de code donnée. Par ailleurs, un test doit aussi pouvoir permettre de détecter les cas limites qui n'auraient pas été vus lors de l'élaboration des spécifications.
 Il est important de concentrer vos efforts dans l'écriture de tests couvrants le code dit "critique" de votre application.
 Je prends comme exemple une application e-commerce. Ce qui fait le succès de ce type de site, c'est l'affichage des produits et la possibilité de commander ceux-ci. Dans le cadre de tests unitaires, 
 il faudrait donc prendre soin de faire en sorte que la description de produit comporte assez de caractères, ou qu'ils aient un titre bien formalisé, ou encore que la méthode en charge du calcul du total d'une commande fasse correctement son travail.
 Retenez donc qu'il est important de tester est ce qui est important pour le business de l'application. Ne visez pas le 100% de couverture, visez le maximum de cas d'utilisation du code.`
 
 **Quand faut-il tester ?**
 
 `
 L'une des problématiques récurrentes dans l'écriture de tests est le temps à passer 
 sur l'écriture de ceux-ci. Étant donné qu'il s'agit de code qui n'est pas directement 
 exploitable par les utilisateurs de l'application, il est assez simple d'arriver à se dire, 
 pris par les délais, que finalement, il n'est pas utile de les écrire.
 Il vous arrivera également de passer par un sentiment de grande difficulté 
 lorsque vous prendrez peut-être plus de temps à écrire un test qu'à écrire du code 
 lié au fonctionnement même de votre application. :'(Écrire des tests demande une 
 grande rigueur avec vous-même : en effet, il faut prendre le temps de lister 
 ce qu'il faut tester, écrire ces tests et surtout les maintenir à jour. 
 Ce n'est pas une mince affaire !
 Il est primordial d'intégrer ce temps d'écriture de tests dans vos estimations 
 de temps (ou de complexité). Au même titre que l'écriture de code fonctionnel, 
 les tests doivent faire partie du développement de l'application. 
 Tout comme le temps que vous prenez à ouvrir votre navigateur pour lancer 
 votre application web et la tester à la main, c'est du temps qu'il est absolument 
 nécessaire de prendre !`
 
 _Vous pouvez écrire vos tests à différents moments au cours de votre cycle projet :_
 
     avant d'écrire votre code fonctionnel ;
 
     après avoir écrit votre code fonctionnel ;
 
     lorsqu'un bug est détecté.
 
 _Avant d'écrire le code_
 
 `On parle de Test Driven Development (TDD). Il s'agit de développement mené par les tests.
 Il y a 3 étapes à respecter :`
 
     Écrire le test.
 
     Lancer le test et vérifier qu'il échoue.
 
     Écrire le code fonctionnel.
 
     Lancer le test et vérifier qu'il est ok.
 
 `
 Cette méthode est très rassurante étant donné qu'elle demande à ce que le test passe en premier, 
 donc plus d'inquiétude quant à l'idée d'abandonner les tests !
 Néanmoins, il faut a priori savoir ce que vous allez développer en matière de méthode(s) et classe(s)… Et soyons honnête, 
 ce n'est pas toujours très clair avant de s'y mettre vraiment. C'est un pli à prendre, plus vous pratiquerez, plus ce sera simple.
 Après avoir écrit le code
 C'est ce qui est le plus communément fait. Il s'agit simplement de reprendre le code développé 
 jusque-là et le tester afin de s'assurer que celui-ci fonctionne comme prévu.
 Le danger ici est de se laisser aller à l'idée que finalement  écrire un (ou plusieurs) 
 test(s) n'est pas nécessaire, par manque de temps ou par excès de confiance.
 Lorsqu'un bug est détecté
 Plutôt que de se lancer tête baissée dans la correction du problème remonté, il faut :`
 
     Le reproduire avec un test.
     S'assurer que le test échoue.
     Écrire le code pour le corriger.
     S'assurer que le test passe correctement.
 
 `Cette manière de faire permet d'accumuler une batterie de tests couvrant bon nombre de cas, au fur et à mesure des anomalies rencontrées. 
 Cela permet également de s'assurer que, d'une anomalie à l'autre, la correction apportée n'introduit pas de régression.
 Ces trois solutions peuvent être adoptées tout au long du projet ! Le plus important est d'être à l'aise et surtout de ne pas abandonner l'écriture de tests !
 Il est également intéressant de se mettre à l'écriture de tests pour une application dont on ne connaît pas le code : en effet, 
 un test unitaire nécessite de connaître le code à tester. Cela force donc à lire ce code et à le comprendre. :soleil:
 Rendez-vous au prochain chapitre pour découvrir le monde merveilleux de l'intégration continue.`
 
 __En quoi consiste l'intégration continue ?__

` il existe aussi des solutions pour faire en sorte que les tests soient lancés de façon systématique 
avant un événement important. Cet événement peut être la fusion d'une branche git 
sur laquelle vous avez travaillé dans la branche master / dev (qui doit toujours être stable), 
ou encore avant un déploiement en (pré)production.`

__Le cycle d'intégration continue__

`L'intégration continue passe par un outil (un logiciel). 
Cet outil est en charge de lancer un ou plusieurs logiciels qui sont eux-mêmes 
en charge de valider un aspect de l'application (tests unitaires, 
tests fonctionnels, tests d'intégration, tests de performances… et bien d'autres).`

`Vous pouvez voir l'intégration continue comme une tour de contrôle, 
avec plusieurs opérateurs en charge de lancer successivement les différents outils 
permettant de valider le fonctionnement global de l'application.`

`L'outil d'intégration continue permet de lancer l'ensemble des autres outils 
le plus rapidement possible afin de valider un build avant d'entamer un déploiement 
ou une fusion de branche par exemple.`

__Qu'est-ce qu'un build ?__

`C'est tout simplement le fait de lancer l'ensemble des logiciels permettant de valider un changement dans l'application. 
Voici comment un build intervient :`

*phpUnit : test unitaire*

*Behat : est un logiciel permettant de tester le comportement de son application.*

*JMeter : est un outil permettant de simuler une montée en charge.*

`En fonction de ce qui est nécessaire de valider et les intégrations possibles avec l'outil 
d'intégration continue, il est possible d'ajouter de nombreux autres outils de validation.
Pour ce cours, nous nous contenterons de valider notre application grâce au lancement de nos tests 
PHPUnit.`

`Il existe bon nombre d'outils d'intégration continue. En voici une liste (non exhaustive) :'
 
*Travis*

*Jenkins*
 
*Gitlab CI*
 
*Appveyor*
 
*Circle CI*
 
*Bamboo*
 
*Codeship*

__Comment choisir le bon outil d'intégration continue ?__

`En général les entreprises basent leur choix sur le prix que coûtent les outils 
ainsi que leur popularité. Il est inutile de chercher à vous former sur tous 
les outils ! Le tout est d'en comprendre le fonctionnement général, 
vous serez ensuite en mesure de vous baser sur la documentation de chacun 
des outils pour les mettre en place.`

`Afin de vous en montrer au moins un, je vous propose de voir comment utiliser 
TravisCI. Rendez-vous au prochain chapitre pour le mettre en place ensemble !`

__mettre en place un outil d'intégration continue, Travis__

