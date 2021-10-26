# Abethropalle utils
A library for Abethropalle DI.

## Installation:

Add this to composer.json:

```javascript
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Qurum/abethropalle-utils"
        }
    ],
    "require": {
        "abethropalle/utils": "dev-master"
    }
}
```
You may be also interested in https://docs.github.com/en/authentication/troubleshooting-ssh/error-permission-denied-publickey


## Graph
Набор классов для работы с ориентированными размеченными графами.    
**Graph** - класс графа, состоящего из **Node** и **Edge**.    
**GraphBuilder** - строитель графа, вершинами которого являются строки.    
**DepthFirstSearchCycleDetector** - инкапсулирует поиск цикла в графе.    

```php
$builder = new GraphBuilder();
$builder->arrow('A', 'B');
$builder->arrow('B', 'C');
$builder->arrow('C', 'D');
$builder->arrow('D', 'E');
$builder->arrow('E', 'A');
$cc = new DepthFirstSearchCycleDetector($builder->build());
assert((string) $cc->getCycle() == 'A -> B -> C -> D -> E -> A');
```
