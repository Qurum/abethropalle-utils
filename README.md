# abethropalle-utils

## Graph
Набор классов для работы с ориентированными размеченными графами.    
**Graph** - класс графа, состоящего из **Node** и **Edge**    
**GraphBuilder** - строитель графа, вершинами которого являются строки    
**DepthFirstSearchCycleDetector** - инкапсулирует поиск цикла в графе    

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
