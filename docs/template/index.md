# Frontend template
Echidna usa [Twig](https://twig.symfony.com/doc/2.x/) come **Template Engine** di default.
I template frontend risiedono normalmente nella cartella */app/frontend* e devono, come minimo, dichiarare la class template che estenda [core\template\TwigTemplate](../../app/core/template/TwigTemplate.php).
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