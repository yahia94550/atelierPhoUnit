#Php Unit

##Installer PHPUnit avec Composer

```php
{

    // …

    },

    "require": {

        // …

        "phpunit/phpunit": "5.7.*"

    },

    // …

}
```
puis lancer :

`$ composer update phpunit/phpunit`

Vérifier le fonctionnement etl'installation de phpUnit :

`vendor/bin/phpunit --help`

Lancer les tests :

`vendor/bin/phpunit`

Lancer le test pour une fonction précise :

`vendor/bin/phpunit --filter=testMaFonction`

**Configurer phpUnit**

Les attributs d’un élément <phpunit> peuvent être utilisés pour configurer les fonctionnalités du coeur de PHPUnit.

```
<phpunit
         xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/6.3/phpunit.xsd"
         backupGlobals="true"
         backupStaticAttributes="false"
         <!--bootstrap="/path/to/bootstrap.php"-->
         cacheResult="false"
         cacheTokens="false"
         colors="false"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         forceCoversAnnotation="false"
         printerClass="PHPUnit\TextUI\ResultPrinter"
         <!--printerFile="/path/to/ResultPrinter.php"-->
         processIsolation="false"
         stopOnError="false"
         stopOnFailure="false"
         stopOnIncomplete="false"
         stopOnSkipped="false"
         stopOnRisky="false"
         testSuiteLoaderClass="PHPUnit\Runner\StandardTestSuiteLoader"
         <!--testSuiteLoaderFile="/path/to/StandardTestSuiteLoader.php"-->
         timeoutForSmallTests="1"
         timeoutForMediumTests="10"
         timeoutForLargeTests="60"
         verbose="false">
  <!-- ... -->
</phpunit>
```
Le fichier de configuration XML ci-dessus correspond au comportement par défaut du lanceur de tests TextUI documenté dans Options de la ligne de commandes.

Des options supplémentaires qui ne sont pas disponibles en tant qu’option de ligne de commandes sont :


##### convertErrorsToExceptions #####

Par défaut, PHPUnit va installer un gestionnaire d’erreur qui converti les erreurs suivantes en exceptions :


    E_WARNING
    E_NOTICE
    E_USER_ERROR
    E_USER_WARNING
    E_USER_NOTICE
    E_STRICT
    E_RECOVERABLE_ERROR
    E_DEPRECATED
    E_USER_DEPRECATED

Mettre convertErrorsToExceptions à false désactivera cette fonctionnalité.

#### Configurer des Série de tests #####

L’élément <testsuites> et son ou ses enfants <testsuite> peuvent être utilisés pour composer une série de tests à partir des séries de test et des cas de test.

```xml
<testsuites>
  <testsuite name="My Test Suite">
    <directory>/path/to/*Test.php files</directory>
    <file>/path/to/MyTest.php</file>
    <exclude>/path/to/exclude</exclude>
  </testsuite>
</testsuites>
```

