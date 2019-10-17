# Frontend template
Echidna usa [Twig](https://twig.symfony.com/doc/2.x/) come **Template Engine** di default.

I template frontend risiedono normalmente nella cartella */app/frontend* e devono, come minimo, dichiarare la class template che estenda [core\template\TwigTemplate]([../../app/core/template/TwigTemplate.php](https://github.com/phomea/Echidna/blob/master/app/core/template/TwigTemplate.php)).

 La configurazione del template da utilizzare avviene nel file di configurazione */app/config/response.php*, alla voce **frontendTemplate**. Qui andrà inserito il full namespace del template da utilizzare
    
```php
    use frontend\standard\StandardTemplate;
    return [
        "templateEngines"   =>  [
            "frontendTemplate"  =>  StandardTemplate::class,
            "backendTemplate"   =>  \backend\BackendTemplate::class,
            "jsonTemplate"     =>  \core\template\JsonTemplate::class
        ]
    ];
```

## TwigTemplate
Un template che estende TwigTemplate deve necessariamente implementare i seguenti metodi astratti :
1. **function getTemplatesDirectory()** -> deve ritornare un valore di tipo stringa che rappresenta il path assoluto della directory dove risiedono i template twig da utilizzare
    ```php
    function getTemplatesDirectory()
    {
        return __DIR__."/template";
    }
    ```

2. **static function getBaseDirectory()** **deprecata** -> ritorna la directory dove risiede la classe template. **Verrà rimossa nelle prossime versioni**

## Strutura del template frontend standard 
Echidna dispone *out of the box* di un semplicissimo template frontend pronto all'utilizzo.

Il template standard è un barebone dal quale costruire il proprio template personalizzato.
### Struttura

```
app/frontend/standard/
                      | StandardTemplate.php
                      | assets
                            | css
                                | style.less
                      | template
                            | pages
                                | default.twig
                                | home.twig
                            | base.twig
                            | nofound.twig
                        
```
## StandardTemplate.php
La classe template che definisce le directory e si occupa di effettuare il render. Estende TwigTemplate.
```php
<?php
namespace frontend\standard;

use core\services\Request;
use core\template\TwigTemplate;

class StandardTemplate extends TwigTemplate {
    function getTemplatesDirectory()
    {
        return __DIR__."/template";
    }
    static function getBaseDirectory()
    {
        return __DIR__;
    }
}
```
> NOTA BENE : ogni risorsa viene caricato usando l'autoloader composer secondo lo standard psr-4. Ogni classe deve quindi essere dichiarata all'interno di un namespace che rispecchi fedelmente la struttura delle directory ed avere il proprio nome uguale al file in cui risiede.

## assets
La directory assets contiene tutte le risorse web. 
### css
Echidna utilizza il preprocessore **less** per compilare il css. Ogni risorsa css richiesta dal template viene valutata tramite htaccess e, se non presente, riscritta in modo da processare il file less corrispondente, partendo direttamente dalla root web.
```
esempio  : 
La richiesta a      -> miosito.it/assets/css/style.css
verrà riscritta in  -> miosito.it/frontend/{nometemplate}/assets/css/style.css

Nel caso in cui esista il file style.css, questo verrà servito direttamente da apache.

Se, invece, il file style.css non esiste ma esiste la sua versione style.less la richiesta verrà passata all'applicaziona Assets che lo compilerà creando la versione css
```
### js, img, images, video
Così come per il css, anche per queste cartelle all'interno di assets esistono delle regole di rewrite già inserite dentro il file htaccess.
L'accesso ai file js ( ad esempio ) presenti nel template frontend avverrà quindi partendo sempre dalla root web.
```
esempio  : 
La richiesta a      -> miosito.it/assets/js/main.js
verrà riscritta in  -> miosito.it/frontend/{nometemplate}/assets/js/main.js

```

## template
La cartella template contiene tutti i file **twig** che rappresentano il nostro sito web.

La struttura all'interno di questa directory può essere decisa a piacimento, tranne le cartelle specifiche legate alle singole applicazioni
```
Ad esempio la cartella "pages" viene utilizzata dall'applicazione "Pages" e contiene i layout che possono essere utilizzati per renderizzare le pagine del sito
```
L'unico template **obbligatorio** è notfound.twig, che viene chiamato direttamente da Echidna nel caso la risorsa web richiesta non sia disponibile ( errore 404)