En utilisant les attributs phpVersion et phpVersionOperator, une version requise de PHP peut être indiquée. L’exemple ci-dessous ne va ajouter que les fichiers /path/to/*Test.php et /path/to/MyTest.php si la version de PHP est au moins 5.3.0.

#####Groupes #####


L’élément <groups> et ses enfants <include>, <exclude> et <group> peuvent être utilisés pour choisir des groupes de tests marqués avec l’annotation @group (documenté dans @group) qui doivent (ou ne doivent pas) être exécutés.

```xml
<groups>
  <include>
    <group>name</group>
  </include>
  <exclude>
    <group>name</group>
  </exclude>
</groups>
```

La configuration XML ci-dessus revient à appeler le lanceur de test TextUI avec les options suivantes:

    --group name
    --exclude-group name


######Voir https://phpunit.readthedocs.io/fr/latest/configuration.html pour plus de étails #####

####Que faut-il tester ? ####

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
 
 #####TDD, vous avez dit TDD ? ####
      
     Le Test Driven Development (Développement Dirigé par les Tests), est une technique de développement qui impose l’écriture de tests avant même l’écriture de la première ligne de code.
      
      Dans la théorie, la méthode requiert l’intervention d’au moins deux intervenants différents, une personne écrit les tests, l’autre le code testé. Cela permet d’éviter les problèmes liés à la subjectivité.
      
      Dans la pratique les choses sont plus compliquées, parfois on développe seul ou on écrit soi-même les tests qui garantissent l’intégrité d'une nouvelle fonctionnalité dans un projet collaboratif.
      
          Quoi qu’il arrive, un test peu efficace vaudra toujours mieux que pas de test du tout. Le but étant de prendre l’habitude d’en écrire et d’être objectif dans leur rédaction.
      
      Le TDD tend à se démocratiser et requiert l’effort de chacun pour devenir un standard. Tout développeur soucieux de son environnement et de son héritage doit se poser sérieusement la question.
      Les frameworks de tests, les guides et les documentations sur le sujet fleurissent, vous pouvez donc vous lancer sans crainte.
      
      On peut découper le TDD en 5 étapes distinctes :
      
          Écrire un test,
          Vérifier qu’il échoue,
          Écrire le code suffisant pour que le test passe,
          Vérifier que le test passe,
          Optimiser le code et vérifier qu’il n’y ait pas de régression.
      
      Pour simplifier cette logique on peut regrouper ces cinq étapes en trois grandes idées :
      
          Tester d’abord, qui correspond aux deux premières étapes.
          Rendre fonctionnel, qui englobe les points 3 et 4.
          Rendre meilleur, qui n’est autre que l’étape 5.

 ####Assertion ######
 
 Les assertions de PHPUnit sont implémentées dans PHPUnit\Framework\Assert. PHPUnit\Framework\TestCase hérite de PHPUnit\Framework\Assert.
 
 Les méthodes d’assertion sont declarées static et peuvent être appelées depuis n’importe quel contexte en utilisant PHPUnit\Framework\Assert::assertTrue(), par exemple, ou en utilisant $this->assertTrue() ou self::assertTrue(), par exemple, dans une classe qui étend PHPUnit\Framework\TestCase.
 
 ####Tester les exception ####
 
  la méthode expectException prend en paramètre une chaîne de caractères correspondant au FQCN (Full Qualified Class Name, c'est-à-dire le namespace complet de la classe) de l'exception qui devrait être levée au moment de l'exécution du code. Cette méthode nous permet d'ajouter une nouvelle assertion à notre suite de tests !
 
 #### Les data Provider #### https://phpunit.de/manual/6.5/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
 
 Avec les tests unitaires automatisés, il est important de tenter de couvrir l'ensemble du code (les chemins), mais aussi les cas limites liés à la logique métier de l'application. Il est aussi intéressant de s'assurer que son code fonctionne avec une suite de valeurs en entrée différentes sans pour autant avoir à créer une méthode de test différente.
 
 Pour répondre à cette problématique, il existe les data provider ("fournisseur de données").
 
 Modifions la méthode de test testcomputeTVAFoodProduct pour faire en sorte d'exécuter cette méthode de tests avec un jeu de données particulier :
 
 Grâce à l'annotation @dataprovider, PHPUnit est en mesure de récupérer les données via la méthode indiquée dans l'annotation (pricesForFoodProduct). Cette dernière doit retourner un tableau de tableau(x) avec autant d'éléments que de paramètre(s) que l'on souhaite passer à la méthode de test qui recevra les données pour les exploiter.
 
 ####Doublure de test ####
  https://buildmedia.readthedocs.org/media/pdf/phpunit-french/latest/phpunit-french.pdf
  
  https://knplabs.com/fr/blog/mocks-fakes-stubs-dummy-et-spy-faire-la-difference
  
  CHAPITRE 9 : Doublure de test
  
  http://fyligrane.fr/3_php/19_Les%20tests%20avec%20PHPUnit/4_Test%20des%20d%C3%A9pendances.html
 
 #### Résultat et qualité du code ##
 
 ######10. Analyse de couverture de code ##
 
 https://atomrace.com/tester-api-rest-symfony-avec-phpunit/
 
 ####TestDox ###
 
 la fonctionnalité TestDox de PHPUnit examine une classe de test et tous les noms de méthode de test pour les convertir les noms PHP au format Camel Case en phrases : testBalanceIsInitiallyZero() (ou test_balance_is_initially_zero()) devient « Balance is initially zero ». S’il existe plusieurs méthodes de test dont les noms ne diffèrent que par un suffixe constitué de un ou plusieurs chiffres, telles que testBalanceCannotBecomeNegative() et testBalanceCannotBecomeNegative2(), la phrase « Balance ne peut pas être négative » n’apparaîtra qu’une seule fois, en supposant que tous ces tests ont réussi.
 
 Jetons un oeil sur la documentation agile générée pour la classe BankAccount
 
 #### fixture ####
 
 L’une des étapes les plus chronophages lors de l’écriture de tests est celle d’écrire le code pour configurer l'environnement
 requis pour l'éxécution d'un test puis de réinitialiser l'environnement quand le test est terminé. 
 Cet état requis pour l'éxecution d'un test est appelé la fixture du test.
 
 #### Annotations ###
 
 ne annotation est une forme spéciale de métadonnée syntaxique qui peut être ajoutée au code source de certains lan-
 gages de programmation. Bien que PHP n’ait pas de fonctionnalité dédiée à l’annotation du code source, l’utilisation
 d’étiquettes telles que
 @annotation arguments
 dans les blocs de documentation s’est établi dans la commu-
 nauté PHP pour annoter le code source. En PHP, les blocs de documentation sont réflexifs : ils peuvent être accédés
 via la méthode de l’API de réflexivité
 getDocComment()
 au niveau des fonctions, classes, méthodes et attributs.
 Des applications telles que PHPUnit utilisent ces informations durant l’exécution pour adapter leur comportement.
 
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

__Première étape : Avoir un projet avec des tests sur Github__

__Deuxième étape : activer Travis CI pour notre projet Github__

__Troisième étape : Lancer un build__


**Conclusion**

`Une fois l'outil mis en place, une seule règle à respecter ! Si un build ne passe pas, le développeur responsable de cet état ne peut pas mettre le code en (pré)production, ni merger son travail dans une branche principale.`

`Un outil d'intégration continue est un outil permettant de lancer des lignes de commandes, avec de multiples environnements et une interface graphique pour avoir un retour lisible de tous. Il est donc tout à fait possible de lancer un déploiement à chaque build, si celui-ci n'échoue pas. Pour cela, il faut ajouter le lancement du script responsable du déploiement de votre application.`

**Ce qu'il faut retenir**

`Les tests permettent de vous assurer que le code fonctionne, sans erreur 
fatale. Il faut également s'assurer qu'ils correspondent aux spécifications 
communiquées par le mandataire.
Vos tests font en sorte que le code soit plus robuste, plus maintenable, 
et que celui-ci vive dans la durée. Vos tests doivent vous permettre de gagner du temps lors de vos développements.
N'oubliez pas de respecter les règles suivantes :`

    Les tests doivent s'exécuter le plus rapidement possible afin que votre outil d'intégration continue ne prenne pas trop de temps lors d'un build, sans quoi l'équipe risque d'ignorer son résultat.

    Les tests doivent être isolés les uns des autres, car si un test dépend d'un autre test, cela rend leur maintien plus difficile et il devient impossible de ne lancer qu'un seul test à la fois.

    Les tests doivent être répétables à l'infini et toujours renvoyer le même résultat… c'est-à-dire ok.

    Les tests doivent se suffire à eux-mêmes pour être compréhensibles, cela permet de documenter le code.

    Les tests doivent permettre l'anticipation en couvrant le maximum de cas possibles. 

`Tester c'est douter ! Doutez autant que possible, 
cela servira vos applications de la meilleure des manières. 
Et maintenant, à vous de jouer !`

### References / Resources :

[Doc phpUnit](https://www.google.com)

[Tests et Recettes](http://www.test-recette.fr/tests-techniques/bases/tests-unitaires.html)

[Doc Travis](https://docs.travis-ci.com/user/languages/php/)